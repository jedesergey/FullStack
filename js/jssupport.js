 

 function CheckFields() {

 	document.getElementById('p1').innerHTML = '';
 	document.getElementById('p2').innerHTML = '';
 	document.getElementById('p3').innerHTML = '';
 	document.getElementById('p4').innerHTML = '';
 	document.getElementById('p5').innerHTML = '';


 	if (!document.getElementById('name').value) {
 		document.getElementById('p1').innerHTML = '*Enter First and Last Name';
 	}

 	if (!document.getElementById('emailuser').value) {
 		document.getElementById('p2').innerHTML = '*Enter E-mail';

 	}

 	if (!document.getElementById('username').value) {
 		document.getElementById('p3').innerHTML = '*Enter Username';

 	}

 	if (!document.getElementById('text').value) {
 		document.getElementById('p4').innerHTML = '*Enter Subject';

 	}

 	if (!document.getElementById('code').value) {
 		document.getElementById('p5').innerHTML = '*Enter symbols';

 	} else {
 		send();
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




 function send() {

 	var inp1 = document.getElementById('emailuser').value;
 	var inp2 = document.getElementById('username').value;
 	var inp3 = document.getElementById('code').value;
 	var obj = {};


 	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
 	xmlhttp.open('POST', 'feedbackcode.php', true); // Открываем асинхронное соединение
 	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
 	xmlhttp.send("email=" + encodeURIComponent(inp1) + "&username=" + encodeURIComponent(inp2) + "&code=" + encodeURIComponent(inp3));
 	xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
 		if (xmlhttp.readyState == 4) { // Ответ пришёл
 			if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)


 				obj = JSON.parse(xmlhttp.responseText);



 				var r1 = obj[0];
 				var r2 = obj[1];
 				var r3 = obj[2];
 				var r4 = obj[3];
 				var r5 = obj[4];
 				var r6 = obj[5];



 				if (r1 == 1) {
 					document.getElementById('p2').innerHTML = '*Incorrect E-mail';


 				}

 				if (r2 == 1) {
 					document.getElementById('p3').innerHTML = '*Incorrect username';

 				}

 				if (r3 == 1) {
 					document.getElementById('p5').innerHTML = '*Incorrect symbols';

 				}

 				if (r4 == 1) {
 					document.getElementById('p2').innerHTML = '*Incorrect E-mail';

 				}

 				if (r5 == 1) {
 					document.getElementById('p3').innerHTML = '*Incorrect Username';

 				}

 				if (r6 == 1) {
					if (self==parent) {
if (confirm('Your letter is successfully sent!')) location.href="support.php" };
 					

 				}




 			}
 		}
 	}
 }