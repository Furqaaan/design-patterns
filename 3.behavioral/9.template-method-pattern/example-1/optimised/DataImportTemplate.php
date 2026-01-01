<?php

abstract class DataImportTemplate
{
    // The template method defines the algorithm skeleton (final = cannot be overridden)
    final public function import(): void
    {
        $this->validate();
        $this->transform();
        $this->save();
        $this->notify();
    }

    abstract protected function validate(): void;
    abstract protected function transform(): void;

    protected function save(): void
    {
        echo "Save data to DB\n";
    }

    protected function notify(): void
    {
        echo "Notify user\n";
    }
}

