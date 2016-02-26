<?php include_once dir . '/view/layout/header.php'; ?>
<?php if (isset($_SESSION['user'])): ?>
<body>
	<a href="add">Добавить</a>
	<a href="edit">Редактировать</a>
	<a href="analys">Анализ</a>
  <a href="cabinet">Кабинет</a>
  <a href="logout">Выход</a>
</body>
<?php else: ?>
<body>
  <a href="register">Регистрация</a>
  <a href="login">Вход</a>
</body>
<?php endif; ?>

<?php include_once dir . '/view/layout/footer.php'; ?>