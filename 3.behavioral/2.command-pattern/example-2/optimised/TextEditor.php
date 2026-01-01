<?php

class TextEditor
{
    private string $text = '';

    public function write(string $text)
    {
        $this->text .= $text;
    }

    public function delete(int $length)
    {
        $this->text = substr($this->text, 0, -$length);
    }

    public function getText(): string
    {
        return $this->text;
    }
}

