<?php

declare(strict_types=1);

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\engine;

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
        $iHidElem = array_search('..', $progressionArr, true);
        if ($iHidElem > 1) {
            $stepProgression = (int) $progressionArr[$iHidElem - 1] - (int) $progressionArr[$iHidElem - 2];
            return (string) ((int) $progressionArr[$iHidElem - 1] + $stepProgression);
        } else {
            $shiftedValueTwo = (int) $progressionArr[(int) $iHidElem + 2];
            $shiftedValueOne = (int) $progressionArr[(int) $iHidElem + 1];
            $stepProgression = $shiftedValueTwo - $shiftedValueOne;
            return (string) ($shiftedValueOne - $stepProgression);
        }
    };

    engine($gameRules, $getQuestion, $getCorrectAnswer);
}
