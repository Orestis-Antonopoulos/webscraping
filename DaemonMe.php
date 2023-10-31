<?php
while (true) {
    shell_exec('php Scrapper-GPU.php');
    shell_exec('php Scrapper-Desktop.php');
    shell_exec('php Scrapper-CPU.php');
    shell_exec('php Scrapper-Laptop.php');
sleep(900);
}