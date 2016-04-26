<?php include_once dir . '/view/layout/header.php'; ?>

<body>
  <h1>Регистрация</h1>
  <?php if ($errors) {
    echo "<p>$errors[0]</p>";
  } ?>
  <form action="" method="post">
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">
    <input type="text" name="surname" placeholder="Фамилия">
    <input type="text" name="first_name" placeholder="Имя">
    <input type="text" name="last_name" placeholder="Отчество">
    <input type="text" name="index" placeholder="Индекс">
    <input type="text" name="address" placeholder="Адрес">
    <input type="submit" name="check_out">
  </form>
</body>

<?php include_once dir . '/view/layout/footer.php'; ?>