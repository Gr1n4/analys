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
    $sql = "SELECT * FROM users WHERE login = :login";
    $result = User::sql_inner($login, $sql);
    $id = $_SESSION['id'];

    $user = $result->fetch();
    if($user) {
      if ($_SESSION['user']==$user["login"]) {
        
        $sql = "UPDATE users SET login=:login, password=:password, first_name=:first_name, last_name=:last_name WHERE id=$id";

        $result = User::sql_inner($login, $sql, $password, $first_name, $last_name);
        return $result;
      }
      return false;
    } else {
        $sql = "UPDATE users SET login=:login, password=:password, first_name=:first_name, last_name=:last_name WHERE id=$id";

        $result = User::sql_inner($login, $sql, $password, $first_name, $last_name);
        return $result;
    }
  }
}
