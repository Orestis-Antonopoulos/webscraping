<?php
require 'vendor/autoload.php';
$httpClient = new \simplehtmldom\HtmlWeb();

// $IntelScores = ["1050ti" => 6302, ];
$scores = ["1050ti" => 6302, "1050" => 5044, "1060" => 9750, "1070ti" => 14720, "1070" => 13514, "1080ti" => 18539, "1080" => 15483, 
"1650SUPER" => 10112, "1650ti" => 7569, "1650" => 7860, "1660SUPER" => 12785, "1660ti" => 12961, "1660" => 11725,
"2050" => 6912, "2060SUPER" => 16585, "2060" => 14115, "2070SUPER" => 18262, "2070" => 16170, "2080SUPER" => 19598, "2080ti" => 21851, "2080" => 18803,
"3050" => 12985, "3060ti" => 20593, "3060" => 17117, "3070ti" => 23759, "3070" => 22474, "3080ti" => 27336 , "3080" => 25365, "3090ti" => 29833, "3090" => 26906,
"4060ti" => 22498, "4060" => 19514, "4070ti" => 31641, "4070" => 26840, "4080" => 34758, "4090" => 38892];

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
$images = [];
$query = "1050%201060%201070%201080%201650%201660%202050%202060%202070%202080%203050%203060%203070%203080%203090%204060%204070%204080%204090";
do {
    $html = $httpClient->load('https://www.insomnia.gr/classifieds/search/?&q=' . $query . '&type=classifieds_advert&page=' . $currentPage . '&nodes=11&sortby=relevancy');

    foreach ($html->find('.ipsStreamItem_title') as $element)                       {$titles[] = $element->plaintext;}
    foreach ($html->find('h2 span a') as $element)                                  {$links[] = $element->href;}
    foreach ($html->find('.ipsStream_snippetInfo p .ipsStream_price') as $element)  {$prices[] = $element->plaintext;}
    foreach ($html->find('ul.ipsList_inline li .ipsBadge') as $element)             {$types[] = $element->plaintext;}
    foreach ($html->find('.ipsSpacer_top.ipsSpacer_half.ipsType_richText.ipsType_break.ipsType_medium') as $element) {$descriptions[] = $element->plaintext;}
    foreach ($html->find('.ipsStreamItem_container') as $element)                   {$image = $element->find('.ipsImage.ipsStream_image', 0);
        if ($image) {$images[] = $image->{'data-src'};} else                        {$images[] = "public/images/cpu.svg";}}

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
            'cpuModel' => $cpuModels[$key],
            'image' => $images[$key],
        ];
    }

    $key++;
}

// Sort the array based on BPeu
usort($collectedData, function ($a, $b) {
    return $b['BPeu'] <=> $a['BPeu'];
});
$xml = new SimpleXMLElement('<root/>'); // Create the XML structure
foreach ($collectedData as $data) { // Loop through the data and add it to the XML
    $gpu = $xml->addChild('gpu');
    $gpu->addChild('title', htmlspecialchars($data['title']));
    $gpu->addChild('cpuModel',htmlspecialchars($data['cpuModel']));
    $gpu->addChild('BPeu', htmlspecialchars($data['BPeu']));
    $gpu->addChild('price', htmlspecialchars($data['price']));
    $gpu->addChild('link', htmlspecialchars($data['link']));
    $gpu->addChild('benchmark', htmlspecialchars($data['benchmark']));
    $gpu->addChild('description', htmlspecialchars($data['description']));   
    $gpu->addChild('image', htmlspecialchars($data['image']));
}
$xml->asXML('gpu.xml'); // Save the XML to a file
?>
