<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/Calculator.php";

class SquareRootCalculatorTest extends TestCase
{
    public function testSquareRootPositiveNumber():void {
        $calculator = new Calculator();
        $this->assertEquals(2,
            $calculator->SquareRoot(4));
    }

    public function testSquareRootFloatNumber():void {
        $calculator = new Calculator();
        $this->assertEquals(0.9,
            $calculator->SquareRoot(0.81));
    }
}