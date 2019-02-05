<?php

function convertCurrency($amount, $from, $to)
	{
	if(empty($from)) $from = 'inr';
	if($from == $to) {
	return $amount;
	} else {
	$amount = urlencode($amount);
    $from= urlencode($from);
    $to= urlencode($to);
    
	$url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('bld>', $rawdata);
    $data = explode($to, $data[1]);
    return round($data[0], 2);
	}
	}
?>