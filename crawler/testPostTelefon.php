<?php

include_once('sendPost.php');

$url = 'http://myideamaker.com/laravel/api';
$data = array('telefon' => '099090909');
echo httpPost($url, $data);

?>