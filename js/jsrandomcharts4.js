$('#four').on('click', function (e) {

	var diff = ["BTC/EUR", "BTC/RUR", "BTC/USD", "EUR/RUR", "EUR/USD", "LTC/BTC", "LTC/EUR", "LTC/RUR", "LTC/USD", "NMC/BTC", "NMC/USD", "NVC/BTC", "NVC/USD", "PPC/BTC", "PPC/USD", "USD/RUR"];

	var charts = ["#chart2", "#chart3", "#chart4", "#chart5", "#chart6", "#chart7", "#chart8", "#chart9", "#chart10", "#chart11", "#chart12", "#chart13", "#chart14", "#chart15", "#chart16", "#chart17"];

	var ch = ["#ch2", "#ch3", "#ch4", "#ch5", "#ch6", "#ch7", "#ch8", "#ch9", "#ch10", "#ch11", "#ch12", "#ch13", "#ch14", "#ch15", "#ch16", "#ch17"];

	var max = 15,
		min = 0;
	var rand1 = Math.floor(Math.random() * (max - min + 1) + min);
	var rand2 = Math.floor(Math.random() * (max - min + 1) + min);
	while (rand2 == rand1) {
		rand2 = Math.floor(Math.random() * (max - min + 1) + min);
	}
	var rand3 = Math.floor(Math.random() * (max - min + 1) + min);
	while (rand3 == rand2 || rand3 == rand1) {
		rand3 = Math.floor(Math.random() * (max - min + 1) + min);
	}
	var rand4 = Math.floor(Math.random() * (max - min + 1) + min);
	while (rand4 == rand3 || rand4 == rand2 || rand4 == rand1) {
		rand4 = Math.floor(Math.random() * (max - min + 1) + min);
	}

	var animTime = 500;
	var b1 = $(charts[rand1]);
	var b2 = $(charts[rand2]);
	var b3 = $(charts[rand3]);
	var b4 = $(charts[rand4]);


	$("#four").queue(function () { // добавим новую функцию в очередь

		$('#four').fadeOut(animTime);
		$('#bas').fadeOut(animTime);
		$('#n0').fadeOut(animTime);
		$('#n4').fadeOut(animTime);

		$(this).dequeue(); // ! продолжим очередь !
	});


	$("#four").queue(function (next) { //добавим новую функцию в очередь

		var idclickx = ($('#bas').children().attr("id"));
		var idclickx2 = "#" + idclickx;

		var idclick = ($('#one').children().attr("id"));
		var idclick2 = "#" + idclick;

		var idclick3 = ($('#two').children().attr("id"));
		var idclick4 = "#" + idclick3;

		var idclick5 = ($('#three').children().attr("id"));
		var idclick6 = "#" + idclick5;

		var idclick7 = ($('#four').children().attr("id"));
		var idclick8 = "#" + idclick7;

		var idx = charts.indexOf(idclick8);

		var idx2 = ch[idx];

		var b5 = $(idx2);


		//			alert(idclick2);
		//			alert(idx);

		//			alert( find(charts, idclick2) );
		//			alert(charts[1].length);
		//			alert(idclick2);

		//			alert(typeof charts[rand1]);

		$(idclick2).appendTo($("#bufer1"));
		$(idclick4).appendTo($("#bufer2"));
		$(idclick6).appendTo($("#bufer3"));
		$(idclick8).appendTo($("#bufer4"));
		$(idclickx2).appendTo($("#bufer5"));


		b5.css('opacity', 1);

		$(b5).appendTo($("#bas"));


		b1.css('opacity', 1);

		$(b1).appendTo($("#one"));

		b2.css('opacity', 1);

		$(b2).appendTo($("#two"));

		b3.css('opacity', 1);

		$(b3).appendTo($("#three"));

		b4.css('opacity', 1);

		$(b4).appendTo($("#four"));

		document.getElementById('n0').innerHTML = (diff[idx]);
		document.getElementById('n1').innerHTML = (diff[rand1]);
		document.getElementById('n2').innerHTML = (diff[rand2]);
		document.getElementById('n3').innerHTML = (diff[rand3]);
		document.getElementById('n4').innerHTML = (diff[rand4]);


		$('#four').fadeIn(animTime);
		$('#bas').fadeIn(animTime);
		$('#n0').fadeIn(animTime);
		$('#n4').fadeIn(animTime);

		next(); // ! продолжим очередь !
	});
})