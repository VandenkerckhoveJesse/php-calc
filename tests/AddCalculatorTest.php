<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/Calculator.php";

class AddCalculatorTest extends TestCase
{
    public function testAddOfTwoPositiveNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(
            3,
            $calculator->Add(1, 2)
        );
    }
    public function testAddOfTwoNegativeNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(-8,
            $calculator->Add(-6, -2));
    }
    public function testAddFloatNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(1,
            $calculator->Add(0.8, 0.2));
    }
}