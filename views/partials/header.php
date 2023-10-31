<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I can't think of a title at 4:30am</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
</head>
<body>
<div class="ocean">
  <div class="wave"></div>
  <div class="wave"></div>
  <div class="wave"></div>
</div>

<?php
function truncateText($text) {
    if (strlen($text) > 52) {
    return substr($text, 0, 52 - 3) . '...';
    }
    return $text;
    }
    
function cleanprice ($thisPrice) {
    str_replace(",", ".", $thisPrice);
    $thisPrice = str_replace("€", "", $thisPrice);
    $thisPrice = floatval(trim($thisPrice));
    return $thisPrice;
    } 
?>