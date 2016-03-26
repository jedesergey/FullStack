<?
include('../db.php');

$f = mysql_query("SELECT * FROM testdata WHERE pair='php/SkrillPayeer.php'", $link);
$row8 = mysql_fetch_array($f);
$feesell = $row8['feesell'];
$feebuy = $row8['feebuy'];

$viewtimes1 = date("Y"); // год
$viewtimes2 = date("m"); // месяц
$viewtimes3 = date("d"); // день
$viewtimes4 = date("H"); // час

$s = mysql_query("SELECT * FROM ordersSkrillPayeer WHERE YEAR(time) = '$viewtimes1' AND MONTH(time) = '$viewtimes2' AND DAY(time) = '$viewtimes3' AND HOUR(time) = '$viewtimes4' ORDER BY price DESC", $link);
$row22 = mysql_fetch_array($s);
$lastpricebuy = $row22['price'];

$s3 = mysql_query("SELECT * FROM ordersSkrillPayeer WHERE YEAR(time) = '$viewtimes1' AND MONTH(time) = '$viewtimes2' AND DAY(time) = '$viewtimes3' AND HOUR(time) = '$viewtimes4' ORDER BY price ASC", $link);
$row23 = mysql_fetch_array($s3);
$lastpricesell = $row23['price'];

$array = array("SkrillPerfectMoney", "SkrillPayza", "SkrillOKPay", "SkrillPayeer", "SkrillMonero", "CocaPaySkrill", "PerfectMoneyPayza", "PerfectMoneyOKPay", "PerfectMoneyPayeer", "PerfectMoneyMonero", "CocaPayPerfectMoney", "PayzaOKPay", "PayzaPayeer", "PayzaMonero", "CocaPayPayza", "OKPayPayeer", "CocaPayOKPay", "CocaPayPayeer", "CocaPayMonero");

$array2 = array("/index.php", "/exchange/skrillpayza.php", "/exchange/skrillokpay.php", "/exchange/skrillpayeer.php", "/exchange/skrillmonero.php", "/exchange/cocapayskrill.php", "/exchange/perfectmoneypayza.php", "/exchange/perfectmoneyokpay.php", "/exchange/perfectmoneypayeer.php", "/exchange/perfectmoneymonero.php", "/exchange/cocapayperfectmoney.php", "/exchange/payzaokpay.php", "/exchange/payzapayeer.php", "/exchange/payzamonero.php", "/exchange/cocapaypayza.php", "/exchange/okpaypayeer.php", "/exchange/cocapayokpay.php", "/exchange/cocapaypayeer.php", "/exchange/cocapaymonero.php");
$k=5;
$h=0;
$arr = array("","","","");
$arr2 = array("","","","");
for($i=1;$i<$k;$i++){

$sql = mysql_query("SELECT * FROM active WHERE id = '$i' ", $link);
$row = mysql_fetch_array($sql); 
$pair = $row['pair']; 
$name = $row['name']; 

if($pair == 'SkrillPayeer'){
$k++;

} 
else {

$arr[$h] = $pair;
$arr2[$h] = $name;         
$h++;    
}  
}

//$id = 19;
//for($t=0;$t<2;$t++){
//$sql = mysql_query("SELECT * FROM active WHERE id = '$id' ", $link);
//$row = mysql_fetch_array($sql); 
//$pair = $row['pair']; 
//$name = $row['name'];   
//    
//if($pair == 'SkrillPayeer'){
//$id--;;    
//} else{
//$arr[3] = $pair;    
//$arr2[3] = $name;
//$t++;    
//}
//}

$key1 = array_search("$arr[0]", $array); // $key = 1;
$key2 = array_search("$arr[1]", $array); // $key = 1;
$key3 = array_search("$arr[2]", $array); // $key = 1;
$key4 = array_search("$arr[3]", $array); // $key = 1;
$key5 = $array2[$key1];
$key6 = $array2[$key2];
$key7 = $array2[$key3];
$key8 = $array2[$key4];
?>
<script type="text/javascript">

