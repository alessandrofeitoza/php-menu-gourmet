<?php

declare(strict_types=1);

namespace App\Entity;

use App\Util\Console;

class Menu 
{
    private array $meals = [];

    private array $keys = [];

    public function ask (?array $meals = null): bool|int
    {
        foreach ($meals ?? $this->meals as $key => $meal) {
            $name = $meal->getName();

            Console::writeLn("O prato que você pensou é {$name}? (sim ou nao)");

            $response = Console::read();

            if ("sim" !== $response) {
                continue;
            }

            if (0 < count($meal->getOptions())) {
                $this->keys[] = $key;
                $result = $this->ask($meal->getOptions());

                if (true === $result) {
                    return true;
                }
            
                $this->addOption($this->keys);
                return true;
            }

            Console::writeLn("\n\nÓtimo, acertei de novo\n\n");

            return true;
        }

        return $key;
    }

    public function addOption(?array $keys = null): void
    {
        Console::writeLn("Em qual prato você pensou?");

        $response = Console::read();

        if (null !== $keys) {
            $array = [];

            foreach ($this->keys as $i => $k) {
                $array = $this->getMeals()[$k];
            }

            if (count($this->keys) === 1) {
                $this->meals[$keys[0]]->addOption(
                    new Meal($response)
                );
            }

            if (count($this->keys) === 2) {
                $this->meals[$keys[0]]->getOptions()[$keys[1]]->addOption(
                    new Meal($response)
                );
            }

            if (count($this->keys) === 3) {
                $this->meals[$keys[0]]->getOptions()[$keys[1]]->getOptions()[$keys[2]]->addOption(
                    new Meal($response)
                );
            }
            
            return;
        }

        $this->addMeal(
            new Meal($response)
        );
    }

    public function getMeals(): array
    {
        return $this->meals;
    }

    public function addMeal(Meal $meal): void
    {
        $this->meals[] = $meal;
    }

    public function setMeals(array $meals): void
    {
        $this->meals = $meals;
    }

    public function getKeys(): array
    {
        return $this->keys;
    }
}