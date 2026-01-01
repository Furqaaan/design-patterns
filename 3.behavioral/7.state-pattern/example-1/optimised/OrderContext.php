<?php

require_once 'interfaces/OrderState.php';

class OrderContext
{
    private OrderState $state;

    public function __construct(OrderState $initialState = null)
    {
        if ($initialState === null) {
            require_once 'states/PendingState.php';
            $this->state = new PendingState();
        } else {
            $this->state = $initialState;
        }
    }

    public function setState(OrderState $state): void
    {
        $this->state = $state;
    }

    public function pay(): void
    {
        $this->state->pay($this);
    }

    public function ship(): void
    {
        $this->state->ship($this);
    }

    public function cancel(): void
    {
        $this->state->cancel($this);
    }
}

