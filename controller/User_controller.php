<?php

require_once dir . '/model/user.php';

class User_controller {
  
  public function action_login() {
    // $login = '';
    // $password = '';
    $forms = [];
    $errors = false;

    if (isset($_POST['log_in'])) {
      // $login = $_POST['login'];
      // $password = $_POST['password'];
      $forms = $_POST;

      $user = User::login($forms);

      if ($user == false) {
        $errors[] = "Неверно указан логин или пароль";
      } else {
        $_SESSION['user'] = $user['login'];
        $_SESSION['id'] = $user['id'];
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
    $errors = false;

    if (isset($_POST['check_out'])) {
      $login = $_POST['login'];
      $password = $_POST['password'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];

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
    unset($_SESSION['user']);
    header('Location: /');
    return true;
  }
}