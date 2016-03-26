    function CheckFieldEmail() {

    	if ((!document.getElementById('emaillost').value) || (!document.getElementById('code').value)) {
    		alert('Enter data');
    	} else {
    		send3();
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




    function send3() {

    	var w1 = document.getElementById('emaillost').value;
    	var w2 = document.getElementById('code').value;

    	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    	xmlhttp.open('POST', 'lostcode.php', true); // Открываем асинхронное соединение
    	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    	xmlhttp.send("email=" + encodeURIComponent(w1) + "&code=" + encodeURIComponent(w2));
    	xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
    		if (xmlhttp.readyState == 4) { // Ответ пришёл
    			if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)


    				obj = JSON.parse(xmlhttp.responseText);
					console.log(obj);




    				if (obj == 1) {
    					document.getElementById('g1').innerHTML = '*Incorrect E-mail';


    				}

    				if (obj == 2) {
    					alert('Enter symbols');

    				}

    				if (obj == 3) {
    					document.getElementById('ftrue').style.display = 'none';
    					document.getElementById('strue').style.display = '';

    				}

    			}
    		}
    	}
    }