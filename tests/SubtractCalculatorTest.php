<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/Calculator.php";

class SubtractCalculatorTest extends TestCase
{
    public function testSubtractTwoPositiveNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(20,
            $calculator->Subtract(30, 10));
    }
    public function testSubtractTwoNegativeNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(-10,
            $calculator->Subtract(-20, -10));
    }
}