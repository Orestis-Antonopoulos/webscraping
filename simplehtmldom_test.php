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
            max-width:400px;
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
require 'vendor/autoload.php';
$httpClient = new \simplehtmldom\HtmlWeb();

// $IntelScores = ["1050ti" => 6302, ];
$scores = ["1200" => 6322, ];

$images = [];
$query = "ryzen%201200";

    $html = $httpClient->load('https://www.insomnia.gr/classifieds/search/?&q=' . $query . '&type=classifieds_advert&page=1&nodes=9&sortby=relevancy');

    foreach ($html->find('.ipsStreamItem_container') as $element) {
        $image = $element->find('.ipsImage.ipsStream_image', 0);
        
        if ($image) {
            $images[] = $image->{'data-src'};
        } else {
            $images[] = null;  // or some placeholder
        }
    }

echo "<table><tr> <th>Title</th></tr>"; //initialize table

$key = 0;

foreach ($images as $image)
            echo "
            <tr><td><img src=\"$image\" style=\"width:150px;height:150px;object-fit:cover; border-radius:5px;\"></td></tr>" . PHP_EOL;

$key++;
  

?>
</table>

</body>
</html>