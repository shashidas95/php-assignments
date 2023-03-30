<?php 


function evenOrOdd($num){
    if ($num % 2 == 0) {
        return "even";
    } else {
        return "odd";
    }
}
$decision = evenOrOdd(7);
echo $decision;


$sum =0;
for ($i=1; $i <= 100; $i++) { 
    $sum += $i; 
    //$sum = ($i * ($i+1))/2;
}

echo $sum;
?>
