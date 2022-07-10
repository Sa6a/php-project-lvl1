<?php

declare(strict_types=1);

namespace BrainGames\Cli\Games\Progression;

use function BrainGames\Cli\Engine\engine;

function playProgression(): void
{
    $gameRules = 'What number is missing in the progression?';

    $getQuestion = function (): string {
        $lenProgression =  rand(5, 10);
        $stepProgression = rand(1, 7);
        $firstNumber = rand(1, 25);
        $progression = [$firstNumber];
        for ($i = 1; $i < $lenProgression; $i += 1) {
            $progression[] = $progression[$i - 1] + $stepProgression;
        }
        $hiddenElement = rand(0, $lenProgression - 1);
        $progression[$hiddenElement] = '..';
        return implode(' ', $progression);
    };

    $getCorrectAnswer = function (string $progression): string {
        $progressionArr = explode(' ', $progression);
        $iHidElem = array_search('..', $progressionArr);
        if ($iHidElem > 1) {
            $stepProgression = $progressionArr[$iHidElem - 1] - $progressionArr[$iHidElem - 2];
            return (string) ($progressionArr[$iHidElem - 1] + $stepProgression);
        } else {
            $stepProgression = $progressionArr[$iHidElem + 2] - $progressionArr[$iHidElem + 1];
            return (string) ($progressionArr[$iHidElem + 1] - $stepProgression);
        }
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
