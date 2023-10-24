<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th {
            color:#700;
        }
        td {
            background-color:#eee;
            padding:5px;
            border: solid black 1px;
            border-radius: 6px;
            max-width:500px;
        }
        table {
            display:flex;
            justify-content: center;
            border-spacing: 3px 6px;
        }
    </style>
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


$response = $httpClient->get('https://www.insomnia.gr/classifieds/search/?&q=3080&type=classifieds_advert&nodes=11&search_in=titles&sortby=newest');
// $response->takeScreenshot($saveAs = 'insomnia-gpus.jpg');


$currentPage = 1;
$maxPages = 2;
$nextPageUrl = '';
$titles = [];
$prices = [];
$links = [];
$types = [];
do {
    $response->getCrawler()->filter('.ipsStreamItem_title')
    ->each(function ($node) use (&$titles, &$links) {
        $titles[] = $node->text();
    });
    $response->getCrawler()->filter('h2 span a')
    ->each(function ($node) use (&$links) {
        $links[] = $node->attr('href');
    });
    $response->getCrawler()->filter('.ipsStream_snippetInfo p .ipsStream_price')
    ->each(function ($node) use (&$prices) {
        $prices[] = $node->text();
    });
    $response->getCrawler()->filter('ul.ipsList_inline li .ipsBadge')
    ->each(function ($node) use (&$types) {
        $types[] = $node->text();
    });

    $nextLink = $response->getCrawler()->filter('ul.ipsPagination li.ipsPagination_next a');
    $nextPageUrl = $nextLink->attr('href');
    $response = $httpClient->get($nextPageUrl);
    $currentPage++;

    
} while ($currentPage<= $maxPages);
?>
<table><tr><th>Title</th><th>Type</th><th>Price</th><th>link</th>
</tr>
<?php
$key = 0;
    foreach ($titles as $title) {
        $thisPrice = $prices[$key];
        $thisPrice = str_replace(",", ".", $thisPrice);
        $thisPrice = str_replace("€", "", $thisPrice);
        $thisPrice = floatval(trim($thisPrice));
        if (($types[$key] != "Πώληση") || ($prices[$key] < 10)) {
            $key++;
        } else {
            echo "
            <tr><td>$title</td>
            <td>$types[$key]</td>
            <td>$prices[$key]</td>
            <td><a href=\"$links[$key]\" target=\"_blank\"> <button>Visit</button></a></td></tr>" . PHP_EOL;
            $key++;
        }
    }   
?>
</table>
</body>
</html>