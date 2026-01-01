<?php

class CsvImportService
{
    public function import(): void
    {
        echo "Validate CSV\n";
        echo "Transform CSV\n";
        echo "Save CSV data\n";
        echo "Notify user\n";
    }
}

class ApiImportService
{
    public function import(): void
    {
        echo "Validate API data\n";
        echo "Transform API data\n";
        echo "Save API data\n";
        echo "Notify user\n";
    }
}

$csvImporter = new CsvImportService();
$csvImporter->import();

echo "\n";

$apiImporter = new ApiImportService();
$apiImporter->import();

