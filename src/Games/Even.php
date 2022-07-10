<?php

declare(strict_types=1);

namespace BrainGames\Games\Even;

use function BrainGames\Engine\engine;

function playEven(): void
{
    $gameRules = 'Answer "yes" if the number is even, otherwise answer "no".';

    $getQuestion = function (): int {
        return rand(0, 99);
    };

    $getCorrectAnswer = function (int $number): string {
        return $number % 2 === 0 ? 'yes' : 'no';
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
