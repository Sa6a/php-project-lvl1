<?php

namespace Php\Project\Lvl1\Even;

use function cli\line;
use function cli\prompt;

function playEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $countCorrectAnswers = 0;
    while ($countCorrectAnswers < 3) {
        $number = rand();
        line("Question: {$number}");
        $isEven = $number % 2 === 0 ? 'yes' : 'no';
        $answer = prompt('Your answer');
        if ($answer === $isEven) {
            line('Correct!');
            $countCorrectAnswers += 1;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$isEven}'.");
            line("Let's try again, {$name}!");
            break;
        }
    }
    if ($countCorrectAnswers > 2) {
        line("Congratulations, {$name}!");
    }
}
