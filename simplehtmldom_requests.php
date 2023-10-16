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

$scores = ["1050ti" => 6302, "1050" => 5044, "1060" => 9750, "1070ti" => 14720, "1070" => 13514, "1080ti" => 18539, "1080" => 15483, 
"1650SUPER" => 10112, "1650ti" => 7569, "1650" => 7860, "1660SUPER" => 12785, "1660ti" => 12961, "1660" => 11725,
"2050" => 6912, "2060SUPER" => 16585, "2060" => 14115, "2070SUPER" => 18262, "2070" => 16170, "2080SUPER" => 19598, "2080ti" => 21851, "2080" => 18803,
"3050" => 12985, "3060ti" => 20593, "3060" => 17117, "3070ti" => 23759, "3070" => 22474, "3080ti" => 27336 , "3080" => 25365, "3090ti" => 29833, "3090" => 26906,
"4060ti" => 22498, "4060" => 19514, "4070ti" => 31641, "4070" => 26840, "4080" => 34758, "4090" => 38892];

//Pagination:
$currentPage = 1;
$maxPages = 17; // Set to 0 for unlimited (up to 100)
$stopLoop = false;

$titles = [];
$prices = [];
$links = [];
$types = [];
$benchmarks = [];
$query = "1050%201060%201070%201080%201650%201660%202050%202060%202070%202080%203050%203060%203070%203080%203090%204060%204070%204080%204090";
do {
    $html = $httpClient->load('https://www.insomnia.gr/classifieds/search/?&q=' . $query . '&type=classifieds_advert&nodes=11&search_in=titles&sortby=newest&page=' . $currentPage);

    foreach ($html->find('.ipsStreamItem_title') as $element) {
        $titles[] = $element->plaintext;
    }
    
    foreach ($html->find('h2 span a') as $element) {
        $links[] = $element->href;
    }

    foreach ($html->find('.ipsStream_snippetInfo p .ipsStream_price') as $element) {
        $prices[] = $element->plaintext;
    }

    foreach ($html->find('ul.ipsList_inline li .ipsBadge') as $element) {
        $types[] = $element->plaintext;
    }

    // Check for Next Page:
    $nextPageUrl = $html->find('ul.ipsPagination li.ipsPagination_next a', 0);
    if ($nextPageUrl) {
        $nextPageUrl = $nextPageUrl->href;
        $currentPage++;
    } else {$stopLoop = true;}

    // Check if need to Stop
    if (($maxPages != 0 && $currentPage > $maxPages) || ($stopLoop == True) || ($currentPage > 100)) {break;}
} while ($stopLoop == false);

echo "<table><tr><th>Title</th><th>Card</th><th>Benchy/Price</th><th>link</th></tr>"; //initialize table

$key = 0;
    foreach ($titles as $title) {
        $thisPrice = $prices[$key]; //take the string price
        $thisPrice = str_replace(",", ".", $thisPrice); //replace coma with dot
        $thisPrice = str_replace("€", "", $thisPrice); //remove currency sign
        $thisPrice = floatval(trim($thisPrice)); //turn string into a float
        $benchmarks[$key] = 0;
        if (($types[$key] != "Πώληση") || ($thisPrice < 10)) {
            $key++;
        } else {
            foreach ($scores as $card => $score)
            if (stripos(str_replace(" ", "", $title), $card, 0) !== false) {$benchmarks[$key] = $score; break;}

            // Collect each record in an array
            $collectedData[] = [
                'title' => $title,
                'BPeu' => round($benchmarks[$key] / $thisPrice, 1),
                'price' => $prices[$key],
                'link' => $links[$key],
                'benchmark' => $benchmarks[$key]
            ];

            // echo "
            // <tr><td>$title</td>
            // <td>" . round($benchmarks[$key]/$thisPrice, 1) . "</td>
            // <td>= $benchmarks[$key] / $prices[$key]</td>
            // <td><a href=\"$links[$key]\" target=\"_blank\"> <button>Visit</button></a></td></tr>" . PHP_EOL;

            $key++;
        }
    }   

// Sort the array based on BPeu
usort($collectedData, function ($a, $b) {
    return $b['BPeu'] <=> $a['BPeu'];
});
// Create the XML structure
$xml = new SimpleXMLElement('<root/>');
// Loop through the data and add it to the XML
foreach ($collectedData as $data) {
    // Add to XML
    $gpu = $xml->addChild('gpu');
    $gpu->addChild('title', htmlspecialchars($data['title']));
    $gpu->addChild('BPeu', htmlspecialchars($data['BPeu']));
    $gpu->addChild('price', htmlspecialchars($data['price']));
    $gpu->addChild('link', htmlspecialchars($data['link']));
    $gpu->addChild('benchmark', htmlspecialchars($data['benchmark']));
    
    echo "
    <tr>
        <td>{$data['title']}</td>
        <td>{$data['BPeu']}</td>
        <td>= {$data['benchmark']} / {$data['price']}</td>
        <td><a href=\"{$data['link']}\" target=\"_blank\"> <button>Visit</button></a></td>
    </tr>";
}


// Save the XML to a file
$xml->asXML('data.xml');

?>
</table>

</body>
</html>