<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculator;

class SimpleUnitTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAddition()
    {
        $result = $this->calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }

    public function testSubtraction()
    {
        $result = $this->calculator->subtract(5, 3);
        $this->assertEquals(2, $result);
    }

    public function testMultiplication()
    {
        $result = $this->calculator->multiply(4, 5);
        $this->assertEquals(20, $result);
    }

    public function testDivision()
    {
        $result = $this->calculator->divide(10, 2);
        $this->assertEquals(5.0, $result);
    }

    public function testDivisionByZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Division by zero is not allowed');
        $this->calculator->divide(10, 0);
    }

    public function testIsEven()
    {
        $this->assertTrue($this->calculator->isEven(4));
        $this->assertFalse($this->calculator->isEven(5));
    }

    public function testFactorial()
    {
        $this->assertEquals(1, $this->calculator->factorial(0));
        $this->assertEquals(1, $this->calculator->factorial(1));
        $this->assertEquals(24, $this->calculator->factorial(4));
    }

    public function testFactorialWithNegativeNumber()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Factorial is not defined for negative numbers');
        $this->calculator->factorial(-1);
    }
}