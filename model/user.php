<?php

class User {

  public static function sql_inner($forms) {
    $db = Db::get_connection();
    $db->exec('SET CHARACTER SET utf8');

    $result = $db->prepare($forms[0]);
    $counter = count($forms);
    echo $counter;
    switch ($counter) {
      case 2:
        $result->bindParam(':login', $forms['login'], PDO::PARAM_INT);
        
      case 3:
        $result->bindParam(':login', $forms['login'], PDO::PARAM_INT);
        $result->bindParam(':password', $forms['password'], PDO::PARAM_INT);
      
      case 7:
        $result->bindParam(':login', $forms['login'], PDO::PARAM_INT);
        $result->bindParam(':password', $forms['password'], PDO::PARAM_INT);
        $result->bindParam(':first_name', $forms['first_name'], PDO::PARAM_INT);
        $result->bindParam(':last_name', $forms['last_name'], PDO::PARAM_INT);
        $result->bindParam(':surname', $forms['surname'], PDO::PARAM_INT);
        $result->bindParam(':index', $forms['index'], PDO::PARAM_INT);
        $result->bindParam(':address', $forms['address'], PDO::PARAM_INT);
      }

      $result->execute();

      return $result;
    }

  public static function login($forms) {

    $sql = "SELECT * FROM users WHERE login = :login and password = :password";
    array_unshift($forms, $sql);
    array_pop($forms);
    $result = User::sql_inner($forms);

    $user = $result->fetch();
    if ($user) {
      return $user;
    } else return false;
  }

  public static function register($forms) {

    $sql = "SELECT * FROM users WHERE login = :login";
    array_unshift($forms, $sql);
    array_pop($forms);
    $result = User::sql_inner($forms);

    $user = $result->fetch();
    if ($user) {
      return false;
    } else {
      $sql = "INSERT INTO users (login, password, first_name, last_name, surname, index, address)
              VALUES (:login, :password, :first_name, :last_name, :surname, :index, :address)";
      array_shift($forms);
      array_unshift($forms, $sql);
      print_r($forms);
      $result = User::sql_inner($forms);
      return $result;
    }
  }
}
/*
не работает регистрация, не запускается обработчик в user_controller 37-45.
*/