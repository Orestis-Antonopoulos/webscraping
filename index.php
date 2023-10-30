<?php include 'views/partials/header.php'; ?>
<?php function truncateText($text) {
  if (strlen($text) > 52) {
    return substr($text, 0, 52 - 3) . '...';
  }
  return $text;
} ?>
<div id="buttons">
    <button class="button" data-table="table3" name="Button3" onclick="showTable('table3', this)" style="position:relative;">
    <img src="public/images/cpu64x64.png" alt="CPU" style="width:32px; height:32px;">
    <div class="overbutton"></div>
    </button>
    <button class="button" data-table="table1" name="Button1" onclick="showTable('table1', this)" style="position:relative;">
    <img src="public/images/gpu64x64.png" alt="GPU" style="width:32px; height:32px;">
    <div class="overbutton"></div>
    </button>
    <button class="button" data-table="table2" name="Button2" onclick="showTable('table2', this)" style="position:relative;">
    <img src="public/images/desktop64x64.png" alt="Desktop" style="width:32px; height:32px;">
    <div class="overbutton"></div>
    </button>
    <button class="button" data-table="table4" name="Button4" onclick="showTable('table4', this)" style="position:relative;">
    <img src="public/images/laptop64x64.png" alt="CPU" style="width:32px; height:32px;">
    <div class="overbutton"></div>
    </button>
</div>

<div id="table1" class="grid-container">
<?php
$whichxml = 'gpu.xml';
foreach (simplexml_load_file($whichxml)->gpu as $gpu) { // Load XML and Loop through each 'gpu' element in the XML
    $title          = htmlspecialchars_decode((string) $gpu->title);
    $BPeu           = htmlspecialchars_decode((string) $gpu->BPeu);
    $price          = htmlspecialchars_decode((string) $gpu->price);
    $link           = htmlspecialchars_decode((string) $gpu->link);
    $benchmark      = htmlspecialchars_decode((string) $gpu->benchmark);
    $cpuModel       = htmlspecialchars_decode((string) $gpu->cpuModel);
    $description    = htmlspecialchars_decode((string) $gpu->description);
    $image          = htmlspecialchars_decode((string) $gpu->image);

echo "
    <div style=\"display:flex; flex-direction:column; align-items: center; width:220px; height:400px; border-radius:3px; padding-top:10px; margin:0 auto;\">
        <a href=\"{$link}\" target=\"_blank\" style=\"height:200px;\">
            <img src=\"$image\"style=\"opacity:66%;width:200px;height:200px;object-fit:cover; border-radius:3px;\"loading=\"lazy\">
        </a>
        <div class=\"title-container\">
            <img class=\"svg-icon\" src=\"public/images/T.svg\">
            <span class=\"title\" style=\"\">" . truncateText($title) . "</span>
        </div>
        <div class=\"date-container\">
            <img class=\"svg-icon\" src=\"public/images/calendar.svg\">
            <span> 10-Sep </span>
            <span style=\"margin:0 0 0 auto\"> 15:40 </span>
            <img class=\"svg-icon\" src=\"public/images/time.svg\">
        </div>

    </div>
";
}
echo "</div>";
?>
    


<div id="table2" class="table-container table2">
<table><tr><th>Title</th><th>Card</th><th>Benchy/Price</th><th>link</th></tr>
<?php
$GPUxml = simplexml_load_file('systems.xml'); // Load XML from a file
foreach ($GPUxml->gpu as $gpu) { // Loop through each 'gpu' element in the XML
    $title = htmlspecialchars_decode((string) $gpu->title);
    $BPeu = htmlspecialchars_decode((string) $gpu->BPeu);
    $price = htmlspecialchars_decode((string) $gpu->price);
    $link = htmlspecialchars_decode((string) $gpu->link);
    $benchmark = htmlspecialchars_decode((string) $gpu->benchmark);
    $cpuModel = htmlspecialchars_decode((string) $gpu->cpuModel);
    $description = htmlspecialchars_decode((string) $gpu->description);
    $image = htmlspecialchars_decode((string) $gpu->image);

echo "
<tr>
    <td class=\"tooltip\">{$title}    <span class=\"tooltiptext\">{$description}</span>                 </td>
    <td style=\"text-align: center;\">{$BPeu}                                                           </td>
    <td class=\"tooltip2\">{$benchmark}<br>/{$price}    <span class=\"tooltiptext2\">{$cpuModel}</span> </td>
    <td>
    <a href=\"{$link}\" target=\"_blank\">
        <img src=\"$image\"style=\"width:150px;height:150px;object-fit:cover; border-radius:5px;\"loading=\"lazy\">
    </a>
</td>
</tr>";
}
echo "</table></div>";
?>


