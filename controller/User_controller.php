<?php

require_once dir . '/model/user.php';

class User_controller {
  
  public function action_login() {
    $login = '';
    $password = '';

    if (isset($_POST['log_in'])) {
      $login = $_POST['login'];
      $password = $_POST['password'];

      $errors = false;
      $user_login = User::login($login, $password);

      if ($user_login == false) {
        $errors[] = "Неверно указан логин или пароль";
      } else {
        $_SESSION['user'] = $user_login;
        header('Location: /');
      }
    }

    include_once dir . '/view/user/login.php';
    return true;
  }

  public function action_register() {
    $login = '';
    $password = '';
    $first_name = '';
    $last_name = '';

    if (isset($_POST['check_out'])) {
      $login = $_POST['login'];
      $password = $_POST['password'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];

      $errors = false;

      $result = User::register($login, $password, $first_name, $last_name);
      if ($result) {
        $errors[] = "Регистрация успешно завершена";
        header('Location: /login');
      } else {
        $errors[] = "Указанный логин уже существует";
      }
    }

    include_once dir . '/view/user/register.php';
    return true;
  }

  public function action_logout() {
    

    return true;
  }
}