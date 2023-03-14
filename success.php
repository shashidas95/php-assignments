<?php

echo "<table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>First</th>
      <th scope='col'>Last</th>
      <th scope='col'>Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>";
     $new_filename = fopen('users.csv', 'r');
   while (($user_data = fgetcsv($new_filename))!== false) {
     echo "<td> $user_data[0] <td>";
     echo "<td> $user_data[1] <td>";
     echo "<td><img src='uploads/'".$user_data[2]."/></td>";

    echo "</tr>
  </tbody>
</table>";
  
}
fclose($new_filename); 
?>
