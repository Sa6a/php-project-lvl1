<?php

namespace Php\Project\Lvl1\Engine;

use function cli\line;
use function cli\prompt;

function engine(string $gameRules, callable $getQuestion, callable $getCorrectAnswer): void
{
    $maxRounds = 3;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameRules);

    $countCorrectAnswers = 0;
    while ($countCorrectAnswers < 3) {
        $question = $getQuestion();
        line("Question: {$question}");
        $playersAnswer = prompt('Your answer');
        $correctAnswer = $getCorrectAnswer($question);
        if ($playersAnswer === $correctAnswer) {
            line('Correct!');
            $countCorrectAnswers += 1;
        } else {
            line("'{$playersAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            break;
        }
    }

    if ($countCorrectAnswers >= $maxRounds) {
        line("Congratulations, {$name}!");
    }
}
