<?php

class MyDB extends SQLite3
{
    public function __construct($filename)
    {
        $this->open($filename);
    }
}

class extractDomainFromChrome
{
    private $domainlist = array();

    public function __construct($filename = NULL)
    {
        if ($filename === NULL) {
            $filename = 'History';
        }

        $db = new MyDB($filename);

        $domainlist = array();

        $results = $db->query('SELECT url FROM urls');
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            if ($row['url']) {
                $url = $row['url'];
                $domain = $this->getDomainFromUrl($url);
                if ($domain) {
                    $domainlist[] = $domain;
                }
            }
        }

        $domainlist = array_unique($domainlist);
        sort($domainlist, SORT_STRING);
        $this->domainlist = $domainlist;
    }

    private function getDomainFromUrl($url)
    {
        $regex = '@(http:|https:)//([A-Za-z0-9.]+)/.+@';
        $regex2 = '@\d+\.\d+\.\d+\.\d+@';
        $matches = array();

        if (preg_match($regex, $url, $matches)) {
            $result = $matches[2];
            if (preg_match($regex2, $result, $matches)) {
                $result = false;
            }
        } else {
            $result = false;
        }

        return $result;
    }

    public function outputNamebenchDomainList()
    {
        $domainlist = $this->domainlist;
        foreach ($domainlist as $domain) {
            echo 'A '.$domain.'.'."\n";
        }
    }

    public function getDomainlist()
    {
        return $this->domainlist;
    }
}
