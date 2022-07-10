<?php

namespace BrainGames\Cli\Games\Gcd;

use function BrainGames\Cli\Engine\engine;

function playGcd(): void
{
    $gameRules = 'Find the greatest common divisor of given numbers.';

    $getQuestion = function (): string {
        $num1 = rand(0, 99);
        $num2 = rand(0, 99);
        return "{$num1} {$num2}";
    };

    $getCorrectAnswer = function (string $expression): string {
        $expressionToList = explode(' ', $expression);
        $num1 = (int) $expressionToList[0];
        $num2 = (int) $expressionToList[1];
        return (string) gmp_gcd($num1, $num2);
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
