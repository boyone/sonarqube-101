<?php

namespace App;

class Calculator
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public function subtract(int $a, int $b): int
    {
        return $a - $b;
    }

    public function multiply(int $a, int $b): int
    {
        return $a * $b;
    }

    public function divide(int $a, int $b): float
    {
        if ($b === 0) {
            throw new \InvalidArgumentException('Division by zero is not allowed');
        }
        return $a / $b;
    }

    public function isEven(int $number): bool
    {
        return $number % 2 === 0;
    }

    public function factorial(int $n): int
    {
        if ($n < 0) {
            throw new \InvalidArgumentException('Factorial is not defined for negative numbers');
        }
        if ($n === 0 || $n === 1) {
            return 1;
        }
        return $n * $this->factorial($n - 1);
    }
}