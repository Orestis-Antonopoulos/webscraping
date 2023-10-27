<?php
while (true) {
    shell_exec('php GPU-Scrapper.php');
    shell_exec('php Desktop-Scrapper.php');
    shell_exec('php CPU-Scrapper.php');
    shell_exec('php Laptop-Scrapper.php');
sleep(900);
}