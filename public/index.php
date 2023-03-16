<?php

require 'vendor/autoload.php';

use App\Entity\Menu;
use App\Entity\Meal;

$menu = new Menu();

$mealLasanha = new Meal('Lasanha');
$mealMacarrao = new Meal('algo com macarrão');
$mealMacarrao->setOptions([
    new Meal('Macarronada de Carne')
]);

$meal1 = new Meal('Massa');
$meal1->setOptions([
    $mealLasanha,
    $mealMacarrao,
]);

$meal2 = new Meal('Bolo de Chocolate');

$menu->setMeals([
    $meal1,
    $meal2,
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