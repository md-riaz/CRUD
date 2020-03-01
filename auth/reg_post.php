<?php
session_start(); //Session Start
include "../includes/db_connect.php"; //include database connection page

/*Form Validation*/
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
$name = test_input($_POST['name']);
$university = test_input($_POST['university']);
$pass = test_input($_POST['pass']);
$gender = test_input($_POST['gender']);
$hash_pass = password_hash($pass, PASSWORD_DEFAULT); //Convert password to hash

//Password Checking funtions
$regex = '/^[a-zA-Z\s\d\.#!$%^&*@]+$/';
// ^ Start
// $ End
// [] Rules that are applied to a single character
// + Apply the rules to everything
// \s Allow whetespace or spaces
// \d Allow all digits
// . Allow all
// \. Allow Period/Dot
// {3} Apply rule to the next 5 characters
// {2,5} Apply rule to between 2 and 5 characters
$pass_check = preg_match($regex, $pass);

//if any error increment this
$o = 0;

if (empty($username)) {
  $_SESSION["uerr"] = "*username field is required";
  $o++;
}
if (empty($email)) {
  $_SESSION["emerr"] = "*email is required";
  $o++;
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["emFerr"] = "*email Format is invalid!!";
    $o++;
  }
}

if (empty($name)) {
  $_SESSION["fnerr"] = "*name is required";
  $o++;
}

if (empty($university)) {
  $_SESSION["unierr"] = "*institute name is empty!!";
  $o++;
}

if (!$pass_check || strlen($pass) < 8) {
  $_SESSION["passerr"] =
    "*use both uppercase & lowercase <br>
     *atleast a number and symbol<br>
     *minimum 8 characters";
  $o++;
}

// if any error found then go to previews page else check data for duplicates and if no duplicate then insert to database
if ($o != 0) {
  header("location:reg.php");
} else {
  //Check email for double in database
  $check_double = "SELECT COUNT(*) as duplicate FROM `users` WHERE emails = '$email'";
  $query_result = mysqli_query($conn, $check_double);
  $get_data = mysqli_fetch_assoc($query_result);
  //Check username for double in database
  $check_double_username = "SELECT COUNT(*) as duplicate FROM `users` WHERE usernames = '$username'";
  $query_result_username = mysqli_query($conn, $check_double_username);
  $get_data_username = mysqli_fetch_assoc($query_result_username);

  //if error found, show error messeger
  if ($get_data['duplicate'] == 1) {
    header("location:reg.php");
    $_SESSION["emDerr"] = "Email is already exist!!";
  } else {
    //if error found, show error messeger
    if ($get_data_username['duplicate'] == 1) {
      header("location:reg.php");
      $_SESSION["uDerr"] = "Username is already exist!!";
    } else {
      // insert data to database
      $insert_data = "INSERT INTO `users`(`usernames`,`emails`, `names`,`university`, `passwords`, `gender`) VALUES ('$username','$email', '$name','$university', '$hash_pass', '$gender')";
      $run_query = mysqli_query($conn, $insert_data);

      if ($run_query === TRUE) {
        $_SESSION["success"] = "You have successfully registered. Go to SIGN IN page & login";
        header("location:reg.php");
      }
    }
  }
}
