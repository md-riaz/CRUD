<?php
include "conn.php";

//Form Validation
$email = $_POST['email'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];

$upper = preg_match('@[A-Z]@', $pass);
$lower = preg_match('@[a-z]@', $pass);
$num = preg_match('@[0-9]@', $pass);
$spc = preg_match('@[#, !, $, %, ^, &, *]@', $pass);

$o = 0;

if (empty($email)) {
  $emailerr = '&emailerr=*Email is empty';
  $o++;
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailerr = "&emailerr=*Invalid E-mail Format";
    $o++;
  }
}

if (empty($name)) {
  $fnerr = '&fnerr=*Name is empty!';
  $o++;
}

if (!$upper || !$lower || !$num || !$spc ||  strlen($pass) < 8) {
  $passerr =  '&passerr=*Password should be Upeercase, Lowercase, Numbers, Spacial Character & Minimum 8 Characters';
  $o++;
}

if ($o != 0) {
  header("location:index.php?$emailerr $fnerr $passerr");
} else {

  $sql = "INSERT INTO `users`(`emails`, `names`, `passwords`, `gender`) VALUES ('$email','$name','$pass','$gender')";

  if ($conn->query($sql) === TRUE) {
    echo "*New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
