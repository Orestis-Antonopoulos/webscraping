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

$descriptions = [];
$query = "ryzen%201200";

    $html = $httpClient->load('https://www.insomnia.gr/classifieds/search/?&q=' . $query . '&type=classifieds_advert&nodes=8&sortby=relevancy');

    foreach ($html->find('.ipsSpacer_top.ipsSpacer_half.ipsType_richText.ipsType_break.ipsType_medium') as $element) {
        $descriptions[] = $element->plaintext;
    }

echo "<table><tr> <th>Title</th></tr>"; //initialize table

$key = 0;

foreach ($descriptions as $description)
            echo "
            <tr><td>$description</td></tr>" . PHP_EOL;

$key++;
  

?>
</table>

</body>
</html>