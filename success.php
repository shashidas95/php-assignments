<?php 


$new_filename = fopen('users.csv', 'r');

while (($data = fgetcsv($new_filename))!== false) {
   echo $data[0];
   echo $data[1];
   echo "uploads/".$data[2];
  
}
fclose($new_filename); 
?>