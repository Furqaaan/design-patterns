<?php

class DeleteCommand implements Command
{
    private string $deletedText = '';

    public function __construct(
        private TextEditor $editor,
        private int $length
    ) {}

    public function execute(): void
    {
        $this->deletedText = substr(
            $this->editor->getText(),
            -$this->length
        );

        $this->editor->delete($this->length);
    }

    public function undo(): void
    {
        $this->editor->write($this->deletedText);
    }
}

