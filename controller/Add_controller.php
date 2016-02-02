<?php 

include_once(dir . '/model/add.php');

class Add_controller {
	
	public function action_add() {
		require_once (dir . '/view/add.php');
	}

	public function action_index() {
		Add_model::action();
		echo "Данные успешно загружены";
	}
}