<?php include 'views/partials/header.php'; ?>

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
    <a href="phpinfo.php" target="_blank" style="">
        <img src="public/images/questionmark.svg" alt="About" style="width:16px; height:16px; margin-left:16px;">
    </a>
</div>

<div id="page-container">
    <div id="sidebar" style="height: 100%;background-color: rgb(255,255,255,0.35);width: 200px;position: absolute;border-radius: 5px;">
    <input type="radio" id="html" name="fav_language" value="HTML">
    </div>
    <div id="table1" class="grid-container">
    <?php $whichxml = 'public/xmls/gpu.xml';
    include 'views/partials/table.php';?>
    </div>

    <div id="table2" class="grid-container">
    <?php $whichxml = 'public/xmls/systems.xml';
    include 'views/partials/table.php';?>
    </div>

    <div id="table3" class="grid-container">
    <?php $whichxml = 'public/xmls/cpu.xml';
    include 'views/partials/table.php';?>
    </div>

    <div id="table4" class="grid-container">
    <?php $whichxml = 'public/xmls/laptops.xml';
    include 'views/partials/table.php';?>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
