//alert('ok');
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


var v1 = 5;
var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
xmlhttp.open('POST', 'js/preloadphp.php', true); // Открываем асинхронное соединение
xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
xmlhttp.send("pass=" + encodeURIComponent(v1));
xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
    if (xmlhttp.readyState == 4) { // Ответ пришёл
        if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)

            ans = JSON.parse(xmlhttp.responseText);
            alert(ans);



        }
    }
}