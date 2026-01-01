<?php

class OrderController
{
    public function handle(Command $command)
    {
        $command->execute();
    }
}

$controller = new OrderController();

$commandMap = [
    'approve' => new ApproveOrderCommand(),
    'cancel'  => new CancelOrderCommand(),
    'refund'  => new RefundOrderCommand(),
];

$controller->handle($commandMap[$action]);
