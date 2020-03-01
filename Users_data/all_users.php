<!-- include header file -->
<?php include '../includes/header.php';
//Select all data from users table
$select_data = "SELECT * FROM `users`";
//run that query
$run_query = mysqli_query($conn, $select_data);

//Row Numbers
$rows = mysqli_num_rows($run_query);
?>

<head>
    <title>All Users Data</title>
</head>
<?php
if (isset($_SESSION["deleted"])) {
    echo $_SESSION["deleted"];
    unset($_SESSION["deleted"]);
}
?>
<div class="mycontainer">
    <div class="table_container">
        <div class="table_title">
            <h4><i class="fas fa-globe"></i> Browse users</h4>
            <a href="../auth/reg.php"><button class="button" style="width: 150px; margin:0;padding: 0;top: -10px;"><i class="fas fa-user-plus"></i></button></a>
        </div>
        <div class="data_table">


            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Preview</th>
                        <th>username</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through all rows from database -->
                    <?php foreach ($run_query as $value) : ?>
                        <tr>
                            <!-- echo a colunm -->
                            <td><?= $value['id'] ?></td>
                            <td><img height="35px" src="<?= $value['img_dir'] ?>" alt="thumbnail"></td>
                            <td><?= $value['usernames'] ?></td>
                            <td><?= $value['emails'] ?></td>
                            <td><?= $value['names'] ?></td>
                            <td><?= $value['gender'] ?></td>
                            <td>
                                <!-- pass the value of id with session -->
                                <a href="profile.php?id=<?= $value['id'] ?>"><span class="viewProfile"><i class="far fa-address-card"></i> View </span></a>
                                |
                                <a href="edit_profile.php?id=<?= $value['id'] ?>"><span class="edit"> <i class="far fa-edit"></i> Edit </span></a>
                                |
                                <a id="dlbtn"><span class="delete"> <i class="fas fa-trash"></i> Delete </span></a>

                                <!-- The Modal -->
                                <div class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <span class="close">&times;</span>
                                            <h2>DELETE CONFIRMATION</h2>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete your account? If you delete your account, you will permanently lose all your information.
                                                <a href="delete_profile.php?id=<?= $value['id'] ?>"><button class="button btn-danger" style="    margin: 10px 0 0 0;">confirm</button></a></p>
                                        </div>

                                    </div>

                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="item_no">Showing <?= $rows ?> rows</div>
    </div>
</div>

<script>
    // if img src is empty then show placeholder img 
    var img = document.querySelector("img");
    var imgsrc = img.getAttribute('src');
    if (imgsrc == "") {
        img.setAttribute("src", "img/img-placeholder.png");
    }


    // Get the modal
    var modal = document.querySelector(".modal");

    // Get the button that opens the modal
    var dlbtn = document.querySelector("#dlbtn");

    // Get the <span> element that closes the modal
    var span = document.querySelector(".close");

    // When the user clicks the button, open the modal 
    dlbtn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<?php include '../includes/footer.php'; ?>