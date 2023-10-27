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
            min-width:60px;
            height:40px;
        }
        table {
            display:flex;
            justify-content: center;
            border-spacing: 3px 6px;
        }
        .tooltip {
            position: relative;
            width:400px;
        }
        .tooltip2 {
            position: relative;
        }
        .tooltiptext {
            visibility: hidden;
            position:absolute;
            z-index: 1;
            background-color:#eee;
            padding:5px;
            border: solid black 1px;
            border-radius: 6px;
            width:401px;
            height:41px;
            left:-1px;
            top:-1px;
            overflow:auto;
        }
        .tooltiptext2 {
            visibility: hidden;
            position:absolute;
            z-index: 1;
            background-color:#eee;
            padding:5px;
            border: solid black 1px;
            border-radius: 6px;
            width:61px;
            height:41px;
            left:-1px;
            top:-1px;
            overflow:auto;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
        .tooltip2:hover .tooltiptext2 {
            visibility: visible;
        }
    </style>
</head>
<body>

<?php
require 'vendor/autoload.php';
$httpClient = new \simplehtmldom\HtmlWeb();

// $IntelScores = ["1050ti" => 6302, ];
$scores = ["1200" => 6322, "1300x" => 6968, "2200G" => 6767, "2200GE" => 6062, "2200U" => 3695, "2300U" => 5473, "2300X" => 7514, "3100" => 11635, "3200G" => 7160, "3200GE" => 7309, "3200U" => 3827, "3250C" => 3208, "3250U" => 3864, "3300U" => 5695, "3300X" => 12677, "3350U" => 5853, "4100" => 11041, "4300GE" => 7488, "4300G" => 10922, "5300GE" => 13321, "5300G" => 12891, "5300U" => 9711, "5400U" => 11523, "5425U" => 11552, "7320C" => 8252, "7320U" => 9175, "7330U" => 11103, "1400" => 7779, "1500X" => 9102, "1600X" => 13066, "1600" => 12300, "2400GE" => 7438, "2400G" => 8739, "2500U" => 6517, "2500X" => 9514, "2600H" => 7834, "2600X" => 13962, "2600" => 13219, "3350GE" => 9343, "3350G" => 9048, "3400GE" => 8901, "3400G" => 9294, "3450U" => 6770, "3500C" => 5564, "3500U" => 6993, "3500X" => 13206, "3500" => 12809, "3550H" => 7823, "3550U" => 7681, "3580U" => 7174, "3600XT" => 18693, "3600X" => 19238, "3600" => 17784, "4400G" => 17160, "4500U" => 11015, "4500" => 16221, "4600GE" => 15641, "4600G" => 16027, "4600HS" => 14377, "4600H" => 14554, "4600U" => 13449, "5500U" => 13175, "5500" => 19556, "5560U" => 15089, "5600GE" => 18748, "5600G" => 19918, "5600U" => 15466, "5600X3D" => 22039, "5600X" => 21932, "5600" => 21607, "5625U" => 15104, "6600H" => 18977, "6600U" => 17185, "7500F" => 26540, "7520U" => 9680, "7530U" => 16116, "7535HS" => 18431, "7535U" => 17494, "7540U" => 19093, "7600X" => 28771, "7600" => 27550, "7640HS" => 23284, "7640U" => 21850, "1700X" => 15663, "1700" => 14821, "2700E" => 14657, "2700U" => 6972, "2700X" => 17564, "2700" => 15737, "2800H" => 7863, "3700C" => 7145, "3700U" => 7194, "3700X" => 22625, "3750H" => 8210, "3780U" => 6910, "3800XT" => 23705, "3800X" => 23223, "4700GE" => 19846, "4700G" => 20210, "4700U" => 13477, "4800HS" => 18545, "4800H" => 18684, "4800U" => 15469, "5700GE" => 22196, "5700G" => 24670, "5700U" => 15839, "5700X" => 26789, "5700" => 24333, "5800HS" => 20423, "5800H" => 21177, "5800U" => 18642, "5800X3D" => 28233, "5800X" => 28004, "5800" => 25867, "5825U" => 18424, "6800HS" => 22964, "6800H" => 23702, "6800U" => 20586, "7700X" => 36298, "7700" => 35078, "7730U" => 18807, "7735HS" => 24202, "7735H" => 24425, "7735U" => 21214, "7736U" => 23163, "7745HX" => 32621, "7800X3D" => 34623, "7840HS" => 28977, "7840H" => 28730, "7840S" => 26627, "7840U" => 25158, "3900XT" => 32752, "3900X" => 32698, "3900" => 30833, "3950X" => 38909, "4900HS" => 19128, "4900H" => 19318, "5900HS" => 21863, "5900H" => 20960, "5900HX" => 22759, "5900X" => 39255, "5900" => 34540, "5950X" => 45835, "5980HS" => 21232, "5980HX" => 23670, "6900HS" => 23976, "6900HX" => 24930, "7845HX" => 46148, "7900X3D" => 50684, "7900X" => 52193, "7900" => 49148, "7940HS" => 30811, "7940H" => 31099, "7945HX" => 56414, "7950X3D" => 62642, "7950X" => 63334 ];

//Pagination:
$currentPage = 1;
$maxPages = 0; // Set to 0 for unlimited (up to 100)
$stopLoop = false;

$titles = [];
$prices = [];
$links = [];
$types = [];
$benchmarks = [];
$descriptions = [];
$cpuModels = [];
$query = "ryzen";
do {
    $html = $httpClient->load('https://www.insomnia.gr/classifieds/search/?&q=' . $query . '&type=classifieds_advert&page=' . $currentPage . '&nodes=127,27,56,24,161,160,69,70,25,26,28&sortby=relevancy');

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
    foreach ($html->find('.ipsSpacer_top.ipsSpacer_half.ipsType_richText.ipsType_break.ipsType_medium') as $element) {
        $descriptions[] = $element->plaintext;
    }
    

    // Check for Next Page:
    $nextPageUrl = $html->find('.ipsPagination .ipsPagination_next a', 0);
    $endOTheLine = $html->find('.ipsPagination .ipsPagination_next.ipsPagination_inactive', 0);
    if ($nextPageUrl && !$endOTheLine) {
        $nextPageUrl = $nextPageUrl->href;
        $currentPage++;
    } else {$stopLoop = true;}

    // Check if need to Stop
    if (($maxPages != 0 && $currentPage > $maxPages) || ($stopLoop == True) || ($currentPage > 100)) {break;}
} while ($stopLoop == false);

echo "<table><tr> <th>Title</th> <th>BPeu</th> <th>Benchy/Price</th> <th>link</th></tr>"; //initialize table

$key = 0;
foreach ($titles as $title) {
    $thisPrice = $prices[$key];
    $thisPrice = str_replace(",", ".", $thisPrice);
    $thisPrice = str_replace("€", "", $thisPrice);
    $thisPrice = floatval(trim($thisPrice));

    $benchmarks[$key] = 0;  // Initialize to zero
    $cpuModels[$key] = 0;

    if (($types[$key] != "Πώληση") || ($thisPrice < 10)) {
        $key++;
        continue;  // Skip this iteration
    }

    $found = false;  // Flag to check if we found a CPU model

    foreach ($scores as $cpu => $score) {
        $cleanTitle = str_replace(" ", "", $title);
        $cleanDescription = str_replace(" ", "", $descriptions[$key]);

        if (stripos($cleanTitle, $cpu) !== false || stripos($cleanDescription, $cpu) !== false) {
            $benchmarks[$key] = $score;
            $found = true;
            $cpuModels[$key] = $cpu;
            break;  // No need to check further
        }
    }

    if ($found) {
        $collectedData[] = [
            'title' => $title,
            'BPeu' => round($benchmarks[$key] / $thisPrice, 1),
            'price' => $prices[$key],
            'link' => $links[$key],
            'description' => $descriptions[$key],
            'benchmark' => $benchmarks[$key],
            'cpuModel' => $cpuModels[$key]
        ];
    }

    $key++;
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
    $gpu->addChild('cpuModel',htmlspecialchars($data['cpuModel']));
    $gpu->addChild('BPeu', htmlspecialchars($data['BPeu']));
    $gpu->addChild('price', htmlspecialchars($data['price']));
    $gpu->addChild('link', htmlspecialchars($data['link']));
    $gpu->addChild('benchmark', htmlspecialchars($data['benchmark']));
    $gpu->addChild('description', htmlspecialchars($data['description']));
    
    echo "
    <tr>
        <td class=\"tooltip\">{$data['title']}
            <span class=\"tooltiptext\">{$data['description']}</span>
        </td>
        <td class=\"tooltip2\">{$data['BPeu']}
            <span class=\"tooltiptext2\">{$data['cpuModel']}</span>
        </td>
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