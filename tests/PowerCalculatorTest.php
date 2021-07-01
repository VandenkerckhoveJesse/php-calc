<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/Calculator.php";

class PowerCalculatorTest extends TestCase
{

    public function testPowerTwoPositiveNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(8,
            $calculator->Power(2, 3));
    }

    public function testPowerANegativeNumbers():void {
        $calculator = new Calculator();
        $this->assertEquals(0.04,
            $calculator->Power(5, -2));
    }

    public function testPowerFloatNumbers():void {
        $calculator = new Calculator();
        $this->expectException("Exception");
        $calculator->Power(5, 0.5);
    }
}