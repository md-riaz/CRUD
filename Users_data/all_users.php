<!-- include header file -->
<?php include '../includes/header.php';
//Select all data from users table
$select_data = "SELECT * FROM `users`";
//run that query
$run_query = mysqli_query($conn, $select_data);
?>

<head>
    <title>All Users Data</title>
</head>

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
                                <a href="delete_profile.php?id=<?= $value['id']; ?>&usern=<?= $value['usernames']; ?>"><span class="delete"> <i class="fas fa-trash"></i> Delete </span></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include '../includes/footer.php'; ?>