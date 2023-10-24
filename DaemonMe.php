<?php
while (true) {
    shell_exec('php GPU-Scrapper.php');
    shell_exec('php Systems-Scrapper.php');
    shell_exec('php CPU-Scrapper.php');
sleep(900);
}