function block(f){
if(f == 'one'){
window.location.href = "<?echo $key5;?>";   
}

if(f == 'two'){
window.location.href = "<?echo $key6;?>";     
}    

if(f == 'three'){
window.location.href = "<?echo $key7;?>";   

}  

if(f == 'four'){
window.location.href = "<?echo $key8;?>";   

}    

}

$(document).ready(function () {
$.jqplot.config.enablePlugins = true;

plot1 = $.jqplot('ch1', [<?echo $ch1;?>], {

animate: true,
// Will animate plot on calls to plot1.replot({resetAxes:true})
animateReplot: true,

axesDefaults: {
tickRenderer: $.jqplot.CanvasAxisTickRenderer,
tickOptions: {
angle: -45,
fontSize: '10pt'
}

},
axes: {
xaxis: {
renderer: $.jqplot.DateAxisRenderer,
tickOptions: {
formatString: '<?echo $format;?>'

},

tickInterval: "<?echo $interval;?>",
min: "<?echo $mintime;?>",
max: "<?echo $maxtime;?>",
drawMajorGridlines: false
},
yaxis: {
tickOptions: {
angle: 0

}
}
},
series: [{
renderer: $.jqplot.OHLCRenderer,
rendererOptions: {
candleStick: true
}
                                                                                                }],
cursor: {
zoom: true,

tooltipOffset: 10,
tooltipLocation: 'nw'
},
highlighter: {
showMarker: false,
tooltipAxes: 'xy',
yvalues: 4,
formatString: '<table class="jqplot-highlighter"> \
<tr><td>date:</td><td>%s</td></tr> \
<tr><td>open:</td><td>%s</td></tr> \
<tr><td>hi:</td><td>%s</td></tr> \
<tr><td>low:</td><td>%s</td></tr> \
<tr><td>close:</td><td>%s</td></tr></table>'
}
});
});

$(document).ready(function () {
$.jqplot.config.enablePlugins = true;

plot2 = $.jqplot('ch2', [<?echo $arr[0];?>], {

animate: true,
// Will animate plot on calls to plot1.replot({resetAxes:true})
animateReplot: true,

axesDefaults: {
tickRenderer: $.jqplot.CanvasAxisTickRenderer,
tickOptions: {
angle: -90,
fontSize: '10pt'
}

},
axes: {
xaxis: {
renderer: $.jqplot.DateAxisRenderer,
tickOptions: {
formatString: "%b %e"

},

tickInterval: "1 days",
max: "<?echo $maxday;?>",
drawMajorGridlines: false
},
yaxis: {
tickOptions: {
angle: 0

}
}
},
series: [{
renderer: $.jqplot.OHLCRenderer,
rendererOptions: {
candleStick: true
}
                                                                                                }],
cursor: {
zoom: true,

tooltipOffset: 10,
tooltipLocation: 'nw'
},
highlighter: {
showMarker: false,
tooltipAxes: 'xy',
yvalues: 4,
formatString: '<table class="jqplot-highlighter"> \
<tr><td>date:</td><td>%s</td></tr> \
<tr><td>open:</td><td>%s</td></tr> \
<tr><td>hi:</td><td>%s</td></tr> \
<tr><td>low:</td><td>%s</td></tr> \
<tr><td>close:</td><td>%s</td></tr></table>'
}
});
});

