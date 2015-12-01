<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filePath = 'leads.csv';

function insertCSV($filePath, PDO $con) {
    $csv = file($filePath);
    $leads = [];

    foreach ($csv as $line) {
    	$leads[] = str_getcsv($line);
    }
    foreach ($leads as $lead) {
    	$statement = $con->prepare("INSERT INTO Lead(age, name) VALUES(?,?)");
	$statement->execute($lead);
    }
    print_r($data);
}
insertCSV($filePath, $con);

?>

