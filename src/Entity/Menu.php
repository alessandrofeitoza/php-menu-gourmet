<?php

declare(strict_types=1);

namespace App\Entity;

class Menu 
{
    private array $meals = [];

    private array $keys = [];

    public function ask (?array $meals = null): bool|int
    {
        foreach ($meals ?? $this->meals as $key => $option) {
            $name = $option['name'];

            echo "O prato que você pensou é {$name}? (sim ou nao)\n";

            $response = trim(fgets(STDIN));

            if ("sim" === $response) {
                if (true === isset($option['options'])) {
                    $this->keys[] = $key;
                    $result = $this->ask($option['options']);

                    if (true === $result) {
                        return true;
                    }
                
                    $this->addOption($this->keys);
                    return true;
                }

                echo "\n\nÓtimo, acertei de novo\n\n";

                return true;
            }
        }

        return $key;
    }

    public function addOption(?array $keys = null): void
    {
        echo "Em qual prato você pensou?\n";

        $response = trim(fgets(STDIN));

        if (null !== $keys) {
            $array = [];

            foreach ($this->keys as $i => $k) {
                $array = $this->getMeals()[$k];
            }

            if (count($this->keys) === 1) {
                $this->meals[$keys[0]]['options'] = $this->meals[$keys[0]]['options'] ?? [];

                $this->meals[$keys[0]]['options'][] = [
                    'name' => $response,
                ];
            }

            if (count($this->keys) === 2) {
                $this->meals[$keys[0]]['options'] = $this->meals[$keys[0]]['options'] ?? [];

                $this->meals[$keys[0]]['options'][$keys[1]]['options'][] = [
                    'name' => $response,
                ];
            }

            if (count($this->keys) === 3) {
                $this->meals[$keys[0]]['options'] = $this->meals[$keys[0]]['options'] ?? [];

                $this->meals[$keys[0]]['options'][$keys[1]]['options'][] = [
                    'name' => $response,
                ];
            }
            
            return;
        }

        $this->meals[] = [
            'name' => $response,
        ];
    }

    public function getMeals(): array
    {
        return $this->meals;
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