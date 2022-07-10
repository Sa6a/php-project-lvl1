<?php

declare (strict_types=1);

namespace BrainGames\Misc\Gcd;

function findGcd(int $num1, int $num2): int
{
    if ($num1 % $num2 === 0) {
        return $num2;
    }
    return findGcd($num2, $num1 % $num2);
}
