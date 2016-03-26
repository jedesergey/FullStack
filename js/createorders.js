var on = 0;

function noticebuy() {
	$("#back").css("opacity", "0.6");
	$("#back").fadeIn(500);
	$('#noticebuy').fadeIn(500);
	on = 1;
}

function noticesell() {
	$("#back").css("opacity", "0.6");
	$("#back").fadeIn(500);
	$('#noticesell').fadeIn(500);
	on = 1;
}

function offbuy() {
	if (on == 1) {
		/* убираем окно-блок DIV с именем класса css "popup" с помощью эффекта Затемнение fadeOut */
		$("#noticebuy").fadeOut('normal');
		/* возвращаем фону исходное состояние, дезактивируем затемненный фон back */
		$("#back").fadeOut('normal');
		/* не забываем про служебную переменную , возвращаем ей значение ноль */
		on = 0;
	}
	/* функция закрытия окна завершена */
}

function offsell() {
	if (on == 1) {
		/* убираем окно-блок DIV с именем класса css "popup" с помощью эффекта Затемнение fadeOut */
		$("#noticesell").fadeOut('normal');
		/* возвращаем фону исходное состояние, дезактивируем затемненный фон back */
		$("#back").fadeOut('normal');
		/* не забываем про служебную переменную , возвращаем ей значение ноль */
		on = 0;
	}
	/* функция закрытия окна завершена */
}


/* при клике на фоне HTML страницы, вне самого окна, окно закрывается */
$("div#back").click(function () {
	offbuy();
	offsell();
	off1();
	off2();
});

function closemodalbuy() {
	offbuy();
}

function closemodalsell() {
	offsell();
}

function buy(f) {
	
	console.log(f);

	var buyid = ["b1id", "b2id", "b3id", "b4id", "b5id", "b6id", "b7id", "b8id", "b9id", "b10id", "b11id", "b12id", "b13id", "b14id", "b15id", "b16id", "b17id", "b18id", "b19id"];



	function getXmlHttp() {
		var xmlhttp;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false;
			}
		}
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
			xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}

	var auth = 'buy';


	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
	xmlhttp.open('POST', '../realorders/buySkrillPerfectMoney.php', true); // Открываем асинхронное соединение
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
	xmlhttp.send("type=" + encodeURIComponent(auth));
	$("#noticebuy").fadeOut('normal');
	$.LoadingOverlay("show");
	xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера

		$.LoadingOverlay("hide");
		$("#back").css("opacity", "0.6");
		$("#back").fadeIn(500);
		//$('#nPopupCon').css("opacity", "1");
		$('#nPopupCon1').fadeIn(500);
		on = 1;


		if (xmlhttp.readyState == 4) { // Ответ пришёл
			if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
				var obj = {};
				obj = JSON.parse(xmlhttp.responseText);
				//alert(obj);
			}
		}
	}
}


function off1() {
	if (on == 1) {
		/* убираем окно-блок DIV с именем класса css "popup" с помощью эффекта Затемнение fadeOut */
		$("#nPopupCon1").fadeOut('normal');
		/* возвращаем фону исходное состояние, дезактивируем затемненный фон back */
		$("#back").fadeOut('normal');
		/* не забываем про служебную переменную , возвращаем ей значение ноль */
		on = 0;
	}
	/* функция закрытия окна завершена */
}


function off2() {
	if (on == 1) {
		/* убираем окно-блок DIV с именем класса css "popup" с помощью эффекта Затемнение fadeOut */
		$("#nPopupCon2").fadeOut('normal');
		/* возвращаем фону исходное состояние, дезактивируем затемненный фон back */
		$("#back").fadeOut('normal');
		/* не забываем про служебную переменную , возвращаем ей значение ноль */
		on = 0;
	}
	/* функция закрытия окна завершена */
}


function closemodal1() {
	off1();
}

function closemodal2() {
	off2();
}



function sell(f) {
	
	console.log(f);
	
	var sellid = ["s1id", "s2id", "s3id", "s4id", "s5id", "sb6id", "s7id", "s8id", "s9id", "s10id", "s11id", "s12id", "s13id", "s14id", "s15id", "s16id", "s17id", "s18id", "s19id"];

	function getXmlHttp() {
		var xmlhttp;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false;
			}
		}
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
			xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}

	var auth = 'sell';


	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
	xmlhttp.open('POST', '../php/createorders.php', true); // Открываем асинхронное соединение
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
	xmlhttp.send("type=" + encodeURIComponent(auth));
	$("#noticesell").fadeOut('normal');
	$.LoadingOverlay("show");
	xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера

		$.LoadingOverlay("hide");
		$("#back").css("opacity", "0.6");
		$("#back").fadeIn(500);
		//$('#nPopupCon').css("opacity", "1");
		$('#nPopupCon1').fadeIn(500);
		on = 1;


		if (xmlhttp.readyState == 4) { // Ответ пришёл
			if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
				var obj = {};
				obj = JSON.parse(xmlhttp.responseText);
				//alert(obj);
			}
		}
	}

}