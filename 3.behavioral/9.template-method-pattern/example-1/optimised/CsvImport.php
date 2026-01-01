<?php

require_once 'DataImportTemplate.php';

class CsvImport extends DataImportTemplate
{
    protected function validate(): void
    {
        echo "Validate CSV data\n";
    }

    protected function transform(): void
    {
        echo "Transform CSV rows\n";
    }
}

