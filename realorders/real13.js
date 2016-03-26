var on = 0;

function noticebuy() {
    
    var price = document.getElementById('b_price').value;
    var amount = document.getElementById('b_Skrill').value;
    
    if(price >0 && amount >0){
    
    $("#back").css("opacity", "0.6");
    $("#back").fadeIn(500);
    $('#noticebuy').fadeIn(500);
    on = 1;
    }    
}

function noticesell() {
    
    var price = document.getElementById('s_price').value;
    var amount = document.getElementById('s_Skrill').value;
    
    if(price >0 && amount >0){
    
    $("#back").css("opacity", "0.6");
    $("#back").fadeIn(500);
    $('#noticesell').fadeIn(500);
    on = 1;
    }
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
    var price = document.getElementById('b_price').value;
    var amount = document.getElementById('b_Skrill').value;
    var itogtotallbuy = amount*price;
    
    var all = document.getElementById('b_all').innerHTML;
    var fee = document.getElementById('b_fee').innerHTML;
    var fid = f;


    xmlhttp.open('POST', '/realorders/realbuy.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("amount=" + encodeURIComponent(amount) + "&price=" + encodeURIComponent(price) + "&all=" + encodeURIComponent(itogtotallbuy) + "&fee=" + encodeURIComponent(fee) + "&f=" + encodeURIComponent(fid) + "&totalplus=" + encodeURIComponent(all));
    $("#noticebuy").fadeOut('normal');
    $.LoadingOverlay("show");
    xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
        if (xmlhttp.readyState == 4) { // Ответ пришёл
            if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
                var obj = {};
                obj = JSON.parse(xmlhttp.responseText);
                if (obj == 1){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer1').fadeIn(500);
                on = 1;   
                }
                
                if (obj == 2){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer2').fadeIn(500);
                on = 1;   
                }
                
                if (obj == 3){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer3').fadeIn(500);
                on = 1;   
                }
                
                if (obj == 4){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer4').fadeIn(500);
                on = 1;   
                }
                
                if (obj == 5){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer5').fadeIn(500);
                on = 1;   
                }
               
            }
        }
    }
}


function off1() {
    if (on == 1) {
        /* убираем окно-блок DIV с именем класса css "popup" с помощью эффекта Затемнение fadeOut */
        $("#answer1").fadeOut('normal');
        $("#answer2").fadeOut('normal');
        $("#answer3").fadeOut('normal');
        $("#answer4").fadeOut('normal');
        $("#answer5").fadeOut('normal');
        $("#answer6").fadeOut('normal');
        /* возвращаем фону исходное состояние, дезактивируем затемненный фон back */
        $("#back").fadeOut('normal');
        /* не забываем про служебную переменную , возвращаем ей значение ноль */
        on = 0;
        window.location.href = "/exchange/payzapayeer.php";
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
    
    var amount = document.getElementById('s_Skrill').value;
    var price = document.getElementById('s_price').value;
    var itogtotallsell = amount*price;
    var all = document.getElementById('s_all').innerHTML;
    var fee = document.getElementById('s_fee').innerHTML;
    var fid = f;


    var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    xmlhttp.open('POST', '/realorders/realsell.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("amount=" + encodeURIComponent(amount) + "&price=" + encodeURIComponent(price) + "&all=" + encodeURIComponent(itogtotallsell) + "&fee=" + encodeURIComponent(fee) + "&f=" + encodeURIComponent(fid) + "&totalplus=" + encodeURIComponent(all));
    $("#noticesell").fadeOut('normal');
    $.LoadingOverlay("show");
    xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
        if (xmlhttp.readyState == 4) { // Ответ пришёл
            if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
                var obj = {};
                obj = JSON.parse(xmlhttp.responseText);
               
                if (obj == 1){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer1').fadeIn(500);
                on = 1;   
                }
                
                if (obj == 2){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer2').fadeIn(500);
                on = 1;   
                }
                
                if (obj == 3){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer3').fadeIn(500);
                on = 1;   
                }
                
                if (obj == 4){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer6').fadeIn(500);
                on = 1;   
                }
                
                if (obj == 5){
                  $.LoadingOverlay("hide");
                $("#back").css("opacity", "0.6");
                $("#back").fadeIn(500);
                //$('#nPopupCon').css("opacity", "1");
                $('#answer5').fadeIn(500);
                on = 1;   
                }
                
                
            }
        }
    }

}