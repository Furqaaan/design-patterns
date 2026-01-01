<?php

class WriteCommand implements Command
{
    public function __construct(
        private TextEditor $editor,
        private string $text
    ) {}

    public function execute(): void
    {
        $this->editor->write($this->text);
    }

    public function undo(): void
    {
        $this->editor->delete(strlen($this->text));
    }
}

