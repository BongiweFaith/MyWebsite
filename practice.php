<?php
echo "Hello World" . "<br>";
// this is my practice page

/* 
Boolean is true or false
integer is number with no decimal value
float is decimal numbers
*/
$name = "Faith" . "<br>";
var_dump($name) . "<br>";
$base = 20;
$height = 10;

$area = $base * $height;
echo $area . "<br>";

$test = 'an example';

$example = "This is $test"; //This is an example
echo $test . "<br>";

$firstName = 'Bongiwe';
$lastName = 'Gwala';

$fullName = $firstName . ' ' . $lastName;
echo $fullName . "<br>";

$name = 'Bongiwe';
strlen($name); //6
echo 6;

$name = 'Bongiwe';
substr($name, 3);
substr($name, 2, 2);
echo 3;

$list = ['a', 'b'];
$list[0]; //'a' --the index starts at 0
$list[1];
echo $list;
?>