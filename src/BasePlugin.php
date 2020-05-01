<?php declare (strict_types = 1);

namespace JacoBaldrich\BasePlugin;

final class BasePlugin implements Plugin
{
    private const HOOK = 'plugins_loaded';

    public function register(): void
    {
        \add_action(
            self::HOOK,
            $this
        );
    }

    public function __invoke(): void
    {
        if (! $this->dependenciesAreInstalled()) {
            return;
        }

        // Instantiate dependencies
        // Register use cases
    }

    private function dependenciesAreInstalled(): bool
    {
        return true; // check main class dependencies
    }
}
