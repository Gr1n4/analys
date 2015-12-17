<?php 

include_once(ROOT . '/model/add.php');

class Add_controller {
	
	public function action_add() {
		require_once (ROOT . '/view/add.php');
	}

	public function action_index() {
		Add_model::action();
		echo "Данные успешно загружены";
	}
}