<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
  <title>Form Submition with mysql</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="testbox">
    <h1>Registration</h1>

    <form action="submit.php" method="post">

      <hr>
      <?php if (!empty($_GET['sm'])) { ?><span class="text-success"><?php echo $_GET['sm'] ?></span><?php } ?>

      <label id="icon" for="email"><i class="icon-envelope "></i></label>
      <input type="text" name="email" id="email" placeholder="Email" />
      <?php if (!empty($_GET['emailerr'])) { ?><span class="text-danger"><?php echo $_GET['emailerr'] ?></span><?php } ?>

      <label id="icon" for="name"><i class="icon-user"></i></label>
      <input type="text" name="name" id="name" placeholder="Name" />
      <?php if (!empty($_GET['fnerr'])) { ?><span class="text-danger"><?php echo $_GET['fnerr'] ?></span><?php } ?>

      <label id="icon" for="pass"><i class="icon-shield"></i></label>
      <input type="password" name="pass" id="pass" placeholder="Password" />
      <?php if (!empty($_GET['passerr'])) { ?><span class="text-danger"><?php echo $_GET['passerr'] ?></span><?php } ?>

      <div class="gender">
        <input type="radio" value="male" id="male" name="gender" checked />
        <label for="male" class="radio" chec>Male</label>
        <input type="radio" value="female" id="female" name="gender" />
        <label for="female" class="radio">Female</label>
      </div>
      <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>
      <button type="submit" class="button">Register</button>

    </form>
  </div>
  <div class="view">
    <h3>All users data</h3>
    <hr>
    <table>
      <thead>
        <tr>
          <th>Email</th>
          <th>Name</th>
          <th>Password</th>
          <th>Gender</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT *  FROM users";
        $fire = mysqli_query($conn, $sql);
        while ($user = mysqli_fetch_assoc($fire)) { ?>
          <tr>
            <td><?php echo $user['emails']; ?></td>
            <td><?php echo $user['names']; ?></td>
            <td><?php echo $user['passwords']; ?></td>
            <td><?php echo $user['gender']; ?></td>
          </tr>

        <?php } ?>

      </tbody>
    </table>
  </div>
</body>

</html>