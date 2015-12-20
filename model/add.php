<?php

class Add_model {
	
	public static function action() {
		$db = Db::get_connection();
		$db_name = $_POST['surname'];
		$db_revenue = $_POST['revenue'];
		$db_loan = $_POST['loan'];
		$db_debt = $_POST['debt'];
		$db_founder = $_POST['founder'];
		$db_obligation = $_POST['obligation'];
		$db_date = $_POST['date'];
		$db->query("CREATE TABLE IF NOT EXISTS $db_name LIKE main");
		$db->query("INSERT INTO $db_name (surname, revenue, loan, debt, 
			founder, obligation, date)
			VALUES ('$db_name', '$db_revenue', '$db_loan', '$db_debt', '$db_founder', 
			'$db_obligation', '$db_date')");
	}
}