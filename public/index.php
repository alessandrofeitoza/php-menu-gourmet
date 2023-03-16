<?php

require 'vendor/autoload.php';

use App\Entity\Menu;
use App\Entity\Meal;
use App\Util\Console;

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
    Console::writeLn("\nPense num prato que você gosta e tecle ENTER ou digite ENCERRAR");

    $response = Console::read();

    if ('ENCERRAR' === $response) {
        Console::writeLn("----- FIM -----");
        die();
    }

    $result = $menu->ask();

    if (true === $result) {
        continue;
    }

    $menu->addOption();
}