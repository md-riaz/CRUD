<!-- include header file -->
<?php include '../includes/header.php';
// get id value from url
$id = $_GET["id"];
//delete query syntax
$delete = "DELETE FROM `users` WHERE id = $id";
//delete the user
$run_query = mysqli_query($conn, $delete);
//go to preview page
header('Location: ' . $_SERVER['HTTP_REFERER']);

include '../includes/footer.php'; ?>