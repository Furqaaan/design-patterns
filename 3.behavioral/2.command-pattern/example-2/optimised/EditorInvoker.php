<?php

class EditorInvoker
{
    private array $history = [];

    public function run(Command $command)
    {
        $command->execute();
        $this->history[] = $command;
    }

    public function undo()
    {
        $command = array_pop($this->history);
        if ($command) {
            $command->undo();
        }
    }
}

$editor = new TextEditor();
$invoker = new EditorInvoker();

$invoker->run(new WriteCommand($editor, 'Hello '));
$invoker->run(new WriteCommand($editor, 'World'));

echo $editor->getText() . "\n"; // Hello World

$invoker->undo();
echo $editor->getText() . "\n"; // Hello 

