<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I can't think of a title at 4:30am</title>
    <style>
        body {font-family: 'Roboto', sans-serif; 
        color:#999;
        background-color: rgb(220, 227, 255);
        padding-top:60px;
        animation:backgroundAnimation 20s infinite;}
        @keyframes backgroundAnimation {
        0% {background-color: rgb(11, 44, 74);}
        50% {background-color: rgb(42, 24, 76);}
        100% {background-color: rgb(11, 44, 74);}}
        /* waves animation start */
            .ocean {
            height: 80px; /* change the height of the waves here */
            width: 100%;
            position: fixed;
            z-index: 10;
            top: 0;
            left: 0;
            right: 0;
            transform: rotate(180deg);
            overflow-x: hidden;
            pointer-events: none;

            }

            .wave {
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 88.7'%3E%3Cpath d='M800 56.9c-155.5 0-204.9-50-405.5-49.9-200 0-250 49.9-394.5 49.9v31.8h800v-.2-31.6z' fill='%23FFF'/%3E%3C/svg%3E");
            position: absolute;
            width: 200%;
            height: 100%;
            animation: wave 7s -3s linear infinite;
            transform: translate3d(0, 0, 0);
            opacity: 0.9;
            z-index: 2;
            }

            .wave:nth-of-type(2) {
            bottom: 0;
            animation: wave 9s linear reverse infinite;
            opacity: 0.5;
            z-index: 2;
            }

            .wave:nth-of-type(3) {
            bottom: 0;
            animation: wave 11s -1s linear infinite;
            opacity: 0.5;
            z-index: 2;
            }

            @keyframes wave {
                0% {transform: translateX(0);}
                50% {transform: translateX(-360px);}
                100% {transform: translateX(-720px);}
            }
        /* waves animation end */
        th {color:#700;}
        td {
            background-color:#eee;
            padding:5px;
            border: solid black 1px;
            border-radius: 6px;
            max-width:400px;
            min-width:40px;
            height:50px;}
        table {display:flex;justify-content: center;border-spacing: 3px 6px;}
        .tooltip {position: relative; width:400px;}
        .tooltip2 {position: relative; width:100px; text-align: center;}
        .tooltiptext {
            visibility: hidden;
            position:absolute;
            z-index: auto;
            background-color:#eee;
            padding:5px;
            /* border: solid black 1px; */
            border-radius: 6px;
            width:399px;
            height:49px;
            left:1px;
            top:1px;
            font-size:13px;
            overflow:auto;}
        .tooltiptext2 {
            visibility: hidden;
            position:absolute;
            z-index: auto;
            background-color:#eee;
            padding:5px;
            /* border: solid black 1px; */
            border-radius: 6px;
            width:99px;
            height:49px;
            left:1px;
            top:1px;
            overflow:auto;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight:bold;}
        .tooltip:hover .tooltiptext {visibility: visible;}
        .tooltip2:hover .tooltiptext2 {visibility: visible;}

        #table1, #table2, #table3, #table4 {transition: opacity 0.15s linear; display:none; opacity: 0;}
        #buttons {
            display:flex;
            justify-content: center;
            gap:10px;
            position:fixed;
            z-index: 10;
            width:100%;
            top:10px;
        }
        .button {
            width:40px;
            height:40px;
            /* clip-path: polygon(10px 0%, 100% 0, 100% 15px, 70px 25px, 0 100%, 0 10px); */
            border:none;
            border-radius:5px;
            background-color:rgb(100% 100% 100% / 0.2);
            box-shadow: 0px 2px 5px 0 rgb(0 0 0 / 0.2);
            padding:0;
            background:white;

        }
        .overbutton {
            display: none;  /* Initially hide the overbutton */
            position: absolute;
            background: black;
            opacity: 0.1;  /* 10% opacity */
            top: 0;
            left: 0;
            width: 40px;
            height: 40px;
            border-radius: 5px;
        }
        .button.active .overbutton {
            display: block;  /* Show the overbutton when parent button is active */
            transition: opacity 0.15s linear;
        }
        @keyframes active-animation {
        0% {background-color: rgb(93% 93% 93% / 0.7);}
        50% {background-color: rgb(90% 90% 93% / 1);}
        100% {background-color: rgb(93% 93% 93% / 0.7);}
        }

        @media (min-width: 768px) and (max-width: 1024px) {
        /* CSS for tablet */
        }
        @media (max-width: 767px) {
            .wave {
                width:1442px;
            }
            @keyframes wave {
                0% {transform: translateX(0);}
                50% {transform: translateX(-360px);}
                100% {transform: translateX(-720px);}
            }
        }

    </style>
</head>
<body>
<div class="ocean">
  <div class="wave"></div>
  <div class="wave"></div>
  <div class="wave"></div>
</div>
<div id="buttons">
    <button class="button" data-table="table3" name="Button3" onclick="showTable('table3', this)" style="position:relative;">
    <img src="public/images/cpu64x64.png" alt="CPU" style="width:32px; height:32px;">
    <div class="overbutton" style="position:absolute; background:black; opacity:10%; top:0; left:0; width:40px; height:40px; border-radius:5px;"></div>
    </button>
    <button class="button" data-table="table1" name="Button1" onclick="showTable('table1', this)" style="position:relative;">
    <img src="public/images/gpu64x64.png" alt="GPU" style="width:32px; height:32px;">
    <div class="overbutton" style="position:absolute; background:black; opacity:10%; top:0; left:0; width:40px; height:40px; border-radius:5px;"></div>
    </button>
    <button class="button" data-table="table2" name="Button2" onclick="showTable('table2', this)" style="position:relative;">
    <img src="public/images/desktop64x64.png" alt="Desktop" style="width:32px; height:32px;">
    <div class="overbutton" style="position:absolute; background:black; opacity:10%; top:0; left:0; width:40px; height:40px; border-radius:5px;"></div>
    </button>
    <button class="button" data-table="table4" name="Button4" onclick="showTable('table4', this)" style="position:relative;">
    <img src="public/images/laptop64x64.png" alt="CPU" style="width:32px; height:32px;">
    <div class="overbutton" style="position:absolute; background:black; opacity:10%; top:0; left:0; width:40px; height:40px; border-radius:5px;"></div>
    </button>
</div>




<div id="table1">
    <table><tr><th>Title</th><th>Card</th><th>Benchy/Price</th><th>link</th></tr>
<?php
$GPUxml = simplexml_load_file('gpu.xml'); // Load XML from a file
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
    


<div id="table2" class="table-container table2">
<table><tr><th>Title</th><th>Card</th><th>Benchy/Price</th><th>link</th></tr>
<?php
$systemsXml = simplexml_load_file('systems.xml'); // Load XML from a file
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


</body>
</html>

<script>
    function showTable(showID) {
        ['table1', 'table2', 'table3', 'table4'].forEach(id => {
            const el = document.getElementById(id);
            const btn = document.querySelector(`button[data-table="${id}"]`);  // Get the button element
            if (id === showID) {
                btn.classList.add('active');
                setTimeout(() => {
                    el.style.display = 'block';
                    // Force a reflow to let the browser know that the 'display' has changed
                    void el.offsetWidth; 
                    el.style.opacity = 1;
                    
                }, 150);
            } else {
                el.style.opacity = 0;
                setTimeout(() => el.style.display = 'none', 150);
                btn.classList.remove('active');
            }
        });
    }
</script>