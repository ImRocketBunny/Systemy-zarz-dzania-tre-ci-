<?php
/*https://openweathermap.org/api/one-call-api*/

defined('_JEXEC') || die('Restricted access');

use Joomla\CMS\Helper\ModuleHelper;

$apikeyowf = $params->get('api key','');
$apikeylociq = $params->get('api key lon lat','');

$ch = curl_init();
//$url2 = JUri::current(); dodaj formater i zaproponuj link

$address = $params->get('miasto','');
//$address = str_replace(' ','%20', $address);
if(strlen($address)==0){
    echo("Nie podano lokalizacji");
    return;
}
if(strlen($apikeylociq)==0){
    echo("Nie podano klucza LOCiq");
    return;
}
if(strlen($apikeyowf)==0){
    echo("Nie podano klucza OWF");
    return;
}
$url = "https://us1.locationiq.com/v1/search.php?key=".$apikeylociq."&q=".str_replace(' ','%20', $address)."&format=json";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if($e = curl_error($ch)) {
    echo $e;
    return;
}
else{
    $response = json_decode($resp,true);
    
    $lat = $response[0]["lat"];
    $lon = $response[0]["lon"];
    //$value = json_decode($resp, true);
    $lat=$lat = str_split($lat, 5)[0];
    $lon=$lon = str_split($lon, 5)[0];
    //echo $lat."<br>".$lon;
}
//echo $url;
$url = "https://api.openweathermap.org/data/2.5/onecall?lat=".$lat."&lon=".$lon."&exclude=alerts,hourly,minutely,current&lang=pl&appid=".$apikeyowf;

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if($e = curl_error($ch)) {
    echo $e;
    return;
}
else{
    //$decoded = json_decode(json_encode($resp), true);
    //$json = var_dump(json_decode($resp));

    $value = json_decode($resp, true);
    
}
curl_close($ch);

//$request = https://api.openweathermap.org/data/2.5/onecall?lat=33.44&lon=-94.04&exclude=alerts,hourly,minutely,current&appid=656d7ae78df0d9a19d0f78af5a3df688
//https://api.openweathermap.org/data/2.5/onecall?lat=33.44&lon=-94.04&exclude=alerts,hourly,minutely,current&lang=pl&appid=
//$response = http_get("https://api.openweathermap.org/data/2.5/onecall?lat=33.44&lon=-94.04&exclude=alerts,hourly,minutely,current&appid=656d7ae78df0d9a19d0f78af5a3df688");

require ModuleHelper::getLayoutPath('mod_pogoda', $params->get('layout', 'default'));