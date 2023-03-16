<?php

require 'vendor/autoload.php';

use App\Entity\Menu;
use App\Entity\Meal;

$menu = new Menu();

$menu->setMeals([
    [
        'name' => 'Massa',
        'options' => [
            [
                'name' => 'Lasanha',
            ],
            [
                'name' => 'algo com macarrão',
                'options' => [
                    [
                        'name' => 'Macarronada de Carne',
                    ],
                ],
            ]
        ],
    ],
    [
        'name' => 'Bolo de Chocolate',
    ],
]);


while (true) {
    echo "\nPense num prato que você gosta e tecle ENTER ou digite ENCERRAR \n";

    $response = trim(fgets(STDIN));

    if ('ENCERRAR' === $response) {
        var_dump($menu->getMeals());

        var_dump($menu->getKeys());
        die("----- FIM -----\n");
    }

    $result = $menu->ask();

    if (true === $result) {
        continue;
    }

    $menu->addOption();
}