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
        $result = 1;
        for ($i = 0; $i < $exp; $i++) {
            $result *= $ground;
        }
        return $result;
    }
    private static function NegativePower(float $ground, float $exp):float {
        return 1/self::PositivePower($ground, -$exp);
    }

    public static function SquareRoot(float $x):float { //BINARY SEARCH FOR SQUARE ROOT
                                                        // It works with two loops, the first loops try's to get close to full integers (no floats).
                                                        // The second tries to get closer behind the 0 if it is necessary. The precision is decided by the precision variable.
                                                        // This binary search tries to get closer to the answer and once it is close enough it gives the result.
        $start = 0;
        $mid = 0;
        $end = $x;
        $precision = 5;
        $result = null;
        while ($start <= $end) {
            $mid = ($start + $end)/2;
            if($mid * $mid == $x) {
                $result = $mid;
                return $result;
            }
            if($mid * $mid < $x) {
                $start = $mid + 1;
                $result = $mid;
            }
            else {
                $end = $mid -1;
            }
        }
        $increment = 0.1;
        for ($i = 0; $i < $precision; $i++)
        {
            while ($result * $result <= $x)
            {
                $result += $increment;
            }

            // loop terminates when
            // ans * ans > number
            $result = $result - $increment;
            $increment = $increment / 10;
        }
        return $result;
    }


}