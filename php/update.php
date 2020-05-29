<?php
	// для обновления записи в базу данных database_company

		// переменные с данными от пользователя
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];

		// дата полученная от пользователя
	$birthday = $_POST["dateBirthday"];
		// конвертация даты
	$dateBirthday = date("m.d.Y", strtotime($_POST["dateBirthday"]));
		// возраст от выбранной даты
	function getFullYears($birthdayDate) {
		$datetime = new DateTime($birthdayDate);
		$interval = $datetime->diff(new DateTime(date("Y-m-d")));
		return $interval->format("%Y");
	}

	$age = getFullYears($birthday);

		// условие на проверку добавленной должности
	if($_POST["position"] == "Добавить должность:") {
		$position = $_POST["addYourPosition"];
	} else {
		$position = $_POST["position"];
	}

	$remoteWork = $_POST["remoteWork"];
		if($remoteWork == ''){ $remoteWork = 'off';}

	$city = $_POST["city"];
	$street = $_POST["street"];
	if($street == ''){ $street = NULL; }
	$build = $_POST["build"];
	if($build == ''){ $build = NULL; }

	// Условие на проверку квартиры
	if($_POST["flat"] == ''){
		$flat = NULL;
	} else {
		$flat = 'кв. '.$_POST["flat"];
	}

	$room = $_POST["room"];
	if($room == ''){ $room = NULL; }
	$workTime = $_POST["workTime"];
	if($workTime == ''){ $workTime = NULL; }
	$workPhone = $_POST["workPhone"];
	$workEmail = $_POST["workEmail"];
	if($workEmail == ''){ $workEmail = NULL; }

		// путь к файлу лого работника - не получилось реализовать
	$userLogo = "URL:sdsdssd";
	// $userLogo = $_POST["userLogo"];
	// $userLogo = $_FILES['upload'];

	//получаем индекс строки
	require 'indexRow.php';

	//подключаемся к базе данных
	require 'configDB.php';

	// обновдение данных

	$sql = 'UPDATE `employes` SET first_name=:firstName, last_name=:lastName, birthday=:birthday, age=:age, position=:position, remote_work=:remote_work, city=:city, street=:street, build=:build, flat=:flat, room=:room, work_time=:work_time, work_phone=:work_phone, work_email=:work_email, logo=:logo WHERE id=38';

	$table = $pdo->prepare($sql);

	$table->execute(['firstName' => $firstName, 'lastName' => $lastName, 'birthday' => $dateBirthday, 'age' => $age, 'position' => $position, 'remote_work' => $remoteWork, 'city' => $city, 'street' => $street, 'build' => $build, 'flat' => $flat, 'room' => $room, 'work_time' => $workTime, 'work_phone' => $workPhone, 'work_email' => $workEmail, 'logo' => $userLogo]);


	header('Location: /');
	exit;
	$pdo = NULL;

?>
