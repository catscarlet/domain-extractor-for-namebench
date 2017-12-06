<?php

class extractDomainFromSslibevLog
{
    private $domainlist = array();

    public function __construct($filename = null)
    {
        if ($filename === null) {
            $filename = 'ss.log';
        }

        $lines = file($filename);

        foreach ($lines as $line_num => $line) {
            $domain = $this->getDomainFromSsLog($line);
            if ($domain) {
                $domainlist[] = $domain;
            }
        }

        $domainlist = array_unique($domainlist);
        sort($domainlist, SORT_STRING);
        $this->domainlist = $domainlist;
    }

    public function getDomainFromSsLog($url)
    {
        $regex = '@.+ INFO: successfully resolved (.+)\n@';
        $regex2 = '@\d+\.\d+\.\d+\.\d+@';
        $matches = array();

        if (preg_match($regex, $url, $matches)) {
            $result = $matches[1];
            if (preg_match($regex2, $result, $matches)) {
                $result = false;
            }
        } else {
            $result = false;
        }

        return $result;
    }

    public function getdomainlist() {
        return $this->domainlist;
    }
}