$(document).ready(function () {
$.jqplot.config.enablePlugins = true;

plot3 = $.jqplot('ch3', [<?echo $arr[1];?>], {

animate: true,
// Will animate plot on calls to plot1.replot({resetAxes:true})
animateReplot: true,

axesDefaults: {
tickRenderer: $.jqplot.CanvasAxisTickRenderer,
tickOptions: {
angle: -90,
fontSize: '10pt'
}

},
axes: {
xaxis: {
renderer: $.jqplot.DateAxisRenderer,
tickOptions: {
formatString: "%b %e"

},

tickInterval: "1 days",
max: "<?echo $maxday;?>",
drawMajorGridlines: false
},
yaxis: {
tickOptions: {
angle: 0

}
}
},
series: [{
renderer: $.jqplot.OHLCRenderer,
rendererOptions: {
candleStick: true
}
                                                                                                }],
cursor: {
zoom: true,

tooltipOffset: 10,
tooltipLocation: 'nw'
},
highlighter: {
showMarker: false,
tooltipAxes: 'xy',
yvalues: 4,
formatString: '<table class="jqplot-highlighter"> \
<tr><td>date:</td><td>%s</td></tr> \
<tr><td>open:</td><td>%s</td></tr> \
<tr><td>hi:</td><td>%s</td></tr> \
<tr><td>low:</td><td>%s</td></tr> \
<tr><td>close:</td><td>%s</td></tr></table>'
}
});
});

$(document).ready(function () {
$.jqplot.config.enablePlugins = true;

plot4 = $.jqplot('ch4', [<?echo $arr[2];?>], {

animate: true,
// Will animate plot on calls to plot1.replot({resetAxes:true})
animateReplot: true,

axesDefaults: {
tickRenderer: $.jqplot.CanvasAxisTickRenderer,
tickOptions: {
angle: -90,
fontSize: '10pt'
}

},
axes: {
xaxis: {
renderer: $.jqplot.DateAxisRenderer,
tickOptions: {
formatString: "%b %e"

},

tickInterval: "1 days",
max: "<?echo $maxday;?>",
drawMajorGridlines: false
},
yaxis: {
tickOptions: {
angle: 0

}
}
},
series: [{
renderer: $.jqplot.OHLCRenderer,
rendererOptions: {
candleStick: true
}
                                                                                                }],
cursor: {
zoom: true,

tooltipOffset: 10,
tooltipLocation: 'nw'
},
highlighter: {
showMarker: false,
tooltipAxes: 'xy',
yvalues: 4,
formatString: '<table class="jqplot-highlighter"> \
<tr><td>date:</td><td>%s</td></tr> \
<tr><td>open:</td><td>%s</td></tr> \
<tr><td>hi:</td><td>%s</td></tr> \
<tr><td>low:</td><td>%s</td></tr> \
<tr><td>close:</td><td>%s</td></tr></table>'
}
});
});

$(document).ready(function () {
$.jqplot.config.enablePlugins = true;

plot5 = $.jqplot('ch5', [<?echo $arr[3];?>], {

animate: true,
// Will animate plot on calls to plot1.replot({resetAxes:true})
animateReplot: true,

axesDefaults: {
tickRenderer: $.jqplot.CanvasAxisTickRenderer,
tickOptions: {
angle: -90,
fontSize: '10pt'
}

},
axes: {
xaxis: {
renderer: $.jqplot.DateAxisRenderer,
tickOptions: {
formatString: "%b %e"

},

tickInterval: "1 days",
max: "<?echo $maxday;?>",
drawMajorGridlines: false
},
yaxis: {
tickOptions: {
angle: 0

}
}
},
series: [{
renderer: $.jqplot.OHLCRenderer,
rendererOptions: {
candleStick: true
}
                                                                                                }],
cursor: {
zoom: true,

tooltipOffset: 10,
tooltipLocation: 'nw'
},
highlighter: {
showMarker: false,
tooltipAxes: 'xy',
yvalues: 4,
formatString: '<table class="jqplot-highlighter"> \
<tr><td>date:</td><td>%s</td></tr> \
<tr><td>open:</td><td>%s</td></tr> \
<tr><td>hi:</td><td>%s</td></tr> \
<tr><td>low:</td><td>%s</td></tr> \
<tr><td>close:</td><td>%s</td></tr></table>'
}
});
});
</script>