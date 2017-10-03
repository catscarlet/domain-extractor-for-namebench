<?php

include_once 'extractDomainFromChrome.php';
$chromedomainlist = new extractDomainFromChrome();

include_once 'extractDomainFromSslibevLog.php';
$ssdomainlist = new extractDomainFromSslibevLog();

$diff = array_diff($chromedomainlist->domainlist, $ssdomainlist->domainlist);

//print_r($diff);
outputNamebenchDomainList($diff);

function outputNamebenchDomainList($domainlist)
{
    //$domainlist = $this->domainlist;
        foreach ($domainlist as $domain) {
            echo 'A '.$domain.'.'."\n";
        }
}
