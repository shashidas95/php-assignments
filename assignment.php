
<!DOCTYPE html>
<html>
<head>
	<title>User Registration and Login Form</title>
</head>
<body>
	<h2>User Registration Form</h2>
	<form method="post" action="">
		<label for="first_name">First Name:</label>
		<input type="text" name="first_name" required><br>

		<label for="last_name">Last Name:</label>
		<input type="text" name="last_name" required><br>

		<label for="email">Email:</label>
		<input type="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" name="confirm_password" required><br>

		<input type="submit" name="register" value="Register">
	</form>

	<?php 
	
    $login_credentials = array();
	// Specify the file path
	$file_path = 'login_credentials.txt';
			
	// Open the file for writing
	$fileHandle = fopen($file_path, 'a');

	// // Close the file handle
	// fclose($fileHandle);

    if (isset($_POST['register'])) {
        // Get the form data and store it in variables
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate the form data
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
            echo "<p>All fields are required and must not be empty</p>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Invalid email format</p>";
        } elseif ($password !== $confirm_password) {
            echo "<p>Password and Confirm Password do not match</p>";
        } else {
            $login_credentials['email'] = $email;
            $login_credentials['password'] = $password;
			

			$file_contents = serialize($login_credentials);
			file_put_contents($file_path, $file_contents);

            echo "<p>Registration successful. Welcome, $first_name!</p>";
            // Save the user data in a database or a file
        }
    }

?>

	<h2>User Login Form</h2>
	<form method="post" action="">
		<label for="email">Email:</label>
		<input type="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br>

		<input type="submit" name="login" value="Login">
	</form>

	<?php 
    if (isset($_POST['login'])) {
        // Get the form data and store it in variables
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate the form data
        if (empty($email) || empty($password)) {
            echo "<p>All fields are required and must not be empty</p>";
        } else {
            // Check if the user credentials are correct
			$file_path = 'login_credentials.txt';
			$file_contents = file_get_contents($file_path);
			$login_credentials = unserialize($file_contents);


            if (!empty($login_credentials) && $email == $login_credentials['email'] && $password == $login_credentials['password']) {
               
               echo "<p>Login successful. Welcome, $first_name!</p>";
            } else {
                echo 'Login failed';
            }
        }
    }
?>
</body>
</html>
