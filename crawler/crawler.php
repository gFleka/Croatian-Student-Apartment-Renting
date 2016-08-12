<?php
include_once("simple_html_dom.php");
include_once("config.php");


// set target url to crawl
//$url = "registar.htm"; //testni lokalni file
$emails_all = array();
$phones_all = array();
foreach($urls as $url)
{	
	echo "I " . $i;
	
	echo " URL " . $url . "<br>";
	// open the web page
	
	//$html = new simple_html_dom();
	$html= file_get_html($url);

	// array to store scraped links
	//Funkcija za extract email adresa iz string-a
	$plainText = $html;

	$pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';

	//https://regex101.com/r/nX9vI3/3    REGEX ZA BROJEVE

	$plainTextPhone = $html->plaintext;
	$plainTextPhone = preg_replace('/\s+/', '', $plainTextPhone);

	//echo "<hr>" . $plainTextPhone . "<hr>";
	//$patternNumber = '/^\+\s*\d{1,}\s*(\(0\))?\s*\d+\s*\d*/i';  //Za extract samih brojeva
	$patternNumber = "/((?=.{9,})\+\s*\d{2,3}\s*(\(0\))?\s*\d+\s*\d+)/i";

	preg_match_all($patternNumber, $plainTextPhone, $matchesPhone);
	/*echo "<hr> Matches Phone";
	var_dump($matchesPhone[0]);
	echo "<hr>";*/

	// preg_match_all returns an associative array
	preg_match_all($pattern, $plainText, $matches);

	// Ukljanjanje duplikata i reindeksiranje
	$matches[0] = array_unique($matches[0]);
	$kljucevi = array_keys($matches[0]);
	for($i=0;$i<count($kljucevi);$i++)
	{
		$emails[$i]=$matches[0][$kljucevi[$i]];
	}


	//Ispis na ekran svih emailova u trenutnom koraku for petlje
	/*echo "<hr>";
	echo count($emails) . "<br>";
	for($i=0;$i<count($emails);$i++)
	{
		echo $emails[$i] . "<br>";
	}*/
	
	// Sprema vrijednosti u globalnu varijablu 
	$temp = $emails_all;
	$emails_all=array_merge($temp, $emails);
	
	$temp = $phones_all;
	$phones_all=array_merge($phones_all, $matchesPhone[0]);
}

	//Skida duplikate te merge ponovno indeksira vrijednosti
	$emails_all = array_unique($emails_all);
	$temp = array();
	$emails_all = array_merge($temp, $emails_all);
	
	$phones_all = array_unique($phones_all);
	foreach($phones_all as $key=>$phone)
	{
		if(strlen($phone)<9)
		{
			unset($phones_all[$key]);
		}
	}
	$temp = array();
	$phones_all = array_merge($temp, $phones_all);
    
    //Slanje na api te ispis
    
    include_once('sendPost.php');
    
	//var_dump($emails_all);
	// Ispis svih emailova
	echo "<hr>";
	echo "<h2>Crawlanih emailova: " . count($emails_all) . "</h2><br>";
	for($i=0;$i<count($emails_all);$i++)
	{
        $data = array('email' => $emails_all[$i]);
        httpPost($url_api, $data);
		echo $emails_all[$i] . "<br>";
}
    //Slanje na api te ispis
	// Ispis svih telefonskih brojeva
	echo "<hr>";
	echo "<h2>Crawlanih telefona: " . count($phones_all) . "</h2><br>";
	for($i=0;$i<count($phones_all);$i++)
	{
		$data = array('telefon' => $phones_all[$i]);
        httpPost($url_api, $data);
        echo $phones_all[$i] . "<br>";
	}

?>
