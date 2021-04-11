<?php

declare(strict_types=1);

namespace App;

final class A
{
    private array $dependencies = [];

    public function setDependency(string $name, callable $factory): void
    {
        $this->dependencies[$name] = $factory;
    }

    public function getDependency(string $name): mixed
    {
        $factory = $this->dependencies[$name]
            ?? throw new \InvalidArgumentException('Invalid dependency!');

        return $factory();
    }
}
