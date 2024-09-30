<?php
error_reporting(E_ALL & ~E_WARNING);
ini_set('display_errors', 1);

function errorHandling(int $type, string $message, ?string $file = null, ?int $line = null)
{
    date_default_timezone_set('Asia/Jakarta');

    $date = date("d/m/Y H:i:s");

    echo $Error = "$date Error: [$type] $message in $file on line $line";

    error_log($Error . PHP_EOL, 3, '../../log/error_log.txt');
    error_log($Error . PHP_EOL, 3, '../../log/error_log.log');

    exit;
}
