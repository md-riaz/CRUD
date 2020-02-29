<!-- include header file -->
<?php include '../includes/header.php';
// get id value from url
$id = $_GET["id"];
//Select data from users table whose id matches url id
$select_data = "SELECT * FROM `users` WHERE id = $id";
//run that query
$run_query = mysqli_query($conn, $select_data);
// Get data values as associative array
$data = mysqli_fetch_assoc($run_query);

?>

<head>
    <title> <?= $data['usernames']; ?>'s Profile</title>
</head>

<style>
    html,
    body {
        background-color: #34495e;
        font-family: 'Roboto Condensed', "Nunito";
        font-size: 0.9em;
        margin: 20px 0;
        text-align: center;
        color: #fff;
        height: 87vh;
    }

    .btn_browse {
        width: 100%;
        margin-right: 0;
    }
</style>

<h1>Profile Card</h1>
<!-- if session found echo that with alert -->
<?php if (isset($_SESSION["success"])) : ?>

    <div class="alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p><?= $_SESSION["success"] ?></p>
    </div>

<?php endif ?>
<!-- if session found echo that with alert -->
<?php if (isset($_SESSION["succm"])) : ?>

    <div class="alert-success" role="alert">
        <p><?= $_SESSION["succm"] ?></p>
    </div>

<?php endif ?>
<input type="checkbox" id="pure-toggle" hidden />
<label id="card-user" class="pure-toggle" for="pure-toggle" style="cursor: auto;">
    <div class="header">
    </div>
    <div class="avatar">
        <img src="<?= $data['img_dir'] ?>" alt="Profile Pic">
    </div>
    <div class="details">
        <div class="username">
            <h3> <?= $data['usernames']; ?> </h3>
        </div>
        <div class="id_info"><span>ID No.</span>
            <p><?= $data['id']; ?></p>
        </div>
        <div class="id_info"><span>name</span>
            <p><?= $data['names']; ?></p>
        </div>
        <div class="id_info"><span>email address</span>
            <p><?= $data['emails']; ?></p>
        </div>
        <div class="id_info"><span>university/
                polytechnic from</span>
            <p><?= $data['university']; ?></p>
        </div>
        <div class="id_info"><span>gender</span>
            <p><?= $data['gender']; ?></p>
        </div>
    </div>

    <div class="social">
        <a href=""><i class="fab fa-codepen" alt="codepen" title="codepen"></i></a>
        <a href=""><i class="fab fa-facebook" alt="facebook" title="facebook"></i></a>
        <a href=""><i class="fab fa-google" alt="google" title="google"></i></a>
        <a href=""><i class="fab fa-twitter" alt="twitter" title="twitter"></i></a>
        <a href=""><i class="fab fa-youtube" alt="youtube" title="youtube"></i></a>
    </div>
</label>
<a href="all_users.php"><button class="button btn_browse">Browse all data</button></a>

<!-- if img src is empty then show placeholder img -->
<script>
    var img = document.querySelector("img");
    var imgsrc = img.getAttribute('src');
    if (imgsrc == "null") {
        img.setAttribute("src", "img/img-placeholder.png");
    }
</script>
<?php include '../includes/footer.php'; ?>