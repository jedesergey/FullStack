    function tryLogin() {

    	if (!document.getElementById('email').value) {
    		alert('Enter E-mail');
    	}

    	if (!document.getElementById('password').value) {
    		alert('Enter password');

    	} else {

    		send2();


    	}
    }

    /* Данная функция создаёт кроссбраузерный объект XMLHTTP */
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




    function send2() {


    	var k1 = document.getElementById('password').value;

    	var k2 = document.getElementById('email').value;

    	var log;


    	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    	xmlhttp.open('POST', 'login.php', true); // Открываем асинхронное соединение
    	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    	xmlhttp.send("email=" + encodeURIComponent(k2) + "&password=" + encodeURIComponent(k1));
    	xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
    		if (xmlhttp.readyState == 4) { // Ответ пришёл
    			if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)


    				log = JSON.parse(xmlhttp.responseText);

    				var l1 = log;

    				if (l1 == 0) {

    					alert('Invalid e-mail or password');

    				}

    				if (l1 == 2) {

    					alert('You  not confirm E-mail');

    				}

    				window.location.href = "index.php";

    			}
    		}
    	}
    }