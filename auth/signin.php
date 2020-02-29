<!-- include header file -->
<?php include '../includes/header.php'; ?>

<head>
    <title>SIGNIN</title>
</head>
<div class="testbox">
    <h1>Sign In</h1>

    <form action="signin_post.php" method="post" enctype="multipart/form-data">

        <hr>

        <div class="form_group">
            <label id="icon" for="email"><i class="far fa-envelope"></i></label>
            <input type="text" name="email" id="email" placeholder="Email Address" />
            <!-- if session found echo that with alert -->


        </div>

        <div class="form_group">
            <label id="icon" for="pass"><i class="fas fa-lock"></i></label>
            <input type="password" name="pass" id="pass" placeholder="Password" />
            <span class="pass_eye" onclick="change_eye()">
                <i class="fas fa-eye" style="display: none;"></i>
                <i class="fas fa-eye-slash"></i>
            </span>
            <!-- if session found echo that with alert -->

        </div>
        <button type="submit" class="button signin">SIGN IN</button>

    </form>
</div>
<div class="login_page">
    <p>Don't you have account? </p><a href="reg.php">sign up here</a>
</div>



<?php include '../includes/footer.php'; ?>