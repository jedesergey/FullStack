function savedata() {
		
		var arrmin = new Array();
		var arrmax = new Array();
		var arrordermin = new Array();
		var arrordermax = new Array();
		var arrfeesell = new Array();
		var arrfeebuy = new Array();
		
		arrmin[0] = document.getElementById('p1min').value;
		arrmin[1] = document.getElementById('p2min').value;
		arrmin[2] = document.getElementById('p3min').value;
		arrmin[3] = document.getElementById('p4min').value;
		arrmin[4] = document.getElementById('p5min').value;
		arrmin[5] = document.getElementById('p6min').value;
		arrmin[6] = document.getElementById('p7min').value;
		arrmin[7] = document.getElementById('p8min').value;
		arrmin[8] = document.getElementById('p9min').value;
		arrmin[9] = document.getElementById('p10min').value;
		arrmin[10] = document.getElementById('p11min').value;
		arrmin[11] = document.getElementById('p12min').value;
		arrmin[12] = document.getElementById('p13min').value;
		arrmin[13] = document.getElementById('p14min').value;
		arrmin[14] = document.getElementById('p15min').value;
		arrmin[15] = document.getElementById('p16min').value;
		arrmin[16] = document.getElementById('p17min').value;
		arrmin[17] = document.getElementById('p18min').value;
		arrmin[18] = document.getElementById('p19min').value;

		arrmax[0] = document.getElementById('p1max').value;
		arrmax[1] = document.getElementById('p2max').value;
		arrmax[2] = document.getElementById('p3max').value;
		arrmax[3] = document.getElementById('p4max').value;
		arrmax[4] = document.getElementById('p5max').value;
		arrmax[5] = document.getElementById('p6max').value;
		arrmax[6] = document.getElementById('p7max').value;
		arrmax[7] = document.getElementById('p8max').value;
		arrmax[8] = document.getElementById('p9max').value;
		arrmax[9] = document.getElementById('p10max').value;
		arrmax[10] = document.getElementById('p11max').value;
		arrmax[11] = document.getElementById('p12max').value;
		arrmax[12] = document.getElementById('p13max').value;
		arrmax[13] = document.getElementById('p14max').value;
		arrmax[14] = document.getElementById('p15max').value;
		arrmax[15] = document.getElementById('p16max').value;
		arrmax[16] = document.getElementById('p17max').value;
		arrmax[17] = document.getElementById('p18max').value;
		arrmax[18] = document.getElementById('p19max').value;

		arrordermin[0] = document.getElementById('p1colmin').value;
		arrordermin[1] = document.getElementById('p2colmin').value;
		arrordermin[2] = document.getElementById('p3colmin').value;
		arrordermin[3] = document.getElementById('p4colmin').value;
		arrordermin[4] = document.getElementById('p5colmin').value;
		arrordermin[5] = document.getElementById('p6colmin').value;
		arrordermin[6] = document.getElementById('p7colmin').value;
		arrordermin[7] = document.getElementById('p8colmin').value;
		arrordermin[8] = document.getElementById('p9colmin').value;
		arrordermin[9] = document.getElementById('p10colmin').value;
		arrordermin[10] = document.getElementById('p11colmin').value;
		arrordermin[11] = document.getElementById('p12colmin').value;
		arrordermin[12] = document.getElementById('p13colmin').value;
		arrordermin[13] = document.getElementById('p14colmin').value;
		arrordermin[14] = document.getElementById('p15colmin').value;
		arrordermin[15] = document.getElementById('p16colmin').value;
		arrordermin[16] = document.getElementById('p17colmin').value;
		arrordermin[17] = document.getElementById('p18colmin').value;
		arrordermin[18] = document.getElementById('p19colmin').value;

		arrordermax[0] = document.getElementById('p1colmax').value;
		arrordermax[1] = document.getElementById('p2colmax').value;
		arrordermax[2] = document.getElementById('p3colmax').value;
		arrordermax[3] = document.getElementById('p4colmax').value;
		arrordermax[4] = document.getElementById('p5colmax').value;
		arrordermax[5] = document.getElementById('p6colmax').value;
		arrordermax[6] = document.getElementById('p7colmax').value;
		arrordermax[7] = document.getElementById('p8colmax').value;
		arrordermax[8] = document.getElementById('p9colmax').value;
		arrordermax[9] = document.getElementById('p10colmax').value;
		arrordermax[10] = document.getElementById('p11colmax').value;
		arrordermax[11] = document.getElementById('p12colmax').value;
		arrordermax[12] = document.getElementById('p13colmax').value;
		arrordermax[13] = document.getElementById('p14colmax').value;
		arrordermax[14] = document.getElementById('p15colmax').value;
		arrordermax[15] = document.getElementById('p16colmax').value;
		arrordermax[16] = document.getElementById('p17colmax').value;
		arrordermax[17] = document.getElementById('p18colmax').value;
		arrordermax[18] = document.getElementById('p19colmax').value;

		arrfeesell[0] = document.getElementById('p1sell').value;
		arrfeesell[1] = document.getElementById('p2sell').value;
		arrfeesell[2] = document.getElementById('p3sell').value;
		arrfeesell[3] = document.getElementById('p4sell').value;
		arrfeesell[4] = document.getElementById('p5sell').value;
		arrfeesell[5] = document.getElementById('p6sell').value;
		arrfeesell[6] = document.getElementById('p7sell').value;
		arrfeesell[7] = document.getElementById('p8sell').value;
		arrfeesell[8] = document.getElementById('p9sell').value;
		arrfeesell[9] = document.getElementById('p10sell').value;
		arrfeesell[10] = document.getElementById('p11sell').value;
		arrfeesell[11] = document.getElementById('p12sell').value;
		arrfeesell[12] = document.getElementById('p13sell').value;
		arrfeesell[13] = document.getElementById('p14sell').value;
		arrfeesell[14] = document.getElementById('p15sell').value;
		arrfeesell[15] = document.getElementById('p16sell').value;
		arrfeesell[16] = document.getElementById('p17sell').value;
		arrfeesell[17] = document.getElementById('p18sell').value;
		arrfeesell[18] = document.getElementById('p19sell').value;

		arrfeebuy[0] = document.getElementById('p1buy').value;
		arrfeebuy[1] = document.getElementById('p2buy').value;
		arrfeebuy[2] = document.getElementById('p3buy').value;
		arrfeebuy[3] = document.getElementById('p4buy').value;
		arrfeebuy[4] = document.getElementById('p5buy').value;
		arrfeebuy[5] = document.getElementById('p6buy').value;
		arrfeebuy[6] = document.getElementById('p7buy').value;
		arrfeebuy[7] = document.getElementById('p8buy').value;
		arrfeebuy[8] = document.getElementById('p9buy').value;
		arrfeebuy[9] = document.getElementById('p10buy').value;
		arrfeebuy[10] = document.getElementById('p11buy').value;
		arrfeebuy[11] = document.getElementById('p12buy').value;
		arrfeebuy[12] = document.getElementById('p13buy').value;
		arrfeebuy[13] = document.getElementById('p14buy').value;
		arrfeebuy[14] = document.getElementById('p15buy').value;
		arrfeebuy[15] = document.getElementById('p16buy').value;
		arrfeebuy[16] = document.getElementById('p17buy').value;
		arrfeebuy[17] = document.getElementById('p18buy').value;
		arrfeebuy[18] = document.getElementById('p19buy').value;

	for (var q = 0; q < 19; q++) {
		
//		var savedata = new Array();
//		savedata[q] = "json_name1=" +  encodeURIComponent(arrmin[q]) + "&json_name2=" + encodeURIComponent(arrmax[q]) + "&json_name3=" + encodeURIComponent(arrordermin[q]) + "&json_name4=" + encodeURIComponent(arrordermax[q]) + "&json_name5=" + encodeURIComponent(arrfeesell[q]) + "&json_name6=" + encodeURIComponent(arrfeebuy[q]);
		
		
		
		
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


		var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
		xmlhttp.open('POST', "php/writedata.php", true); // Открываем асинхронное соединение
		xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
		xmlhttp.send("json_name1=" +  encodeURIComponent(arrmin[q]) + "&json_name2=" + encodeURIComponent(arrmax[q]) + "&json_name3=" + encodeURIComponent(arrordermin[q]) + "&json_name4=" + encodeURIComponent(arrordermax[q]) + "&json_name5=" + encodeURIComponent(arrfeesell[q]) + "&json_name6=" + encodeURIComponent(arrfeebuy[q]));
		//console.log(savedata[q]);
		xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
			if (xmlhttp.readyState == 4) { // Ответ пришёл
				if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
					var obj = {};
										obj = JSON.parse(xmlhttp.responseText);
										console.log(obj);


				}
			}
		}
	}
	
	
	
	
	
	
}