<?php 

//answer to the q. no 1
function compare($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$strings = array("apple", "banana", "cherry", "date");

$sortdStrings = usort($strings, "compare");
//print_r($sortdStrings);

foreach ($strings as $string) {
    echo "$string \n";
}

//answer to the q. no 2
function concatStrings(string $strOne, string $strtwo): string {
    return $strOne . strrev($strtwo);
}

//usage 
$strOne = "Shashi";
$strtwo = "Kanta!";
$concatenatedString = concatStrings($strOne, $strtwo);
echo $concatenatedString;

//answer to the q. no 3
function middleElements(array $fruitsArray): array {
    array_shift($fruitsArray);
    array_pop($fruitsArray);
    return $fruitsArray;
}

// for output
$fruits = array("apple", "banana", "cherry", "date");
$newfruitsArray = middleElements($fruits);
print_r($newfruitsArray);

//answer to the q. no 3
//Function to check if a string contains only letters and whitespace:
function LetterSpace($str) {
    return preg_match('/^[a-zA-Z\s]+$/', $str);
}

//for usage

$output1 = LetterSpace("Shashi Kanta");
$output2 = LetterSpace("Shashi Kanta!");
echo $output1 ? "Contains only letters and whitespace" : "Contains other characters too";
echo "\n";
echo $output2 ? "Contains only letters and whitespace" : "Contains other characters too";


//Function to find the second largest number in an array of numbers:

function secondLargest($numbers) {
    $largest = max($numbers);
    $max2 = null;
    
    foreach($numbers as $number) {
      if($number < $largest && ($max2 === null || $number > $max2)) {
        $max2 = $number;
      }
    }
    
    return $max2;
  }
//example 

$numbers = [1, 4, 7, 20, 14, 45, 30, 24];
$secondLargestNumber = secondLargest($numbers);
echo $secondLargestNumber;


?>