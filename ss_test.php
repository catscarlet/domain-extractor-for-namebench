<?php

include_once 'extractDomainFromSslibevLog.php';

$domainlist = new extractDomainFromSslibevLog();

//$domainlist->outputNamebenchDomainList();

print_r($domainlist->getDomainlist());
foreach ($domainlist->getDomainlist() as $domain) {
    echo 'A '.$domain.'.'."\n";
}
