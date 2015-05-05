#!/usr/bin/env php
<?php namespace DSH\weather;

$city = "Toronto";      // capitalized city name
$country = "ca";        // lowercase country code

$url  = "http://api.openweathermap.com/data/2.5/weather?q=";
$url .= $city . "," . $country;

$ch = curl_init()
    or die("curl_init" . curl_error($ch));

curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_HEADER => false,
    CURLOPT_RETURNTRANSFER => true
));

$json = curl_exec($ch)
    or die("curl_exec" . curl_error($ch));

$json = json_decode($json);

curl_close($ch);

echo $json->weather[0]->description . "\n";
echo ($json->main->temp - 272.15) . " (C) degrees in ";
echo $json->name . " right now.\n";

?>
