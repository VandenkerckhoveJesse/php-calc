<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/Calculator.php";

class DivideCalculatorTest extends TestCase
{
    public function testDivideTwoPositiveNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(10,
            $calculator->Divide(40, 4));
    }
    public function testDivideANegativeNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(-6,
            $calculator->Divide(12, -2));
    }
    public function testDivideTwoNegativeNumbers():void
    {
        $calculator = new Calculator();
        $this->assertEquals(8,
            $calculator->Divide(-16, -2));
    }
    public function testDivideFloatNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(2,
            $calculator->Divide(1, 0.5));
    }
    public function testDivideByZero():void {
        $calculator = new Calculator();
        $this->expectException("Exception");
        $calculator->Divide(5, 0);
    }
}