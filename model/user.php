<?php

class User {

  public static function sql_inner($login, $sql) {
    $db = Db::get_connection();
    $db->exec('SET CHARACTER SET utf8');

    $result = $db->prepare($sql);
    $result->bindParam(':login', $login, PDO::PARAM_INT);
    if (func_num_args() > 2) {
      $result->bindParam(':password', func_get_arg(2), PDO::PARAM_INT);
    }
    if (func_num_args() > 3) {
      $result->bindParam(':first_name', func_get_arg(3), PDO::PARAM_INT);
      $result->bindParam(':last_name', func_get_arg(4), PDO::PARAM_INT);
    }
    $result->execute();

    return $result;
  }
  
  public static function login($login, $password) {

    $sql = "SELECT * FROM users WHERE login = :login and password = :password";
    $result = User::sql_inner($login, $sql, $password);

    $user = $result->fetch();
    if ($user) {
      return $user;
    } else return false;
  }

  public static function register($login, $password, $first_name, $last_name) {

    $sql = "SELECT * FROM users WHERE login = :login";
    $result = User::sql_inner($login, $sql);

    $user = $result->fetch();
    if ($user) {
      return false;
    } else {
      $sql = "INSERT INTO users (login, password, first_name, last_name)
              VALUES (:login, :password, :first_name, :last_name)";
      $result = User::sql_inner($login, $sql, $password, $first_name, $last_name);
      return $result;
    }
  }
}