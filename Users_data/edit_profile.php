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
    <title>Edit <?= $data['usernames']; ?>'s Profile</title>
</head>

<style>
    html,
    body {
        background-color: #34495e;
        font-family: 'Roboto Condensed', "Nunito";
        font-size: 1em;
        margin: 20px 0;
        text-align: center;
        color: #fff;
        height: 87vh;
    }

    #username {
        border: none;
        height: 20px;
        width: 100px;
        text-align: center;
        padding-left: 0;
        margin-left: -8px;
    }

    .details h3 {
        text-align: center;
    }

    #card-user .details {
        padding: 5px 0;
        width: 100%;
        margin-top: -10px;
        text-align: left;
        margin-left: 8px;
        display: flex;
        align-content: center;
        align-items: center;
        flex-direction: column;
    }

    .pass_eye {
        top: 23px;
        right: 10px;
    }

    .actions {
        display: flex;
        justify-content: center;
    }

    .btn-cancel {
        color: #3a57af;
        background-color: #fff;
        box-shadow: 0 3px rgba(191, 191, 191, 0.75);
    }
</style>

<h1>Edit Profile</h1>
<form action="../auth/edit_profile_post.php?id=<?= $id ?>&user=<?= $data['usernames'] ?>" method="post" enctype="multipart/form-data">
    <input type="checkbox" id="pure-toggle" hidden />
    <label id="card-user" class="pure-toggle edit_user" for="pure-toggle">
        <div class="header">
        </div>
        <div class="avatar">
            <img src="<?= $data['img_dir'] ?>" alt="Profile Pic" id="ProfileDisplay">
            <input type="file" name="ProfileImage" onchange="displayImg(this)" id="ProfileImage" style="display: none">
            <span onclick="imgup()" class="imgicon"><i class="fas fa-plus"></i></span>
        </div>
        <!-- if session found echo that with alert -->
        <?php if (isset($_SESSION["sizeerr"])) : ?>
            <div class="alert-warning" role="alert">
                <p><?= $_SESSION["sizeerr"] ?></p>
            </div>
        <?php endif ?>
        <!-- if session found echo that with alert -->
        <?php if (isset($_SESSION["typeerr"])) : ?>
            <div class="alert-warning" role="alert">
                <p><?= $_SESSION["typeerr"] ?></p>
            </div>
        <?php endif ?>
        <!-- if session found echo that with alert -->
        <?php if (isset($_SESSION["err"])) : ?>
            <div class="alert-warning" role="alert">
                <p><?= $_SESSION["err"] ?></p>
            </div>
        <?php endif ?>
        <!-- if session found echo that with alert -->
        <?php if (isset($_SESSION["serr"])) : ?>
            <div class="alert-warning" role="alert">
                <p><?= $_SESSION["serr"] ?></p>
            </div>
        <?php endif ?>


        <div class="details">

            <div class="username">
                <h3> <input type="text" name="username" id="username" value="<?= $data['usernames']; ?>" />
                    <!-- if session found echo that with alert -->
                    <?php if (isset($_SESSION["uerr"])) : ?>

                        <div class="alert-warning" role="alert">
                            <h4 class="alert-heading">Ohh No!</h4>
                            <p><?= $_SESSION["uerr"] ?></p>
                        </div>

                    <?php endif ?>
                    <!-- if session found echo that with alert -->
                    <?php if (isset($_SESSION["uDerr"])) : ?>

                        <div class="alert-warning" role="alert">
                            <h4 class="alert-heading">Ohh No!</h4>
                            <p><?= $_SESSION["uDerr"] ?></p>
                        </div>

                    <?php endif ?>
                </h3>
            </div>

            <div class="form_group">
                <label id="icon" for="email"><i class="far fa-envelope"></i></label>
                <input type="text" name="email" id="email" value="<?= $data['emails']; ?>" />
            </div>
            <!-- if session found echo that with alert -->
            <?php if (isset($_SESSION["emerr"])) : ?>

                <div class="alert-warning" role="alert">
                    <h4 class="alert-heading">Ohh No!</h4>
                    <p><?= $_SESSION["emerr"] ?></p>
                </div>
            <?php endif ?>
            <!-- if session found echo that with alert -->
            <?php if (isset($_SESSION["emFerr"])) : ?>

                <div class="alert-warning" role="alert">
                    <h4 class="alert-heading">Ohh No!</h4>
                    <p><?= $_SESSION["emFerr"] ?></p>
                </div>

            <?php endif ?>
            <!-- if session found echo that with alert -->
            <?php if (isset($_SESSION["emDerr"])) : ?>

                <div class="alert-warning" role="alert">
                    <h4 class="alert-heading">Ohh No!</h4>
                    <p><?= $_SESSION["emDerr"] ?></p>
                </div>

            <?php endif ?>

            <div class="form_group">
                <label id="icon" for="name"><i class="fas fa-user"></i></label>
                <input type="text" name="name" id="name" value="<?= $data['names']; ?>" />
            </div>
            <!-- if session found echo that with alert -->
            <?php if (isset($_SESSION["fnerr"])) : ?>

                <div class="alert-warning" role="alert">
                    <h4 class="alert-heading">Ohh No!</h4>
                    <p><?= $_SESSION["fnerr"] ?></p>
                </div>

            <?php endif ?>
            <div class="form_group">
                <label id="icon" for="university"><i class="fas fa-university"></i></label>
                <input type="text" name="university" id="university" value="<?= $data['university']; ?>" />
            </div>
            <!-- if session found echo that with alert -->
            <?php if (isset($_SESSION["unierr"])) : ?>


                <div class="alert-warning" role="alert">
                    <h4 class="alert-heading">Ohh No!</h4>
                    <p><?= $_SESSION["unierr"] ?></p>
                </div>

            <?php endif ?>

            <div class="form_group">
                <label id="icon" for="pass"><i class="fas fa-lock"></i></label>
                <input type="password" name="pass" id="pass" placeholder="Password" />
                <span class="pass_eye" onclick="change_eye()">
                    <i class="fas fa-eye" style="display: none;"></i>
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>
            <!-- if session found echo that with alert -->
            <?php if (isset($_SESSION["passerr"])) : ?>

                <div class="alert-warning" role="alert">
                    <h4 class="alert-heading">Ohh No!</h4>
                    <p><?= $_SESSION["passerr"] ?></p>
                </div>

            <?php endif ?>
            <div class="gender">
                <input type="radio" value="male" id="male" name="gender" checked />
                <label for="male" class="radio" chec>Male</label>
                <input type="radio" value="female" id="female" name="gender" />
                <label for="female" class="radio">Female</label>
            </div>
        </div>

        <div class="actions">
            <a href="all_users.php"><button type="button" class="button btn-cancel">cancel</button></a>
            <button type="submit" class="button">Update</button>
        </div>

        </div>
</form>

<script>
    function imgup() {
        document.querySelector("#ProfileImage").click();
    }

    function displayImg(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector("#ProfileDisplay").setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    // if img src is empty then show placeholder img 
    var img = document.querySelector("img");
    var imgsrc = img.getAttribute('src');
    if (imgsrc == "null") {
        img.setAttribute("src", "img/img-placeholder.png");
    }
</script>


<?php include '../includes/footer.php'; ?>