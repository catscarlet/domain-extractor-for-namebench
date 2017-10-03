<?php

include_once 'extractDomainFromChrome.php';

$domainlist = new extractDomainFromChrome();

//$domainlist->outputNamebenchDomainList();

print_r($domainlist->domainlist);
