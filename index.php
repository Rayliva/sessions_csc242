<!-- 
/************************************************************/
/* Author: Rachel Alden */
/* Major: Computer Science */
/* Creation Date: April 18th, 2024 */
/* Due Date: April 24th, 2024 */
/* Course: CSC 242 */
/* Professor Name: Dr. Carelli */
/* Assignment: 5 */
/* Filename: index.php */
/* Purpose: This program will create and store user account */
/* information for a website. It will also create a session */
/* that will be used to track whether a user is logged into */
/* their account as they navigate across the site pages.    */
/************************************************************/
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
</head>
<body>

<h1>Home</h1>

<?php
// TODO If the session variables exist, then only show a link to the log out
// page, otherwise only show links to the sign in and create account pages.
// TODO If the session variables exist then display them as an HTML description
// list, otherwise display a message to sign in or create an account.

session_start(); 

if (isset($_SESSION['s_email']) && isset($_SESSION['s_password'])) {
    echo '<a href="signout.php">Log Out</a>';
    echo "<h2>Session Variables</h2>";
    echo "<dl>";
    foreach ($_SESSION as $key => $value) {
        echo "<dt>$key</dt>";
        echo "<dd>$value</dd>";
    }
    echo "</dl>";
} else {
    echo "<p>Please sign in or create an account.</p>";    
    echo '<a href="signin.php">Sign In</a>';
    echo '<br>';
    echo '<a href="createAccount.php">Create Account</a>';
}

?>

</body>
</html>
