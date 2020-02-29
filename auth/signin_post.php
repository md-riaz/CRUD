<?php
session_start(); //Session Start
include "../includes/db_connect.php"; //include database connection page
//Select all data from users table
$select_data = "SELECT * FROM `users`";
//run that query
$run_query = mysqli_query($conn, $select_data);
// Get data values as associative array
$data = mysqli_fetch_assoc($run_query);




/*Login Validation*/
// Function for checking data not to execute any script
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//Get data from submit and test data
$username = test_input($_POST['username']);
$email = test_input($_POST['email']);
$pass = test_input($_POST['pass']);
