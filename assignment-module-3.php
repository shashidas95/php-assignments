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
?>