<?php

declare(strict_types=1);

namespace Php\Project\Lvl1\Games\Prime;

use function Php\Project\Lvl1\Engine\engine;

function playPrime(): void
{
    $gameRules = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $getQuestion = function (): int {
        $number = rand(0, 99);
        return $number;
    };

    $getCorrectAnswer = function (int $number): string {

        return gmp_prob_prime($number) === 2 ? 'yes' : 'no';
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
