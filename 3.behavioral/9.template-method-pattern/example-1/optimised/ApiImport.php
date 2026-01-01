<?php

require_once 'DataImportTemplate.php';

class ApiImport extends DataImportTemplate
{
    protected function validate(): void
    {
        echo "Validate API response\n";
    }

    protected function transform(): void
    {
        echo "Transform API payload\n";
    }
}

