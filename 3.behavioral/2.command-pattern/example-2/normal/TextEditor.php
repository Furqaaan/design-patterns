<?php

class TextEditor
{
    private string $text = '';

    public function handle(string $action, string $value = '')
    {
        if ($action === 'write') {
            $this->text .= $value;
        }

        if ($action === 'delete') {
            $this->text = substr($this->text, 0, -strlen($value));
        }

        echo "Current text: {$this->text}\n";
    }
}

$editor = new TextEditor();
$editor->handle('write', 'Hello ');
$editor->handle('write', 'World');
$editor->handle('delete', 'World');

