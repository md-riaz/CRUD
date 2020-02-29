<!-- include header file -->
<?php include '../includes/header.php';
// get id value from url
$id = $_GET["id"];
$username = $_GET["usern"];
//delete query syntax
$delete = "DELETE FROM `users` WHERE id = $id";
?>

<head>
    <title>Delete <?= $data['usernames']; ?>'s Profile</title>
</head>
<style>
    body {
        background-color: #34495e;
    }
</style>
<div class="delete_title">
    <h3>Delete account of "<?= $username ?>"??</h3>
</div>
<div class="delete_card">
    <div class="delete_info">
        <div class="delete_icon"><i class="fas fa-trash-alt"></i></div>
        <div class="delete_msg">Are you sure you want to delete your account? If you delete your account, you will permanently lose all your information.</div>
    </div>
    <div class="action_btn">
        <!-- on click this a tag, user will be deleted -->
        <a href="<?php $run_query = mysqli_query($conn, $delete); ?>all_users.php"><button class="button btn-danger">confirm</button></a>
        <!-- on click this a tag, user will go back -->
        <a href="all_users.php"><button class="button">cancel</button></a>
    </div>
</div>
















<?php include '../includes/footer.php'; ?>