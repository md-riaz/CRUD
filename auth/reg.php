<!-- include header file -->
<?php include '../includes/header.php'; ?>

<head>
  <title> Registration Page</title>
</head>
<div class="testbox">
  <h1>Registration</h1>

  <form action="reg_post.php" method="post" enctype="multipart/form-data">

    <hr>
    <!-- if session found echo that with alert -->
    <?php if (isset($_SESSION["success"])) : ?>

      <div class="alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p><?= $_SESSION["success"] ?></p>
      </div>

    <?php endif;
    unset($_SESSION["success"]) ?>

    <div class="form_group">
      <label id="icon" for="username"><i class="far fa-id-badge"></i></label>
      <input type="text" name="username" id="username" placeholder="Username" />
      <!-- if session found echo that with alert -->
      <?php if (isset($_SESSION["uerr"])) : ?>

        <div class="alert-warning" role="alert">
          <p><?= $_SESSION["uerr"] ?></p>
        </div>

      <?php endif;
      unset($_SESSION["uerr"]) ?>
      <!-- if session found echo that with alert -->
      <?php if (isset($_SESSION["uDerr"])) : ?>

        <div class="alert-warning" role="alert">

          <p><?= $_SESSION["uDerr"] ?></p>
        </div>

      <?php endif;
      unset($_SESSION["uDerr"]) ?>
    </div>

    <div class="form_group">
      <label id="icon" for="email"><i class="far fa-envelope"></i></label>
      <input type="text" name="email" id="email" placeholder="Email" />
      <!-- if session found echo that with alert -->
      <?php if (isset($_SESSION["emerr"])) : ?>

        <div class="alert-warning" role="alert">

          <p><?= $_SESSION["emerr"] ?></p>
        </div>
      <?php endif;
      unset($_SESSION["emerr"]) ?>
      <!-- if session found echo that with alert -->
      <?php if (isset($_SESSION["emFerr"])) : ?>

        <div class="alert-warning" role="alert">

          <p><?= $_SESSION["emFerr"] ?></p>
        </div>

      <?php endif;
      unset($_SESSION["emFerr"]) ?>
      <!-- if session found echo that with alert -->
      <?php if (isset($_SESSION["emDerr"])) : ?>

        <div class="alert-warning" role="alert">

          <p><?= $_SESSION[""] ?></p>
        </div>

      <?php endif;
      unset($_SESSION["emDerr"]) ?>
    </div>

    <div class="form_group">
      <label id="icon" for="name"><i class="fas fa-user"></i></label>
      <input type="text" name="name" id="name" placeholder="Full Name" />
      <!-- if session found echo that with alert -->
      <?php if (isset($_SESSION["fnerr"])) : ?>

        <div class="alert-warning" role="alert">

          <p><?= $_SESSION["fnerr"] ?></p>
        </div>

      <?php endif;
      unset($_SESSION["fnerr"]) ?>
    </div>

    <div class="form_group">
      <label id="icon" for="university"><i class="fas fa-university"></i></label>
      <input type="text" name="university" id="university" placeholder="Name of Institute/Polytechnic" />
      <!-- if session found echo that with alert -->
      <?php if (isset($_SESSION["unierr"])) : ?>

        <div class="alert-warning" role="alert">

          <p><?= $_SESSION["unierr"] ?></p>
        </div>

      <?php endif;
      unset($_SESSION["unierr"]) ?>
    </div>

    <div class="form_group">
      <label id="icon" for="pass"><i class="fas fa-lock"></i></label>
      <input type="password" name="pass" id="pass" placeholder="Password (A-z,0-9,@#$%*)" title="a-z,A-Z,0-9,!@#$%^&*" />
      <span class="pass_eye" onclick="change_eye()">
        <i class="fas fa-eye" style="display: none;"></i>
        <i class="fas fa-eye-slash"></i>
      </span>
      <!-- if session found echo that with alert -->
      <?php if (isset($_SESSION["passerr"])) : ?>

        <div class="alert-warning" role="alert">

          <p><?= $_SESSION["passerr"]; ?></p>
        </div>

      <?php endif;
      unset($_SESSION["passerr"]);  ?>
    </div>
    <div class="gender">
      <input type="radio" value="male" id="male" name="gender" checked />
      <label for="male" class="radio" chec>Male</label>
      <input type="radio" value="female" id="female" name="gender" />
      <label for="female" class="radio">Female</label>
    </div>
    <p class="terms">By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>
    <button type="submit" class="button">Register</button>

  </form>
</div>
<div class="login_page">
  <p>Already have an account? </p><a href="signin.php">Sign in</a>
</div>



<?php include '../includes/footer.php'; ?>