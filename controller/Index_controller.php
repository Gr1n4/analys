<?php

class Index_controller {
  
  function action_index() {
    var_dump($_SESSION['result']);
    include_once dir . '/view/index.php';
  }
}