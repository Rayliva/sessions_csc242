<!--
/************************************************************/
/* Author: Rachel Alden */
/* Major: Computer Science */
/* Creation Date: April 18th, 2024 */
/* Due Date: April 24th, 2024 */
/* Course: CSC 242 */
/* Professor Name: Dr. Carelli */
/* Assignment: 5 */
/* Filename: signout.php */
/* Purpose: Destroy session variables upon user signout and */
/* redirect to home page */
/************************************************************/
-->

<?php
// TODO destroy the session variables and redirect to the home page

session_start();

session_destroy();

header("Location: index.php");
exit();

?>
