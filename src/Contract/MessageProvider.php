<?php

declare(strict_types=1);

namespace Small\Utils\Contract;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     */
    public function getMessageBag(): MessageBag;
}
