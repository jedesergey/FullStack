function CheckFields() {

    var arrstep = ["php/SkrillPerfectMoney.php", "php/SkrillPayza.php", "php/SkrillOKPay.php", "php/SkrillPayeer.php", "php/SkrillMonero.php", "php/CocaPaySkrill.php", "php/PerfectMoneyPayza.php", "php/PerfectMoneyOKPay.php", "php/PerfectMoneyPayeer.php", "php/PerfectMoneyMonero.php", "php/CocaPayPerfectMoney.php", "php/PayzaOKPay.php", "php/PayzaPayeer.php", "php/PayzaMonero.php", "php/CocaPayPayza.php", "php/OKPayPayeer.php", "php/CocaPayOKPay.php", "php/CocaPayPayeer.php", "php/CocaPayMonero.php"];

    var arrdata = new Array();
    var arrmin = new Array();
    var arrmax = new Array();
    var arrordermin = new Array();
    var arrordermax = new Array();
    var arrfeesell = new Array();
    var arrfeebuy = new Array();

    arrdata[0] = document.getElementById('col').value;
    arrdata[1] = document.getElementById('bars').value;
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
    xmlhttp.open('POST', "php/createtestdata.php", false); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("json_name1=" + encodeURIComponent('ok'));

    for (var q = 0; q < 19; q++) {

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
        xmlhttp.open('POST', "php/writedata.php", false); // Открываем асинхронное соединение
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
        xmlhttp.send("json_name1=" + encodeURIComponent(arrmin[q]) + "&json_name2=" + encodeURIComponent(arrmax[q]) + "&json_name3=" + encodeURIComponent(arrordermin[q]) + "&json_name4=" + encodeURIComponent(arrordermax[q]) + "&json_name5=" + encodeURIComponent(arrfeesell[q]) + "&json_name6=" + encodeURIComponent(arrfeebuy[q]) + "&json_name7=" + encodeURIComponent(arrstep[q]) + "&json_name8=" + encodeURIComponent(arrdata[0]) + "&json_name9=" + encodeURIComponent(arrdata[1]));


    }

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
    xmlhttp.open('POST', "../php/testorders.php", false); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("json_name1=" + encodeURIComponent('ok'));
  
}

