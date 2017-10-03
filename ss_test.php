<?php

include_once 'extractDomainFromSslibevLog.php';

$domainlist = new extractDomainFromSslibevLog();

//$domainlist->outputNamebenchDomainList();

print_r($domainlist->domainlist);
