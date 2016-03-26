    function RecoveryPassword() {

    	if ((!document.getElementById('pass').value) || (!document.getElementById('pass2').value)) {
    		alert('Enter password');
    	} else {
    		send4();
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




    function send4() {

    	var v1 = document.getElementById('pass').value;
    	var v2 = document.getElementById('pass2').value;
    	var v3 = document.getElementById('key').value;


    	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    	xmlhttp.open('POST', 'recpass.php', true); // Открываем асинхронное соединение
    	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    	xmlhttp.send("pass=" + encodeURIComponent(v1) + "&pass2=" + encodeURIComponent(v2) + "&key=" + encodeURIComponent(v3));
    	xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
    		if (xmlhttp.readyState == 4) { // Ответ пришёл
    			if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)

    				ans = JSON.parse(xmlhttp.responseText);

    				if (ans == 1) {
    					alert('Passwords does not match');

    				}

    				if (ans == 2) {
    					document.getElementById('recovery').style.display = 'none';
    					document.getElementById('succrecovery').style.display = '';

    				}

    				if (ans == 3) {
    					alert('Error!');



    				}

    			}
    		}
    	}
    }