<?php

try {
    $con = new PDO("sqlite::memory:");
} catch(PDOException $e) {
    echo $e->getMessage();
}

$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$setup_table_query = "CREATE TABLE IF NOT EXSITS Lead (
	LeadID INTEGER PRIMARY KEY AUTOINCREMENT,
	LeadName VARCHAR(90)
	)";

$con->exec($setup_table_query);

$filePath = 'leads.csv';

function insertCSV($filePath, PDO $con) {
    $csv = file($filePath);
    $leads = [];

    foreach ($csv as $line) {
    	$leads[] = str_getcsv($line);
    }
    foreach ($leads as $lead) {
    	$statement = $con->prepare("INSERT INTO Lead(LeadName) VALUES(?)");
	$statement->execute([$lead[1]]);
    }
    print_r($leads);
}
insertCSV($filePath, $con);
?>

