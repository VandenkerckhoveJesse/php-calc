<?php


class Calculator
{
    public static function Add (float $x, float $y):float {
        return $x + $y;
    }

    public static function Subtract (float $x, float $y):float {
        return $x - $y;
    }

    public static function Multiply (float $x, float $y):float {
        return $x * $y;
    }

    public static function Divide (float $x, float $y):float {
        if($y == 0) throw new Exception("Cannot divide by zero");
        return $x/$y;
    }

    public static function Power (float $ground, float $exp):float {
        if($exp !== round($exp)) {
            throw new Exception("Floating point powers are not supported!");
        } elseif($exp >= 0) {
            return self::PositivePower($ground, $exp);
        } else {
            return self::NegativePower($ground, $exp);
        }
    }
    private static function PositivePower(float $ground, float $exp):float {
        return $ground;
    }
    private static function NegativePower(float $ground, float $exp):float {
        return $ground;
    }

    public static function SquareRoot(int $x) {
        return $x;
    }


}