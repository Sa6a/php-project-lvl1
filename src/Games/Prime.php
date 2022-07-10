<?php

declare(strict_types=1);

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\engine;

function playPrime(): void
{
    $gameRules = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $getQuestion = function (): int {
        $number = rand(0, 99);
        return $number;
    };

    $getCorrectAnswer = function (int $number): string {
        for ($i = 2; $i <= sqrt($number); $i += 1) {
            if ($number % $i == 0) {
                return 'no';
            }
        }
        return 'yes';
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
