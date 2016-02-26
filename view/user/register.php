<?php include_once dir . '/view/layout/header.php'; ?>

<body>
  <p>Register</p>
  <?php if ($errors) {
    echo "<p>$errors[0]</p>";
  } ?>
  <form action="" method="post">
    <input type="text" name="login" placeholder="Login">
    <input type="text" name="first_name" placeholder="First name">
    <input type="text" name="last_name" placeholder="Last name">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="check_out">
  </form>
</body>

<?php include_once dir . '/view/layout/footer.php'; ?>