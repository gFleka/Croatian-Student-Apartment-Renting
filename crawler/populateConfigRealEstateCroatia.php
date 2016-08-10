<?php
include_once("simple_html_dom.php");
function populate(){
	$html = file_get_html("http://www.realestatecroatia.com/hrv/listag.asp");
	$real_estate_croatia_urls = array();
	foreach($html->find('a') as $link)
	{
		if(strpos($link->href,"showconn") !== false)
		{
			$real_estate_croatia_urls[] = "http://www.realestatecroatia.com/hrv/" . $link->href;
		}
	}

	$real_estate_croatia_urls=array_unique($real_estate_croatia_urls);
	$temp = array();
	$real_estate_croatia_urls = array_merge($temp, $real_estate_croatia_urls);
	return $real_estate_croatia_urls;
}

?>