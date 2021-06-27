<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Calculator.php";

class CalculatorTest extends TestCase
{
    public function testAddOfTwoPositiveNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(
            3,
            $calculator->Add(1, 2)
        );
    }
}