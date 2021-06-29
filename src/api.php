<?php
const ADD_REQUEST_NAME =            "add";
const SUBTRACT_REQUEST_NAME =       "subtract";
const MULTIPLY_REQUEST_NAME =       "multiply";
const DIVIDE_REQUEST_NAME =         "divide";
const POWER_REQUEST_NAME =          "power";
const SQUARE_ROOT_REQUEST_NAME =    "square";
require "Calculator.php";

if ($_SERVER['REQUEST_METHOD']  === 'GET') {
    $result = evalRequest();
    returnAsJson($result);
} else {
    returnBadRequest();
}

function evalRequest() {
    $function = $_GET["function"];
    $calculator = new Calculator();
    switch ($function) {
        case ADD_REQUEST_NAME:
            $a = $_GET["a"];
            $b = $_GET["b"];
            return $calculator->Add($a, $b);
        case SUBTRACT_REQUEST_NAME:
            $a = $_GET["a"];
            $b = $_GET["b"];
            return $calculator->Subtract($a, $b);
        case MULTIPLY_REQUEST_NAME:
            $a = $_GET["a"];
            $b = $_GET["b"];
            return $calculator->Multiply($a, $b);
        case DIVIDE_REQUEST_NAME:
            $a = $_GET["a"];
            $b = $_GET["b"];
            return $calculator->Divide($a, $b);
        case POWER_REQUEST_NAME:
            $a = $_GET["a"];
            $b = $_GET["b"];
            return $calculator->Power($a, $b);
        case SQUARE_ROOT_REQUEST_NAME:
            $a = $_GET["b"];
            return $calculator->SquareRoot($a);
        default:
            returnBadRequest();
            return 0; //Does not really matter because api will exit before.
    }
}

function returnAsJson($result) {
    header('Content-Type: application/json');
    echo json_encode($result);
}

function returnBadRequest() {
    header("HTTP/1.1 400 Bad Request");
    exit();
}