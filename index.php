<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filePath = 'leads.csv';

function insertCSV($filePath) { #, PDO $con) {
    $csv = file($filePath);
    $data = [];

    foreach ($csv as $line) {
    	$data[] = str_getcsv($line);
    }
    print_r($data);
}
insertCSV($filePath); #, $con);
?>

