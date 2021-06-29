<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/Calculator.php";

class MultiplyCalculatorTest extends TestCase
{
    public function testMultiplyTwoPositiveNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(10,
            $calculator->Multiply(2, 5));
    }
    public function testMultiplyANegativeNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(-6,
            $calculator->Multiply(3, -2));
    }
    public function testMultiplyTwoNegativeNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(100,
            $calculator->Multiply(-10, -10));
    }
    public function testMultiplyFloatNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(0.4,
            $calculator->Multiply(2, 0.2));
    }
}