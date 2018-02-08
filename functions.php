<?php
include 'config.php';

function downloadExcelFile() {
    //Download excel file and save as alko.xls
    $file = 'https://www.alko.fi/INTERSHOP/static/WFS/Alko-OnlineShop-Site/-/Alko-OnlineShop/fi_FI/Alkon%20Hinnasto%20Tekstitiedostona/alkon-hinnasto-tekstitiedostona.xls';
    $current = file_get_contents($file);
    file_put_contents("alko.xls", $current);
}

?>