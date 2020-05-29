<?php
	// для добавления записи в базу данных database_company

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
	$build = $_POST["build"];

	// Условие на проверку квартиры
	if($_POST["flat"] == ''){
		$flat = null;
	} else {
		$flat = 'кв. '.$_POST["flat"];
	}

	$room = $_POST["room"];
	$workTime = $_POST["workTime"];
	$workPhone = $_POST["workPhone"];
	$workEmail = $_POST["workEmail"];

		// путь к файлу лого работника - не удалось реализовать
	// $userLogo = "URL:sdsdssd";
	// $userLogo = $_POST["userLogo"];
	// $userLogo = $_FILES['upload'];

	//подключаемся к базе данных
	require 'configDB.php';

	// добавляем данные в базу данных
	$sql = 'INSERT INTO employes(first_name, last_name, birthday, age, position, remote_work, city, street, build, flat, room, work_time, work_phone, work_email, logo) VALUES(:firstName, :lastName, :birthday, :age, :position, :remote_work, :city, :street, :build, :flat, :room, :work_time, :work_phone, :work_email, :logo )';

	$query = $pdo->prepare($sql);

	$query->execute(['firstName' => $firstName, 'lastName' => $lastName, 'birthday' => $dateBirthday, 'age' => $age, 'position' => $position, 'remote_work' => $remoteWork, 'city' => $city, 'street' => $street, 'build' => $build, 'flat' => $flat, 'room' => $room, 'work_time' => $workTime, 'work_phone' => $workPhone, 'work_email' => $workEmail, 'logo' => $userLogo]);

	header('Location: /');
	exit;
	$pdo = NULL;
?>