function writedata() {

    document.getElementById('col').value = '100';
    document.getElementById('bars').value = '570';
    document.getElementById('p1min').value = '1';
    document.getElementById('p2min').value = '0.9';
    document.getElementById('p3min').value = '1';
    document.getElementById('p4min').value = '0.9';
    document.getElementById('p5min').value = '0.8';
    document.getElementById('p6min').value = '0.7';
    document.getElementById('p7min').value = '0.9';
    document.getElementById('p8min').value = '0.9';
    document.getElementById('p9min').value = '0.9';
    document.getElementById('p10min').value = '0.3';
    document.getElementById('p11min').value = '0.6';
    document.getElementById('p12min').value = '0.95';
    document.getElementById('p13min').value = '0.9';
    document.getElementById('p14min').value = '1.4';
    document.getElementById('p15min').value = '0.7';
    document.getElementById('p16min').value = '0.9';
    document.getElementById('p17min').value = '0.9';
    document.getElementById('p18min').value = '0.9';
    document.getElementById('p19min').value = '1';

    document.getElementById('p1max').value = '1.2';
    document.getElementById('p2max').value = '1.1';
    document.getElementById('p3max').value = '1.2';
    document.getElementById('p4max').value = '1.1';
    document.getElementById('p5max').value = '1';
    document.getElementById('p6max').value = '0.9';
    document.getElementById('p7max').value = '1.1';
    document.getElementById('p8max').value = '1.1';
    document.getElementById('p9max').value = '1.1';
    document.getElementById('p10max').value = '0.6';
    document.getElementById('p11max').value = '0.8';
    document.getElementById('p12max').value = '1.15';
    document.getElementById('p13max').value = '1.1';
    document.getElementById('p14max').value = '1.7';
    document.getElementById('p15max').value = '0.9';
    document.getElementById('p16max').value = '1.1';
    document.getElementById('p17max').value = '1.1';
    document.getElementById('p18max').value = '1.1';
    document.getElementById('p19max').value = '1.2';

    document.getElementById('p1colmin').value = '1';
    document.getElementById('p2colmin').value = '1';
    document.getElementById('p3colmin').value = '1';
    document.getElementById('p4colmin').value = '1';
    document.getElementById('p5colmin').value = '1';
    document.getElementById('p6colmin').value = '1';
    document.getElementById('p7colmin').value = '1';
    document.getElementById('p8colmin').value = '1';
    document.getElementById('p9colmin').value = '1';
    document.getElementById('p10colmin').value = '1';
    document.getElementById('p11colmin').value = '1';
    document.getElementById('p12colmin').value = '1';
    document.getElementById('p13colmin').value = '1';
    document.getElementById('p14colmin').value = '1';
    document.getElementById('p15colmin').value = '1';
    document.getElementById('p16colmin').value = '1';
    document.getElementById('p17colmin').value = '1';
    document.getElementById('p18colmin').value = '1';
    document.getElementById('p19colmin').value = '1';

    document.getElementById('p1colmax').value = '10';
    document.getElementById('p2colmax').value = '10';
    document.getElementById('p3colmax').value = '10';
    document.getElementById('p4colmax').value = '10';
    document.getElementById('p5colmax').value = '10';
    document.getElementById('p6colmax').value = '10';
    document.getElementById('p7colmax').value = '10';
    document.getElementById('p8colmax').value = '10';
    document.getElementById('p9colmax').value = '10';
    document.getElementById('p10colmax').value = '10';
    document.getElementById('p11colmax').value = '10';
    document.getElementById('p12colmax').value = '10';
    document.getElementById('p13colmax').value = '10';
    document.getElementById('p14colmax').value = '10';
    document.getElementById('p15colmax').value = '10';
    document.getElementById('p16colmax').value = '10';
    document.getElementById('p17colmax').value = '10';
    document.getElementById('p18colmax').value = '10';
    document.getElementById('p19colmax').value = '10';

    document.getElementById('p1sell').value = '0.5';
    document.getElementById('p2sell').value = '0.5';
    document.getElementById('p3sell').value = '0.5';
    document.getElementById('p4sell').value = '0.5';
    document.getElementById('p5sell').value = '0.5';
    document.getElementById('p6sell').value = '0.5';
    document.getElementById('p7sell').value = '0.5';
    document.getElementById('p8sell').value = '0.5';
    document.getElementById('p9sell').value = '0.5';
    document.getElementById('p10sell').value = '0.5';
    document.getElementById('p11sell').value = '0.5';
    document.getElementById('p12sell').value = '0.5';
    document.getElementById('p13sell').value = '0.5';
    document.getElementById('p14sell').value = '0.5';
    document.getElementById('p15sell').value = '0.5';
    document.getElementById('p16sell').value = '0.5';
    document.getElementById('p17sell').value = '0.5';
    document.getElementById('p18sell').value = '0.5';
    document.getElementById('p19sell').value = '0.5';

    document.getElementById('p1buy').value = '0.5';
    document.getElementById('p2buy').value = '0.5';
    document.getElementById('p3buy').value = '0.5';
    document.getElementById('p4buy').value = '0.5';
    document.getElementById('p5buy').value = '0.5';
    document.getElementById('p6buy').value = '0.5';
    document.getElementById('p7buy').value = '0.5';
    document.getElementById('p8buy').value = '0.5';
    document.getElementById('p9buy').value = '0.5';
    document.getElementById('p10buy').value = '0.5';
    document.getElementById('p11buy').value = '0.5';
    document.getElementById('p12buy').value = '0.5';
    document.getElementById('p13buy').value = '0.5';
    document.getElementById('p14buy').value = '0.5';
    document.getElementById('p15buy').value = '0.5';
    document.getElementById('p16buy').value = '0.5';
    document.getElementById('p17buy').value = '0.5';
    document.getElementById('p18buy').value = '0.5';
    document.getElementById('p19buy').value = '0.5';
}