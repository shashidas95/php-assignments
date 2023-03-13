<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate form input
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);

  if (empty($name) || empty($email)) {
    die("Please fill in all fields");
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
  }

  // Save profile picture to server
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $unique_file_name = uniqid() . "." . $imageFileType;
  $target_file = $target_dir . $unique_file_name;

  if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) {
    echo "Profile picture uploaded successfully.";
  } else {
    die("Sorry, there was an error uploading your file.");
  }

  // Add current date and time to filename
  $file_parts = pathinfo($target_file);
  $new_filename = $file_parts['filename'] . "_" . date("Ymd_His") . "." . $file_parts['extension'];
  rename($target_file, $target_dir . $new_filename);

  // Save user info to CSV file
  $user_data = array($name, $email, $new_filename);
  $fp = fopen('users.csv', 'a');
  fputcsv($fp, $user_data);
  fclose($fp);

  // Set session and cookie
  $_SESSION["username"] = $name;
  setcookie("username", $name, time() + (86400 * 30), "/");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// $data = array($name, $email, $filename);
// $file = fopen("users.csv", "a");
// if (fputcsv($file,$data )==false) {
//     die('Error writting ');
// }
// fclose($file);



setcookie("username");
header('success.php');
?>
