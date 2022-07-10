<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS = 3;

function engine(string $gameRules, callable $getQuestion, callable $getCorrectAnswer): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameRules);

    $countCorrectAnswers = 0;
    while ($countCorrectAnswers < MAX_ROUNDS) {
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
            return;
        }
    }
    line("Congratulations, {$name}!");
}
