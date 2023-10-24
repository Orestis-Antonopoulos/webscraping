<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
# scraping books to scrape: https://books.toscrape.com/
require 'vendor/autoload.php';
$httpClient = \Symfony\Component\Panther\Client::createChromeClient(null, [
    '--headless',
    '--disable-gpu',
    '--remote-debugging-port=9222',
]);
// for a Firefox client use the line below instead
//$httpClient = \Symfony\Component\Panther\Client::createFirefoxClient();
// get response


$response = $httpClient->get('https://www.insomnia.gr/classifieds/category/11-%CE%BA%CE%AC%CF%81%CF%84%CE%B5%CF%82-%CE%B3%CF%81%CE%B1%CF%86%CE%B9%CE%BA%CF%8E%CE%BD/?sellersOnly=0&filter=classifieds_type_1&sortby=classifieds_adverts.cl_a_date_added');
// $response->takeScreenshot($saveAs = 'insomnia-gpus.jpg');


$currentPage = 1;
$maxPages = 2;
$nextPageUrl = '';
$titles = [];
$prices = [];
do {
    $response->getCrawler()->filter('.ipsType_normal.ipsType_reset.ipsContained_container > .ipsType_break.ipsContained > a.ipsType_blendLinks')
    ->each(function ($node) use (&$titles) {
        $titles[] = $node->text();
    });
    $response->getCrawler()->filter('li > p.ipsType_bold > .cFilePrice')
    ->each(function ($node) use (&$prices) {
        $prices[] = $node->text();
    });

    $nextLink = $response->getCrawler()->filter('ul.ipsPagination li.ipsPagination_next a');
    $nextPageUrl = $nextLink->attr('href');  // Get the URL of the next page
    $response = $httpClient->get($nextPageUrl);
    $currentPage++;

    
} while ($currentPage<= $maxPages);
?>

<style>
th {
    color:#700;
}
td {
    background-color:#eee;
    padding:5px;
    border: solid black 1px;
    border-radius: 6px;
}
table {
    display:flex;
    justify-content: center;
    border-spacing: 3px 6px;
}
    </style>
<table><tr><th>Title</th><th>Price</th></tr>
<?php
$key = 0;
    foreach ($titles as $title) {
        echo "<tr><td>$title</td><td>$prices[$key]</td></tr>" . PHP_EOL;
        $key++;
    }   
?>
</table>