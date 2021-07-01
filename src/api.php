<?php
const CALCULATOR_MAXIMUM_SIZE = 999999999999999; //PHP with big numbers is not precise, to fix this you need to use a library that does computation on strings instead of floats but this is out of the scope of this exercise
const ADD_REQUEST_NAME =            "add";
const SUBTRACT_REQUEST_NAME =       "subtract";
const MULTIPLY_REQUEST_NAME =       "multiply";
const DIVIDE_REQUEST_NAME =         "divide";
const POWER_REQUEST_NAME =          "power";
const SQUARE_ROOT_REQUEST_NAME =    "square";
require "Calculator.php";

if ($_SERVER['REQUEST_METHOD']  === 'GET') {
    try {
        $result = evalRequest();
        if ($result > CALCULATOR_MAXIMUM_SIZE) throw new Exception("Result number is to big!");
    } catch (Exception $e) {
        returnBadRequest($e->getMessage());
    }
    returnAsJson($result);
} else {
    returnBadRequest("Only GET request is supported");
}

function evalRequest() {
    $function = $_GET["function"];
    $calculator = new Calculator();
    $a = $_GET["a"];
    $b = $_GET["b"];
    if($a > CALCULATOR_MAXIMUM_SIZE || $b > CALCULATOR_MAXIMUM_SIZE) throw new Exception("One of the input numbers is to big!");
    switch ($function) {
        case ADD_REQUEST_NAME:
            return $calculator->Add($a, $b);
        case SUBTRACT_REQUEST_NAME:
            return $calculator->Subtract($a, $b);
        case MULTIPLY_REQUEST_NAME:
            return $calculator->Multiply($a, $b);
        case DIVIDE_REQUEST_NAME:
            try {
                return $calculator->Divide($a, $b);
            } catch (Exception $e) {
                returnBadRequest($e->getMessage());
            }
            break;
        case POWER_REQUEST_NAME:
            try {
                return $calculator->Power($a, $b);
            } catch (Exception $e) {
                returnBadRequest($e->getMessage());
            }
            break;
        case SQUARE_ROOT_REQUEST_NAME:
            return $calculator->SquareRoot($b);
        default:
            returnBadRequest("Calculator action '${function}' is not supported");
            return 0; //Does not really matter because api will exit before.
    }
}

function returnAsJson($result) {
    header('Content-Type: application/json');
    echo json_encode(array("result"=>$result, "error"=>""));
}

function returnBadRequest($message) {
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(array("result"=>"", "error"=>$message));
    exit; // The program has to stop when a error has occured or else return as json will also run.
}