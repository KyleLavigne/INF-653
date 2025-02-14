<?php
// Challenge 1: Arithmetic Operations
$number1 = 10;
$number2 = 5;

echo "Number 1: $number1\n";
echo "Number 2: $number2\n";
echo "Addition: " . ($number1 + $number2) . "\n";
echo "Subtraction: " . ($number1 - $number2) . "\n";
echo "Multiplication: " . ($number1 * $number2) . "\n";
echo "Division: " . ($number1 / $number2) . "\n";
echo "Modulus: " . ($number1 % $number2) . "\n\n";

// Challenge 2: Even or Odd Check
$input = 7;
echo "Input: $input\n";
echo ($input % 2 == 0) ? "$input is an even number.\n\n" : "$input is an odd number.\n\n";

// Challenge 3: Increment and Decrement Operations
$starting_number = 10;
echo "Starting number: $starting_number\n";
echo "After increment: " . (++$starting_number) . "\n";
echo "After decrement: " . (--$starting_number) . "\n\n";

// Challenge 4: Grading System
$marks = 85;
echo "Input: $marks\n";
if ($marks >= 90) {
    echo "You got an A!\n";
} elseif ($marks >= 80) {
    echo "You got a B!\n";
} elseif ($marks >= 70) {
    echo "You got a C!\n";
} elseif ($marks >= 60) {
    echo "You got a D!\n";
} else {
    echo "You got an F!\n";
}

echo "\n";

// Challenge 5: Leap Year Check
$year = 2024;
echo "Input: $year\n";
if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    echo "$year is a leap year.\n";
} else {
    echo "$year is not a leap year.\n";
}
?>
