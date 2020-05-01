<?php

namespace JacoBaldrich\BasePlugin\Domain;

interface EventBus
{
    public function publish(Queue $queue, Event $event): void;
}
