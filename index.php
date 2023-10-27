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
        0% {background-color: rgb(183, 197, 201);}
        50% {background-color: rgb(209, 217, 255);}
        100% {background-color: rgb(183, 197, 201);}}
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

        #table1, #table2, #table3, #table4 {transition: opacity 0.25s ease-in-out; display:none; opacity: 0;}
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
            width:80px;
            height:25px;
            /* clip-path: polygon(10px 0%, 100% 0, 100% 15px, 70px 25px, 0 100%, 0 10px); */
            border:none;
            border-radius:5px;
            background-color:rgb(100% 100% 100% / 0.2);
            box-shadow: 0px 2px 5px 0 rgb(0 0 0 / 0.2);

        }
        .active {
            box-shadow: none;
            animation:active-animation 10s infinite;
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
                width:1440px;
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
    <input type="button" class="button" data-table="table3" name="Button3" value="CPU" onclick="showTable('table3', this)" />
    <input type="button" class="button" data-table="table1" name="Button1" value="GPU" onclick="showTable('table1', this)" />
    <input type="button" class="button" data-table="table2" name="Button2" value="Desktop" onclick="showTable('table2', this)" />
    <input type="button" class="button" data-table="table4" name="Button4" value="Laptop" onclick="showTable('table4', this)" />
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

echo "
<tr>
    <td class=\"tooltip\">{$title}    <span class=\"tooltiptext\">{$description}</span>                 </td>
    <td style=\"text-align: center;\">{$BPeu}                                                           </td>
    <td class=\"tooltip2\">{$benchmark}<br>/{$price}    <span class=\"tooltiptext2\">{$cpuModel}</span> </td>
    <td>    <a href=\"{$link}\" target=\"_blank\">    <button>Visit</button>    </a>                    </td>
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

echo "
<tr>
    <td class=\"tooltip\">{$title}    <span class=\"tooltiptext\">{$description}</span>                 </td>
    <td style=\"text-align: center;\">{$BPeu}                                                           </td>
    <td class=\"tooltip2\">{$benchmark}<br>/{$price}    <span class=\"tooltiptext2\">{$cpuModel}</span> </td>
    <td>    <a href=\"{$link}\" target=\"_blank\">    <button>Visit</button>    </a>                    </td>
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

echo "
<tr>
    <td class=\"tooltip\">{$title}    <span class=\"tooltiptext\">{$description}</span>                 </td>
    <td style=\"text-align: center;\">{$BPeu}                                                           </td>
    <td class=\"tooltip2\">{$benchmark}<br>/{$price}    <span class=\"tooltiptext2\">{$cpuModel}</span> </td>
    <td>    <a href=\"{$link}\" target=\"_blank\">    <button>Visit</button>    </a>                    </td>
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

echo "
<tr>
    <td class=\"tooltip\">{$title}    <span class=\"tooltiptext\">{$description}</span>                 </td>
    <td style=\"text-align: center;\">{$BPeu}                                                           </td>
    <td class=\"tooltip2\">{$benchmark}<br>/{$price}    <span class=\"tooltiptext2\">{$cpuModel}</span> </td>
    <td>    <a href=\"{$link}\" target=\"_blank\">    <button>Visit</button>    </a>                    </td>
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
            const btn = document.querySelector(`input[data-table="${id}"]`);  // Get the button element
            if (id === showID) {
                el.style.display = 'block';
                // Force a reflow to let the browser know that the 'display' has changed
                void el.offsetWidth; 
                el.style.opacity = 1;
                btn.classList.add('active');
            } else {
                el.style.opacity = 0;
                setTimeout(() => el.style.display = 'none', 250);
                btn.classList.remove('active');
            }
        });
    }
</script>