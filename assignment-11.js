
/* Question : Write a program that generates a multiplication table for a given number using a for loop.

Instructions:

Create a JavaScript function called "multiplicationTable" that takes a single argument "num" (an integer) as input.

Inside the function, create a for loop that iterates from 1 to 10.

Inside the loop, multiply the current iteration number by the input "num" to generate the product.

Log the product to the console in the format "num x iteration = product".

Test the function with different input numbers to generate multiplication tables. */



array = [1,2,3,4,5,6,7,8,9,10];
function multiplicationTable(num) { 
 for (let i = 0; i < array.length; i++) {
     const element = array[i];
     const product= num * element;
     let result = `${num} x ${element} = ${product}`;
     console.log(result);
 }
 }
 multiplicationTable(10);
 multiplicationTable(9);
 multiplicationTable(8);
 multiplicationTable(7);
 multiplicationTable(6);
 multiplicationTable(5);
