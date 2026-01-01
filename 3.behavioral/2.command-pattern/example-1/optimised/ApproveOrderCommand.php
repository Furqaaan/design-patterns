<?php

class ApproveOrderCommand implements Command
{
    public function execute(): void
    {
        echo "Order approved\n";
        echo "Stock reduced\n";
        echo "Email sent\n";
    }
}
