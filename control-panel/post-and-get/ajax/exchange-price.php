<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if ($_POST['option'] == 'EXCHANGECURRENCY') {
    $endpoint = 'latest';
    $access_key = '62db8f1bb056bd0c6e5dbab8b9bee0ec';

    // Initialize CURL:
    $ch = curl_init('http://data.fixer.io/api/' . $endpoint . '?access_key=' . $access_key . '&base=EUR');

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $exchangeRates = json_decode($json, true);

    // Access the exchange rate values, e.g. GBP:
    $USD = $exchangeRates['rates']['USD'];
    $LKR = $exchangeRates['rates']['LKR'];

    $price = $_POST['price'];
   
    $one_lkr_in_dollar = $USD / $LKR;
    
    $dollar_price = $price * $one_lkr_in_dollar;
    
    $result = ["status" => 'success', "price" => round($dollar_price, 2)];
    echo json_encode($result);
    exit();
}
