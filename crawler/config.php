<?php
//Postavke
//URL-ovi za crawlati

$url_api = 'http://myideamaker.com/laravel/api';

$urls = array("http://www.agenti.hr/registar-posrednika-promet-nekretninama/","http://www.agenti.hr/imenik-agenata-posredovanja-promet-nekretninama/","http://www.nekretnine-rijeka.com/agencije-za-nekretnine.php","http://www.realestatecroatia.com/hrv/listag.asp");
//Automatski populira url sa predefiniranih lokacija
include_once("populateConfigRealEstateCroatia.php");
$populated_urls = populate();
$urls = array_merge($urls, $populated_urls);

?>