</div>
<div id="table3" class="table-container table3">
<table><tr><th>Title</th><th>Card</th><th>Benchy/Price</th><th>link</th></tr>
<?php
$systemsXml = simplexml_load_file('cpu.xml'); // Load XML from a file
foreach ($systemsXml->gpu as $gpu) { // Loop through each 'gpu' element in the XML
    $title = htmlspecialchars_decode((string) $gpu->title);
    $BPeu = htmlspecialchars_decode((string) $gpu->BPeu);
    $price = htmlspecialchars_decode((string) $gpu->price);
    $link = htmlspecialchars_decode((string) $gpu->link);
    $benchmark = htmlspecialchars_decode((string) $gpu->benchmark);
    $cpuModel = htmlspecialchars_decode((string) $gpu->cpuModel);
    $description = htmlspecialchars_decode((string) $gpu->description);
    $image = htmlspecialchars_decode((string) $gpu->image);

echo "
<tr>
    <td class=\"tooltip\">{$title}    <span class=\"tooltiptext\">{$description}</span>                 </td>
    <td style=\"text-align: center;\">{$BPeu}                                                           </td>
    <td class=\"tooltip2\">{$benchmark}<br>/{$price}    <span class=\"tooltiptext2\">{$cpuModel}</span> </td>
    <td>
        <a href=\"{$link}\" target=\"_blank\">
            <img src=\"$image\"style=\"width:150px;height:150px;object-fit:cover; border-radius:5px;\"loading=\"lazy\">
        </a>
    </td>
</tr>";
}
echo "</table></div>";
?>


<div id="table4" class="table-container table4">
<table><tr><th>Title</th><th>Card</th><th>Benchy/Price</th><th>link</th></tr>
<?php
$systemsXml = simplexml_load_file('laptops.xml'); // Load XML from a file
foreach ($systemsXml->gpu as $gpu) { // Loop through each 'gpu' element in the XML
    $title = htmlspecialchars_decode((string) $gpu->title);
    $BPeu = htmlspecialchars_decode((string) $gpu->BPeu);
    $price = htmlspecialchars_decode((string) $gpu->price);
    $link = htmlspecialchars_decode((string) $gpu->link);
    $benchmark = htmlspecialchars_decode((string) $gpu->benchmark);
    $cpuModel = htmlspecialchars_decode((string) $gpu->cpuModel);
    $description = htmlspecialchars_decode((string) $gpu->description);
    $image = htmlspecialchars_decode((string) $gpu->image);

echo "
<tr>
    <td class=\"tooltip\">{$title}    <span class=\"tooltiptext\">{$description}</span>                 </td>
    <td style=\"text-align: center;\">{$BPeu}                                                           </td>
    <td class=\"tooltip2\">{$benchmark}<br>/{$price}    <span class=\"tooltiptext2\">{$cpuModel}</span> </td>
    <td>
    <a href=\"{$link}\" target=\"_blank\">
        <img src=\"$image\"style=\"width:150px;height:150px;object-fit:cover; border-radius:5px;\"loading=\"lazy\">
    </a>
</td>
</tr>";
}
echo "</table></div>";
?>

<?php include 'views/partials/footer.php'; ?>
