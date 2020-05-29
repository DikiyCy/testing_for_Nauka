<!doctype html>
<html lang="ru">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Complitable" content="ie=edge">

		<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
		<link rel="stylesheet" href="css/font.css">
		<link rel="stylesheet" href="css/style.min.css">

		<title>Employe</title>
	</head>
	<body class="body">

		<!-- header -->
		<header class="header">
			<div class="container">
				<div class="header__text">Главное окно</div>
			</div>
		</header>

		<!-- s_1-поиск сотрудников -->
		<section class="search">
			<div class="container form-group">
				<input class="input input_search form-control pull-right" name="Поиск" type="text" placeholder="Поиск по таблице" id="search"  title="Поиск по имени, фамилии, должности месту проживания сотрудника">
			</div>
		</section>

		<!-- s_2-change -->
		<section class="changе">
			<div class="container">
				<!-- классы btn,потому что этот input почти button -->
				<input class="btn btn_change" type="button" value="Добавить" id="add"  title="Добавить новую запись">
				<input class="btn btn_change" type="button" value="Редактировать" id="change" disabled title="Выделите запись для редактирования">
				<input class="btn btn_change" type="button" value="Удалить" id="delete" disabled title="Выделите запись для удаления">
			</div>
		</section>

		<!-- s_3-employees -->
		<section class="employees">
			<div class="container">
				<table class="table" id="myTable">
					<thead  title="Нажмите на ячейку для сортировки значений">
						<tr class="table__header" role="row">
							<th>
								<p>Превью</p>
							</th>
							<th>
								<p>Имя</p>
							</th>
							<th>
								<p>Фамилия</p>
							</th>
							<th>
								<p>Дата Рождения</p>
							</th>
							<th>
								<p>Возраст</p>
							</th>
							<th>
								<p>Должность</p>
							</th>
							<th>
								<p>Удаленная работа</p>
							</th>
							<th>
								<p>Адрес проживания</p>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						// подключились к файлу создания строк
							require 'php/addRow.php';

						?>
					</tbody>
				</table>
			</div>
		</section>

		<!-- footer -->
		<footer class="footer">
			<div class="container">
			</div>
		</footer>

		<!-- modal -->
		<div class="modal modal_hidden">
			<div class="container">
				<div class="header">Добавление</div>
				<div class="employe">
					<form name="formEmployers" action="php/add.php" method="POST" enctype="multipart/form-data">
						<div class="employe__wrapper employe__wrapper_regular">
							<div class="employe__img">
								<div class="employe__img">
									<img id="image"src="#" alt="Фото пользователя">
								</div>
								<input class="input input_loaded" id="userLogo" name="userLogo" type="file" accept="image/jpeg,image/png,image/gif">
							</div>
							<div class="employe__wrapper employe__wrapper_input">
								<input class="input" name="firstName" type="text" placeholder="Имя" pattern="[A-Za-zА-Яа-яЁё]{4,}" required title="Введите имя">
								<input class="input" name="lastName" type="text" placeholder="Фамилия" pattern="^(([a-zA-Zа-яА-ЯёЁ]*)|([a-zA-Zа-яА-ЯёЁ\-]*)|([a-zA-Zа-яА-ЯёЁ]+[\-|\s]?[a-zA-Zа-яА-ЯёЁ]*[\-|\s]?[a-zA-Zа-яА-ЯёЁ]*[\-|\s]?[a-zA-Zа-яА-ЯёЁ]*))$" required title="Введите фамилию">
								<div>
									<input class="input input_dateBirthday" name="dateBirthday" id="dateBirthday" type="date" required min="1920-01-01" max="2002-05-19" title="Выберите дату рождения">
									<label for="dateBirthday" title="Нажмите на иконку календаря слева">
										<button class="btn btn_calendar" type="button">
											<img src="img/logo-calendario.png" alt="calendar">
										</button>
									</label>
								</div>
								<select class="input" name="position" id="position" title="Выберите должность из списка или введите своё значение">
									<option value="0">Должность</option>
									<option value="Техник">Техник</option>
									<option value="Программист">Программист</option>
									<option value="Бухгалтер">Бухгалтер</option>
									<option value="Добавить должность:" id="addPosition" style="color:red">Добавить должность:</option>
								</select>
								<input class="input input_hidden" id="addYourPosition" name="addYourPosition" type="text" placeholder="Введите вашу должность" pattern="[A-Za-zА-Яа-яЁё]{4,}" title="Введите своё значение">

								<div class="remoteWork" title="Отметьте, если удалённая работа">
									<input class="input input_checkbox" name="remoteWork" id="remoteWork" type="checkbox" >
									<label for="remoteWork">Удаленка</label>
								</div>
							</div>
							<div class="employe__wrapper employe__wrapper_input">
								<input class="input" name="city" type="text" placeholder="Город" required title="Введите город проживания, например, г. Санкт_петербург">
								<input class="input" name="street" type="text" placeholder="Улица" title="Введите название улицы, например, пр. Ленина">
								<input class="input" name="build" type="text" placeholder="Дом" pattern="^[0-9]+(\/|к)?[0-9]*$"  title="Введите номер дома, например, 9 или 9/11 или 9к11">
								<input class="input" name="flat" type="text" placeholder="Квартира" pattern="^[0-9]*$" title="Введите номер квартиры (без 'кв.'), например, 12">
							</div>
						</div>
						<hr>
						<div class="employe__wrapper">
							<div class="employe__wrapper employe__wrapper_extra">
								<label for="room">Кабинет:</label>
								<input id="room" name="room" class="input" type="text" pattern="^([A-Za-zА-Яа-яЁё]{1,2})?[0-9]{1,3}([A-Za-zА-Яа-яЁё]{1,2})?$" placeholder="Номер кабинета" title="Введите номер кабинета, например, г26 или 26 или 26г">
							</div>
							<div class="employe__wrapper employe__wrapper_extra">
								<label for="workTime">График работы:</label>
								<input id="workTime" name="workTime" class="input" type="text" placeholder="XX:XX-XX:XX" pattern="\b([01]?[0-9]|2[0-3])[,.:][0-5][0-9]-([01]?[0-9]|2[0-3])[,.:][0-5][0-9]\b" title="Введите рабочее время, например, 9.00-18.30 или 09:30-20:45">
							</div>
							<div class="employe__wrapper employe__wrapper_extra">
								<label for="workPhone">Рабочий телефон:</label>
								<input id="workPhone" name="workPhone" class="input" type="tel"  placeholder="8XXXXXXXXXX" pattern="^\+?[0-9]{11}$" required  title="Введите рабочий телефон начиная с 8 (всего 11 цифр), например, 89211234567">
							</div>
							<div class="employe__wrapper employe__wrapper_extra">
								<label for="workEmail">Рабочий e-mail:</label>
								<input id="workEmail" name="workEmail" class="input" type="email" pattern="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$" placeholder="example@post.com" title="Введите рабочую электронную почту, например, example@post.com">
							</div>
						</div>
						<div class="employe__wrapper employe__wrapper_answer">
							<button id="submit" class="btn btn_form" type="submit" formenctype="multipart/form-data" title="Отправить данные и выйти">Отправить</button>
							<button id="reset" class="btn btn_form" type="reset" title="Полностью очистить форму">Очистить</button>
							<button id="close" class="btn btn_form" type="button"  title="Заполненные поля сохраняться до перезагрузки страницы">Закрыть</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- modalChange -->
		<div class="modal modal_hidden modal_change">
			<div class="container">
				<div class="header">Редактирование</div>
				<div class="employe">
				<!-- создание модального окна для редактирования -->
				<?php
					require 'php/changeRow.php';
				?>
				</div>
			</div>
		</div>

		<!-- script jq -->
		<script src="js/jquery-3.5.1.min.js"></script>
		<!-- script for sort table -->
		<script src="js/jquery-latest.js"></script>
		<script src="js/jquery.tablesorter.min.js"></script>
		<!-- script for colresizing -->
		<script src="js/colResizable-1.6.min.js"></script>
		<!-- regular script -->
		<script src="js/script.js"></script>
	</body>
</html>
