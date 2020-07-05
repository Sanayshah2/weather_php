<?php
$api_key="000f10150675d07a15845fbdefee16b6";
$cityid="mumbai";
$url="http://api.openweathermap.org/data/2.5/weather?q=" .$cityid. "&lang=en&units=metric&APPID=" .$api_key;
//echo $url;
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_VERBOSE,false);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
$res=curl_exec($curl);
curl_close($curl);
$data=json_decode($res);
echo"<pre>";
print_r($data);
//echo $data->main->temp;
?>