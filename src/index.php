<?php
session_start();
$c = $_SESSION["counter"];

if(!isset($c)){
	$c = 0;
} else {
	$c++;
}
$_SESSION["counter"] = $c;

echo "Visited {$c} times!";