<?php
session_start(); //Session Start
include "../includes/db_connect.php"; //include database connection page
// get id value from url
$id = $_GET["id"];
// get username value from url
$usernm = $_GET["user"];
/*Image upload Validation*/

$Cryptograph_alphanumeric = bin2hex(random_bytes(3)) . '__'; //This line assigns a random number to this variable.
//get extention name
$imageFileType = strtolower(pathinfo($_FILES['ProfileImage']['name'], PATHINFO_EXTENSION));
//new name of img
$new_name = $usernm;
//combine file name,extention with random number & set file directory.
$target_file = '../Users_data/img/' . $Cryptograph_alphanumeric . $new_name . "." . $imageFileType;

$uploadOk = 1; //if condition is not fullfilled set this to 0 to stop upload.

if (isset($_POST["ProfileImage"])) {
  //set source path to a variable.
  $source_path = $_FILES['ProfileImage']['tmp_name'];

  // Check if image file is a actual image or fake image
  if (isset($_POST["ProfileImage"])) {
    $check = getimagesize($source_path);
    if ($check !== false) {
      $_SESSION["sizeerr"] = "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      $_SESSION["sizeerr"] = "File is not an image.";
      $uploadOk = 0;
    }
  }
  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $_SESSION["typeerr"] = "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    $_SESSION["err"] = "Sorry, your image was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($source_path, $target_file)) {
      $_SESSION["succm"] = "The image " . basename($_FILES["ProfileImage"]["name"]) . " has been uploaded.";
    } else {
      $_SESSION["serr"] = "Sorry, your image was not uploaded.";
    }
  }
}
// if img extention is empty then img_dir is empty 
if ($imageFileType == "") {
  $img_dir = "";
} else {
  $img_dir = 'img/' . $Cryptograph_alphanumeric . $new_name . "." . $imageFileType;
}
/*Image upload Validation End*/

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
  $_SESSION["emerr"] = "Email is required";
  $o++;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION["emFerr"] = "Email Format is invalid!!";
  $o++;
}

if (empty($name)) {
  $_SESSION["fnerr"] = "Name is required";
  $o++;
}

if (empty($university)) {
  $_SESSION["unierr"] = "Institute Name is empty!!";
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
  header("location:../Users_data/edit_profile.php?id=$id");
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
  if ($get_data['duplicate'] == 2) {
    header("location:../Users_data/edit_profile.php?id=$id");
    $_SESSION["emDerr"] = "Email is already exist!!";
  } else {
    //if error found, show error messeger
    if ($get_data_username['duplicate'] == 2) {
      header("location:../Users_data/edit_profile.php?id=$id");
      $_SESSION["uDerr"] = "Username is already exist!!";
    } else {
      // update data to database
      $update_data =
        "UPDATE `users` SET `usernames`= '$username',`img_dir`= '$img_dir', `emails` = '$email', `names` = '$name', `university` = '$university', `passwords` = '$hash_pass', `gender` = '$gender' WHERE `users`.`id` = $id";
      $run_query = mysqli_query($conn, $update_data);

      if ($run_query === TRUE) {
        $_SESSION["success"] = "You have successfully updated your info.";
        header("location:../Users_data/profile.php?id=$id");
      }
    }
  }
}
