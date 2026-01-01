<?php

require_once 'DataImportTemplate.php';
require_once 'CsvImport.php';
require_once 'ApiImport.php';

$importer = new CsvImport();
$importer->import();

echo "\n";

$importer = new ApiImport();
$importer->import();

