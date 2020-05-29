<?php
	// подключились к базе данных
	require 'configDB.php';

	// получаем все строки из базы данных
	$query = $pdo->query('SELECT * FROM `employes` ORDER BY `id` ASC');

	while($row = $query->fetch(PDO::FETCH_OBJ)) {
			// начало таблицы
		echo '<tr class="table__items" tabindex="1" data-index="'.$row->id.'"  title="нажмите для выделения записи">';
		echo '<td><div class="table__img"><img src="img/logo_employe.png" alt="#"></div></td>';
		echo '<td><div class="name">'.$row->first_name.'</div></td>';
		echo '<td><div class="surname">'.$row->last_name.'</div></td>';
		echo '<td><div class="birthday">'.$row->birthday.'</div></td>';
		echo '<td><div class="age">'.$row->age.'</div></td>';
		echo '<td><div class="position">'.$row->position.'</div></td>';
		if($row->remote_work == 'on') {
			echo '<td><input class="input input_table" name="remote" type="checkbox" checked disabled></td>';
		} else {
			echo '<td><input class="input input_table" name="remote" type="checkbox" disabled></td>';
		}
		echo '<td><div class="address">'.$row->city.' '.$row->street.' '.$row->build.' '.$row->flat.'</div></td>';
			// конец таблицы
		echo '</tr>';
	}
?>
