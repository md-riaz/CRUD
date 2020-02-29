<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Form</title>
  </head>
  <body>

<div class="container">
  <div class="row">
    <div class="col-md-6 m-auto">

      <div class="card">
        <div class="card-header text-center bg-success text-white">
          Form Validation
        </div>
        <div class="card-body">

          <form action="submit.php" method="post">
            <div class="form-group">
              <input type="text" name="fname" class="form-control" placeholder="Enter Full Name">
              <?php if (isset($_GET['fnerr'])) {?>
                <p class="text-danger "><?php echo $_GET['fnerr']; ?></p>
              <?php } ?>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Enter email">
              <?php if (isset($_GET['emerr'])) {?>
                <p class="text-danger "><?php echo $_GET['emerr']; ?></p>
              <?php } ?>
            </div>
            <div class="form-group">
              <input type="password" name="pass" class="form-control" placeholder="Password">
              <?php if (isset($_GET['pserr'])) {?>
                <p class="text-danger "><?php echo $_GET['pserr']; ?></p>
              <?php } ?>
            </div>
            <div class="form-group">
              <input type="password" name="repass" class="form-control" placeholder="Re - password">
              <?php if (isset($_GET['repaerr'])) {?>
                <p class="text-danger "><?php echo $_GET['repaerr']; ?></p>
              <?php } ?>
            </div>
            <div class="form-group">
              <input type="radio" value="male" name="gender">Male
              <input type="radio" value="Female" name="gender">Female
              <?php if (isset($_GET['gerr'])) {?>
                <p class="text-danger "><?php echo $_GET['gerr']; ?></p>
              <?php } ?>
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1" value="Checked">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>


  </body>
</html>
