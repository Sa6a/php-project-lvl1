<?php

declare(strict_types=1);

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\engine;

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
        while (true) {
            $remains = $num1 % $num2;
            if ($remains === 0) {
                return (string) $num2;
            } else {
                $num1 = $num2;
                $num2 = $remains;
            }
        }
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
