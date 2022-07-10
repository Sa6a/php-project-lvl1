<?php

declare(strict_types=1);

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\engine;

function playCalc(): void
{
    $gameRules = 'What is the result of the expression?';

    $getQuestion = function (): string {
        $num1 = rand(0, 99);
        $num2 = rand(0, 99);
        $numForOperation = rand(0, 2);
        if ($numForOperation === 0) {
            $operation = '+';
        } elseif ($numForOperation === 1) {
            $operation = '-';
        } else {
            $operation = '*';
        }
        return "{$num1} {$operation} {$num2}";
    };

    $getCorrectAnswer = function (string $expression): string {
        $expressionToList = explode(' ', $expression);
        $operation = $expressionToList[1];
        $num1 = $expressionToList[0];
        $num2 = $expressionToList[2];
        if ($operation === '+') {
            return (string) $num1 + $num2;
        } elseif ($operation === '-') {
            return (string) $num1 - $num2;
        } else {
            return (string) $num1 * $num2;
        }
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
