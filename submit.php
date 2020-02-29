<?php
$fname = $_POST['fname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
$gender = $_POST['gender'];
$check = $_POST['check'];

$upper = preg_match('@[A-Z]@', $pass);
$lower = preg_match('@[a-z]@', $pass);
$num = preg_match('@[0-9]@', $pass);
$spc = preg_match('@[#,^,&,*]@', $pass);


if (empty($fname)) {
  $err = "Please fill out the name.";
  header("location: index.php?fnerr=".$err);
}
else if (empty($email)) {
  $err = "Please fill out the email.";
  header("location: index.php?emerr=".$err);
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $err = "Email is not validated";
  header("location: index.php?emerr=".$err);
}
else if (empty($pass)) {
  $err = "Please fill out the password.";
  header("location: index.php?pserr=".$err);
}
else if (!$upper || !$lower || !$num || !$spc || strlen($pass)<8) {
  $err = "Password Should  be Uppercase,Lowercase,Number and Special Character and minimum 8 Character";
  header("location: index.php?pserr=".$err);
}
else if ($pass !== $repass) {
  $err = "Please fill the same password again";
  header("location: index.php?repaerr=".$err);
}
else if (empty($gender)) {
  $err = "Please select a gender.";
  header("location: index.php?gerr=".$err);
}

else {
  echo $fname."<br>";
  echo $email."<br>";
  echo $pass."<br>";
  echo $repass."<br>";
  echo $gender."<br>";
  if (empty($check)) {
    echo "Box Unchecked";
  }else {
  echo $check."<br>";
  }
}










 ?>
