<?php
	require 'indexRow.php';

	require 'configDB.php';

	$query = $pdo->query('SELECT * FROM `employes` WHERE `id` = '.$idTableRow.'');
	$rowChange = $query->fetch(PDO::FETCH_OBJ);

	// форматируем время
	$dateBirthday = date("Y-m-d", strtotime($rowChange->birthday));

	// формируем модальное окно
	echo '<form name="formEmployersChange" action="php/update.php" method="POST" enctype="multipart/form-data">
		<div class="employe__wrapper employe__wrapper_regular">
			<div class="employe__img">
				<div class="employe__img">
					<!-- <img src="img/logo_employe.png" alt="Фото пользователя"> -->
					<img id="image"src="#" alt="Фото пользователя">
				</div>
				<!-- разобраться с загрузкой фото -->
				<input class="input input_loaded" id="userLogoChange" name="userLogo" type="file" accept="image/jpeg,image/png,image/gif">
			</div>
			<div class="employe__wrapper employe__wrapper_input">
				<input class="input" name="firstName" type="text" placeholder="Имя" pattern="[A-Za-zА-Яа-яЁё]{4,}" required value="'.$rowChange->first_name.'" title="Введите имя">
				<input class="input" name="lastName" type="text" placeholder="Фамилия" pattern="^(([a-zA-Zа-яА-ЯёЁ]*)|([a-zA-Zа-яА-ЯёЁ\-]*)|([a-zA-Zа-яА-ЯёЁ]+[\-|\s]?[a-zA-Zа-яА-ЯёЁ]*[\-|\s]?[a-zA-Zа-яА-ЯёЁ]*[\-|\s]?[a-zA-Zа-яА-ЯёЁ]*))$" required value="'.$rowChange->last_name.'" title="Введите фамилию">
				<div>
					<input class="input input_dateBirthday" name="dateBirthday" id="dateBirthdayChange" type="date" required min="1920-01-01" max="2002-05-19" value="'.$dateBirthday.'" title="Выберите дату рождения">
					<label for="dateBirthdayChange" title="Нажмите на иконку календаря слева">
						<button class="btn btn_calendar" type="button">
							<img src="img/logo-calendario.png" alt="calendar">
						</button>
					</label>
				</div>
				<select class="input" name="position" id="positionChange" title="Выберите должность из списка или введите своё значение">
					<option value="0">Должность</option>
					<option value="Техник"';
if ($rowChange->position == 'Техник') {
	echo 'selected';
}
					echo '>Техник</option>
					<option value="Программист"';
if ($rowChange->position == 'Программист') {
	echo 'selected';
}
					echo '>Программист</option>
					<option value="Бухгалтер"';
if ($rowChange->position == 'Бухгалтер') {
	echo 'selected';
}
					echo '>Бухгалтер</option>
					<option value="Добавить должность:" id="addPositionChange" style="color:red">Добавить должность:</option>
				</select>
				<input class="input input_hidden" id="addYourPositionChange" name="addYourPosition" type="text" placeholder="Введите вашу должность" pattern="[A-Za-zА-Яа-яЁё]{4,}" title="Введите своё значение">

				<div class="remoteWork" title="Отметьте, если удалённая работа">
					<input class="input input_checkbox" name="remoteWork" id="remoteWorkChange" type="checkbox"';
if ($rowChange->remote_work == 'on') {
	echo 'checked';
}
echo '>
					<label for="remoteWorkChange">Удаленка</label>
				</div>
			</div>
			<div class="employe__wrapper employe__wrapper_input">
				<input class="input" name="city" type="text" placeholder="Город" required value="'.$rowChange->city.'" title="Введите город проживания, например, г. Санкт_петербург">
				<input class="input" name="street" type="text" placeholder="Улица" value="'.$rowChange->street.'" title="Введите название улицы, например, пр. Ленина">
				<input class="input" name="build" type="text" placeholder="Дом" pattern="^[0-9]+(\/|к)?[0-9]*$" value="'.$rowChange->build.'" title="Введите номер дома, например, 9 или 9/11 или 9к11">
				<input class="input" name="flat" type="text" placeholder="Квартира" pattern="^[0-9]*$" value="'.$rowChange->flat.'" title="Введите номер квартиры (без "кв."), например, 12">
			</div>
		</div>
		<hr>
		<div class="employe__wrapper">
			<div class="employe__wrapper employe__wrapper_extra">
				<label for="roomChange">Кабинет:</label>
				<input id="roomChange" name="room" class="input" type="text" pattern="^[0-9]{1,3}([A-Za-zА-Яа-яЁё]{1,2})?$" placeholder="например, 2с" value="'.$rowChange->room.'" title="Введите номер кабинета, например, г26 или 26 или 26г">
			</div>
			<div class="employe__wrapper employe__wrapper_extra">
				<label for="workTimeChange">График работы:</label>
				<input id="workTimeChange" name="workTime" class="input" type="text" placeholder="XX:XX-XX:XX" pattern="\b([01]?[0-9]|2[0-3])[,.:][0-5][0-9]-([01]?[0-9]|2[0-3])[,.:][0-5][0-9]\b" value="'.$rowChange->work_time.'" title="Введите рабочее время, например, 9.00-18.30 или 09:30-20:45">
			</div>
			<div class="employe__wrapper employe__wrapper_extra">
				<label for="workPhoneChange">Рабочий телефон:</label>
				<input id="workPhoneChange" name="workPhone" class="input" type="tel"  placeholder="8XXXXXXXXXX" pattern="^\+?[0-9]{11}$" required value="'.$rowChange->work_phone.'" title="Введите рабочий телефон начиная с 8 (всего 11 цифр), например, 89211234567">
			</div>
			<div class="employe__wrapper employe__wrapper_extra">
				<label for="workEmailChange">Рабочий e-mail:</label>
				<input id="workEmailChange" name="workEmail" class="input" type="email" pattern="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$" placeholder="example@post.com" value="'.$rowChange->work_email.'" title="Введите рабочую электронную почту, например, example@post.com">
			</div>
		</div>
		<div class="employe__wrapper employe__wrapper_answer">
			<button id="submitChange" class="btn btn_form" type="submit" formenctype="multipart/form-data"  title="Обновить данные и выйти">Обновить и выйти</button>
			<button id="resetChange" class="btn btn_form" type="reset" title="Полностью очистить форму">Очистить</button>
			<button id="closeChange" class="btn btn_form" type="button" title="Выйти без изменений">Выйти без изменений</button>
		</div>
	</form>';
?>
