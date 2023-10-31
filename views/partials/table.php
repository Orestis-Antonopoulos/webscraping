<?php foreach (simplexml_load_file($whichxml)->gpu as $gpu) { // Load XML and Loop through each 'gpu' element in the XML
    $title          = htmlspecialchars_decode((string) $gpu->title);
    $BPeu           = htmlspecialchars_decode((string) $gpu->BPeu);
    $price          = htmlspecialchars_decode((string) $gpu->price);
    $link           = htmlspecialchars_decode((string) $gpu->link);
    $benchmark      = htmlspecialchars_decode((string) $gpu->benchmark);
    $cpuModel       = htmlspecialchars_decode((string) $gpu->cpuModel);
    $description    = htmlspecialchars_decode((string) $gpu->description);
    $image          = htmlspecialchars_decode((string) $gpu->image);

echo "
    <div style=\"display:flex; flex-direction:column; align-items: center; width:220px; height:350px; border-radius:3px; padding-top:10px; margin:0 auto;\">
        <a href=\"{$link}\" target=\"_blank\" style=\"height:200px;\">
            <img src=\"$image\"style=\"opacity:66%;width:200px;height:200px;object-fit:cover; border-radius:3px;\"loading=\"lazy\">
        </a>
        <div class=\"title-container\">
            <img class=\"svg-icon\" src=\"public/images/T.svg\">
            <span class=\"title\" style=\"\">" . truncateText($title) . "</span>
        </div>
        <div class=\"date-container\">
            <div style=\"display:flex; flex-direction:row; align-items:center; width:100px;\">
                <img class=\"svg-icon\" src=\"public/images/calendar.svg\">
                <span> 10-Sep </span>
            </div>
            <div style=\"display:flex; flex-direction:row; align-items:center; width:100px;justify-content:end;\">
                <span> 15:40 </span>
                <img class=\"svg-icon\" src=\"public/images/time.svg\">
            </div>
        </div>
        <div style=\"display:flex; flex-direction:column;\">
            <div style=\"display:flex; flex-direction:row; align-items:center; height:24px; width:200px;\">
                <div style=\"display:flex; flex-direction:row; align-items:center;width:110px;justify-content:end;\">
                    <img class=\"svg-icon\" src=\"public/images/cpu.svg\">
                    <span>$benchmark /</span>
                </div>
                <div style=\"display:flex; flex-direction:row; align-items:center; width:90px;\">
                    <img class=\"svg-icon\" src=\"public/images/euro.svg\">
                    <span style=\"font-weight:bold;\">" . cleanprice($price) . "</span>
                </div>
            </div>
            <div style=\"width:200px; display:flex;justify-content:center;height:24px;align-items:center;\">
                <span style=\"font-size:14px;\">Benchmark / euro = </span>
                <span style=\"padding-left:5px; font-weight:bold;\">$BPeu</span>
            </div>
        </div>
    </div>
";
}