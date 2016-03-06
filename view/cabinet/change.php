<?php include_once dir . '/view/layout/header.php'; ?>

<body>
  <?php if ($errors) {
    echo "<p>$errors[0]</p>";
  }
var_dump($result);
?>
  <form action="" method="post">
    Логин: <input type="text" name="login" value="<?php echo $form_data['login']; ?>">
    Имя: <input type="text" name="first_name" value="<?php echo $form_data['first_name']; ?>">
    Фамилия: <input type="text" name="last_name" value="<?php echo $form_data['last_name']; ?>">
    Пароль: <input type="text" name="password" value="<?php echo $form_data['password']; ?>">
    <input type="submit" name="change">
  </form>
</body>

<?php include_once dir . '/view/layout/footer.php'; ?>
