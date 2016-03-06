<?php

require_once dir . '/model/cabinet.php';

class Cabinet_controller {
  
  public function action_index() {
    if (isset($_SESSION['user'])) {
      
      include_once dir . '/view/cabinet/index.php';
    } else header('Location: /');

    return true;
  }

  public function action_change() {
    if (isset($_SESSION['user'])) {
      $form_data = Cabinet::filling_form();

      $login = '';
      $password = '';
      $first_name = '';
      $last_name = '';
      $errors = false;
      $result = 'lol';

      if (isset($_POST['change'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        $result = Cabinet::change($login, $password, $first_name, $last_name);
        var_dump($result);
        if ($result) {
          $errors[] = "Замена данных успешно произведена.";
          $_SESSION['user'] = $login;
          header('Location: /cabinet/change');
        } else {
          $errors[] = "Указанный логин уже существует.";
        }
      }

      include_once dir . '/view/cabinet/change.php';
      
    } else header('Location: /');

    return true;
  }
}
