<?php

declare(strict_types=1);

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\engine;
use function BrainGames\Misc\Gcd\findGcd;

function playGcd(): void
{
    $gameRules = 'Find the greatest common divisor of given numbers.';

    $getQuestion = function (): string {
        $num1 = rand(1, 99);
        $num2 = rand(1, 99);
        return "{$num1} {$num2}";
    };

    $getCorrectAnswer = function (string $expression): string {
        $expressionToList = explode(' ', $expression);
        $num1 = (int) $expressionToList[0];
        $num2 = (int) $expressionToList[1];
        return (string) findGcd($num1, $num2);
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
