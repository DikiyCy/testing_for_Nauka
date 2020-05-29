'use strict';


let body = document.querySelector('body'),
	addTableRow = document.querySelector('#add'),
	changeTableRow = document.querySelector('#change'),
	deleteTableRow = document.querySelector('#delete'),
	modal = document.getElementsByClassName('modal')[0],
	modalChange = document.getElementsByClassName('modal')[1],
	myTable = document.getElementById('myTable'),
	tableRow = document.getElementsByTagName('tr'),
	closeFormInModal = document.querySelector('#close'),
	closeFormInModalChange = document.querySelector('#closeChange'),
	position = document.querySelector('#position'),
	addYourPosition = document.querySelector('#addYourPosition'),
	positionChange = document.querySelector('#positionChange'),
	addYourPositionChange = document.querySelector('#addYourPositionChange');

window.addEventListener('DOMContentLoaded', () => {

	// search in table - поиск в таблице
	$("#search").keyup(function() {
		let _this = this;

		$.each($("#myTable tbody tr"), function() {
			if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
				$(this).hide();
			} else {
				$(this).show();
			}
		});
	});

	// cort table - сортировка таблицы
	$(myTable).tablesorter();

	// open modal window
	addTableRow.addEventListener('click', () => {
		modal.classList.toggle('modal_hidden');
		body.classList.toggle('body_overflow');
	});

	// close modal window
	closeFormInModal.addEventListener('click', () => {
		modal.classList.toggle('modal_hidden');
		body.classList.toggle('body_overflow');
		// location.reload();
	});

	// close modalChange window
	closeFormInModalChange.addEventListener('click', () => {
		modalChange.classList.toggle('modal_hidden');
		body.classList.toggle('body_overflow');
		location.reload();
	});

	// close modal and modalChange window
	window.addEventListener('keydown', (e) => {
		if(e.key === "Escape") {
			modal.classList.add('modal_hidden');
			modalChange.classList.add('modal_hidden');
			body.classList.remove('body_overflow');
		}
	});

	// open addPosition in modal
	position.addEventListener('change', () => {
		let optionsSelect = position.options[position.selectedIndex].value;
		if (optionsSelect == 'Добавить должность:') {
			addYourPosition.classList.toggle('input_hidden');
		} else {
			addYourPosition.classList.add('input_hidden');
		}
	});

	// open addPosition in modalChange
	positionChange.addEventListener('change', () => {
		let optionsSelect = positionChange.options[positionChange.selectedIndex].value;
		if (optionsSelect == 'Добавить должность:') {
			addYourPositionChange.classList.toggle('input_hidden');
		} else {
			addYourPositionChange.classList.add('input_hidden');
		}
	});

	// update row
	myTable.addEventListener('focusin', (event) => {
		let cell = +event.target.getAttribute('data-index');
		deleteTableRow.removeAttribute("disabled");
		changeTableRow.removeAttribute("disabled");
		// delete row
		deleteTableRow.addEventListener('click', () => {
			event.preventDefault();
			$.ajax({
				url: "php/deleteRow.php",
				type: "POST",
				data: ({
					indexRow: cell
				}),
				dataType: "html",
				beforeSend: function (xhr) {
					let answer = confirm('Вы точно хотите удалить запись?');
					if (!answer) {
						xhr.abort();
					}
				},
				success: function(indexRow) {
					location.reload();
				}
			});
		});

		// change row
		changeTableRow.addEventListener('click', () => {
			event.preventDefault();
			$.ajax({
				url: "php/indexRow.php",
				type: "POST",
				data: ({indexRowChange: cell}),
				dataType: "text",
				beforeSend: function () {
					modalChange.classList.remove('modal_hidden');
					body.classList.add('body_overflow');
				}
			});
		});

	});

	// load image in preview
	function readURL(input) {
		if (input.files && input.files[0]) {
			let reader = new FileReader();

			reader.onload = function(e) {
				$('#image').attr('src', e.target.result);
				}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#userLogo").change(function() {
		readURL(this);
	});

	// column resizing  --  don't work! I don't no why=(
	// $(function (){
	// 	$("#myTable").colResizable({
	// 		liveDrag:true,
	// 		gripInnerHtml:"<div class='grip'></div>",
	// 		draggingClass:"dragging",
	// 		resizeMode:'overflow',
	// 		disabledColumns: [2]
	// 	});
	// });

});
