    function CheckFields() {

    	document.getElementById('p1').innerHTML = '';
    	document.getElementById('p2').innerHTML = '';
    	document.getElementById('p3').innerHTML = '';
    	document.getElementById('p4').innerHTML = '';
    	document.getElementById('p5').innerHTML = '';
    	document.getElementById('p6').innerHTML = '';
    	document.getElementById('p7').innerHTML = '';

    	if (!document.getElementById('rLogin').value) {
    		document.getElementById('p3').innerHTML = '*Enter login';
    	}

    	if (!document.getElementById('rPass').value) {
    		document.getElementById('p4').innerHTML = '*Enter password';

    	}

    	if (!document.getElementById('rPass2').value) {
    		document.getElementById('p5').innerHTML = '*Repeat password';

    	}

    	if (!document.getElementById('rEmail').value) {
    		document.getElementById('p1').innerHTML = '*Enter Email';

    	}

    	if (!document.getElementById('rEmail2').value) {
    		document.getElementById('p2').innerHTML = '*Repeat E-mail';

    	}

    	if (!document.getElementById('code').value) {
    		document.getElementById('p6').innerHTML = '*Enter symbols';

    	}

    	if (!document.getElementById('reg_eula').checked) {
    		document.getElementById('p7').innerHTML = "*You don't agree with terms";
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

    	var inp1 = document.getElementById('rLogin').value;
    	var inp2 = document.getElementById('rPass').value;
    	var inp3 = document.getElementById('rPass2').value;
    	var inp4 = document.getElementById('rEmail').value;
    	var inp5 = document.getElementById('rEmail2').value;
    	var inp6 = document.getElementById('code').value;
    	var obj = {};


    	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    	xmlhttp.open('POST', 'verifier.php', true); // Открываем асинхронное соединение
    	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    	xmlhttp.send("rLogin=" + encodeURIComponent(inp1) + "&rPass=" + encodeURIComponent(inp2) + "&rPass2=" + encodeURIComponent(inp3) + "&rEmail=" + encodeURIComponent(inp4) + "&rEmail2=" + encodeURIComponent(inp5) + "&code=" + encodeURIComponent(inp6));
    	xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
    		if (xmlhttp.readyState == 4) { // Ответ пришёл
    			if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)


    				obj = JSON.parse(xmlhttp.responseText);
					console.log(obj);



    				var r1 = obj[0];
    				var r2 = obj[1];
    				var r3 = obj[2];
    				var r4 = obj[3];
    				var r5 = obj[4];
    				var r6 = obj[5];
    				var r7 = obj[6];
    				var r8 = obj[7];
    				var r9 = obj[8];
    				var r10 = obj[9];
    				var r11 = obj[10];
    				var r12 = obj[11];
    				var r13 = obj[12];
    				var r14 = obj[13];


    				if (r1 == 1) {
    					document.getElementById('p3').innerHTML = '*Enter Login';


    				}

    				if (r2 == 1) {
    					document.getElementById('p3').innerHTML = '*Incorrect Login';

    				}

    				if (r3 == 1) {
    					document.getElementById('p1').innerHTML = '*Enter E-mail';

    				}

    				if (r4 == 1) {
    					document.getElementById('p1').innerHTML = '*Incorrect E-mail';

    				}

    				if (r5 == 1) {
    					document.getElementById('p2').innerHTML = '*Repeat E-mail';

    				}

    				if (r6 == 1) {
    					document.getElementById('p2').innerHTML = '*Incorrect E-mail';

    				}

    				if (r7 == 1) {
    					document.getElementById('p4').innerHTML = '*Enter Password';
    					document.getElementById('p5').innerHTML = '*Repeat Password';

    				}

    				if (r8 == 1) {
    					document.getElementById('p4').innerHTML = '*Passwords do not match';
    					document.getElementById('p5').innerHTML = '*Passwords do not match';

    				}

    				if (r9 == 1) {
    					document.getElementById('p4').innerHTML = '*Incorrect Password';

    				}

    				if (r10 == 1) {
    					document.getElementById('p6').innerHTML = '*Enter symbols';

    				}

    				if (r11 == 1) {

    					document.getElementById('dis').style.display = 'none';
    					document.getElementById('regok').style.display = '';

    				}
    				if (r12 == 1) {
    					document.getElementById('p2').innerHTML = '*E-mail does not match';

    				}

    				if (r14 == 1) {
    					document.getElementById('p3').innerHTML = '*This login already registered';

    				}
    				if (r13 == 1) {
    					document.getElementById('p1').innerHTML = '*This e-mail already registered';

    				}


    			}
    		}
    	}
    }