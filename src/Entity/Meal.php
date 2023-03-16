<?php

declare(strict_types=1);

namespace App\Entity;

class Meal 
{
    private string $name;
    private array $options;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function setName(string $name): void 
    {
        $this->name = $name;
    }

    public function getOptions(): array 
    {
        return $this->options;
    }

    public function setOptions(array $options): void 
    {
        $this->options = $options;
    }

    public function addOption(Meal $meal): void
    {
        $this->options[] = $meal;
    }
}
