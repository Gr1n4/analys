<?php

require_once dir . '/model/user.php';

class Cabinet {

  public static function filling_form() {
    $sql = 'SELECT * FROM users WHERE login = :login';
    $login = $_SESSION['user'];
    $result = User::sql_inner($login, $sql);
    $form_data = $result->fetch();
    return $form_data;
  }

  public static function change($login, $password, $first_name, $last_name) {
    
  }
}