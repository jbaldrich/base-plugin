<?php declare(strict_types=1);

namespace JacoBaldrich\BasePlugin\Infrastructure;

use Closure;
use JacoBaldrich\BasePlugin\Domain\Event;
use JacoBaldrich\BasePlugin\Domain\EventBus;
use JacoBaldrich\BasePlugin\Domain\Queue;
use ReflectionFunction;

final class WPEventBus implements EventBus
{
    /** @var \WP_Hook */
    private $wpHook;

    public function __construct(\WP_Hook $wpHook)
    {
        $this->wpHook = $wpHook;
    }

    public function publish(Queue $queue, Event $event): void
    {
        $this->wpHook->add_filter(
            $queue->name(),
            $event,
            $queue->priority(),
            $this->eventArguments($event)
        );
    }

    private function eventArguments(callable $event): int
    {
        $closure = Closure::fromCallable($event);
        $function = new ReflectionFunction($closure);
        return $function->getNumberOfParameters();
    }
}
