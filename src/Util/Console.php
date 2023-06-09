<?php

declare(strict_types=1);

namespace App\Util;

trait Console 
{
    public static function writeLn(string $text): void
    {
        echo "{$text}\n";
    }

    public static function read(): string
    {
        return trim(fgets(STDIN));
    }
}