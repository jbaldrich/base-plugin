<?php

namespace JacoBaldrich\BasePlugin\Domain;

interface Queue
{
    public function name(): string;
    public function priority(): int;
}
