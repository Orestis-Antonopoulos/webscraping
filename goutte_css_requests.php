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
}
table {
    display:flex;
    justify-content: center;
    border-spacing: 3px 6px;
}
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Book Name</th>
            <th>Price</th>
        </tr>

<?php
# scraping books to scrape: https://books.toscrape.com/
require 'vendor/autoload.php';
$httpClient = new \Goutte\Client();
$response = $httpClient->request('GET', 'https://books.toscrape.com/');
// get prices into an array
$prices = [];
$response->filter('.row li article div.product_price p.price_color')->each(function ($node) use (&$prices) {
$prices[] = $node->text();
});
// echo titles and prices
$priceIndex = 0;
$countbooks = 0;
$response->filter('.row li article h3 a')->each(function ($node) use ($prices, &$priceIndex, &$countbooks) {
$countbooks++;
echo "<tr><td>$countbooks) ". $node->text() . '</td><td>' . $prices[$priceIndex] .PHP_EOL . '</td></tr>';
$priceIndex++;
});

?>
</table>
</body>
</html>