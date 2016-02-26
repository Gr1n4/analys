<?php include_once dir . '/view/layout/header.php'; ?>

<p>Login</p>
<?php if ($errors != false): ?>
  <p><?php echo $errors[0]; ?></p>
<?php endif; ?>
<form action="" method="post">
  <input type="text" name="login" placeholder="Login">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" name="log_in">
</form>

<?php include_once dir . '/view/layout/footer.php'; ?>