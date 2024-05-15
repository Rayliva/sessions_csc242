<!--
/************************************************************/
/* Author: Rachel Alden */
/* Major: Computer Science */
/* Creation Date: April 18th, 2024 */
/* Due Date: April 24th, 2024 */
/* Course: CSC 242 */
/* Professor Name: Dr. Carelli */
/* Assignment: 5 */
/* Filename: signin.php */
/* Purpose: Receive email and password. Check data against  */
/* database. If account is found, set session variables and */
/* redirect to the home page. If account isn't found,       */
/* inform user. */
/************************************************************/
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
</head>
<body>
<nav>
  <a href="index.php">Home</a>
</nav>
<h1>Sign In</h1>

<form action="signin.php" method="post">
  <table>
    <tr>
      <td>
        <label for='email'>User Email: </label>
      </td>
      <td>
        <input id='email' type="email" name="email" required autofocus>
      </td>
    </tr>
    <tr>
      <td>
        <label for='password'>Password: </label>
      </td>
      <td>
        <input id='password' type="password" name="password" required>
      </td>
    </tr>
  </table>
  <input type="submit" value="Sign In">
</form>

<?php
// TODO
// 1. If the form values are set, then get the user record from the database
//    by calling the getUserRecord function.
// 2. If a record is returned, then store each of the values in session
//    variable and redirect to the home page.
// 3. If a record is not returned, then print a message that the email and
//    password combination is not valid.

require_once 'functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = getUserRecord($email, $password);

	    if (!$result){
		echo "Invalid email and password combination.";
	    } else {
		$_SESSION['s_email'] = $email;
		$_SESSION['s_password'] = $password;
		header("Location: index.php");
		exit();
	    }

    } else {
        echo "Email and password are required.";
    }
}

?>
</body>
</html>
