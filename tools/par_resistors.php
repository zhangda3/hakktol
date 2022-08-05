<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="resistors, resistor set searching, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Searching for pair or resistors giving specified equivalent resistance when connected in parallel.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>等效电阻集搜索</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
<div id="header_l">
   
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

<script type="text/javascript">
<!--

var E24_set = [1.0, 1.1, 1.2, 1.3, 1.5, 1.6, 1.8, 2.0, 2.2, 2.4, 2.7, 3.0, 3.3, 3.6, 3.9, 4.3, 4.7, 5.1, 5.6, 6.2, 6.8, 7.5, 8.2, 9.1]; 

function getNextResistor(resistance) {
  var order = 0;
  var mantissa = resistance * 1.000001;
  if (resistance >= 1) {
    while (mantissa >= 10) {
      mantissa /= 10;
      order++;
    } 
  } else {
    while (mantissa < 1) {
      mantissa *= 10;
      order--;
    }
  }
  var higherMantissa = E24_set[0];
  var higherMantissaFound = false; 
  for(i=0; i<E24_set.length; i++) {
    higherMantissa = E24_set[i];
    if (higherMantissa > mantissa) {
      higherMantissaFound = true;
      break;
    }    
  }
  if (higherMantissaFound == false) {
    // roll-over to 1.0
    order++;
    higherMantissa = E24_set[0];
  }
  return (higherMantissa * Math.pow(10, order));  
}

function Execute() {
  // get requested resistance in Ohms
  var resistance = parseFloat(document.frmConvert.equivalentResistance.value);
  if (isNaN(resistance)) {
    alert("无效的电阻值！");
    return;
  }
  if (resistance <= 0) {
    alert("不接受负电阻值或零电阻值");
    return;
  }
  
  var resArray = [];
  var R2, rEquivalent;

  var rangeMin = parseFloat(document.getElementById('selectRangeMin').value);
  var rangeMax = parseFloat(document.getElementById('selectRangeMax').value);

  // range of interest for R1: from first resistance larger than requested to 2x requested
  var R1 = getNextResistor(resistance);
  while (R1 <= 2*resistance) {
    R2 = R1;
    while (R2 < 30*resistance) {
      rEquivalent = (R1*R2)/(R1+R2);
      if (rEquivalent >= rangeMin * resistance && rEquivalent <= rangeMax * resistance) {
        resArray.push({"R1": R1, "R2": R2, "rEquivalent": rEquivalent});
      }
      // next R2
      R2 = getNextResistor(R2);
    }
    // next R1
    R1 = getNextResistor(R1);
  }

  var htmlVal = "<strong>Suggested resistor sets:</strong><br>";
  htmlVal += "<table style=\"border: thick solid; border-collapse: collapse;\">"
  htmlVal += "<tr><th style=\"border: thick solid\">R1</th><th style=\"border: thick solid\">R2</th><th style=\"border: thick solid\">Equivalent resistance</th><th style=\"border: thick solid\">Error</th></tr>";
  resArray.forEach(function(res) {
    htmlVal += "<tr><td style=\"border: thin solid\">" + parseFloat(res.R1.toPrecision(6)) + "</td><td style=\"border: thin solid\">" + parseFloat(res.R2.toPrecision(6)) + "</td><td style=\"border: thin solid\">" + res.rEquivalent.toPrecision(6) + "</td><td style=\"border: thin solid\">" + (100*(res.rEquivalent - resistance)/resistance).toFixed(2) + "%</td></th>"
  });
  htmlVal += "</table>";

  var target = document.getElementById('divOutput'); 
  target.innerHTML = htmlVal; 
}

//-->
</script>


<div id="main">

<h1>等效电阻集搜索</h1>
<p>
此脚本正在搜索并联连接时等效电阻接近指定的电阻集（2 个电阻器）， 可用于将电阻器替换为您没有的值。它从 E24 （5% 容差） 设置中搜索电阻器。直接匹配将被忽略 - 此脚本的用途是仅搜索替换。
</p>
<form name="frmConvert" action="">
	<p>
    所需等效电阻 [欧姆]：
    <input type="text" name="equivalentResistance" value="2300" style="width: 150px;">    
  </p>			    
  <p>
    搜索范围：从
    <select id="selectRangeMin">
      <option value="0.9">0.9</option>
      <option value="0.95">0.95</option>
      <option value="0.97">0.97</option>
      <option value="0.98" selected>0.98</option>
      <option value="0.99">0.99</option>
      <option value="1.00">1.00</option>
    </select>
   自
    <select id="selectRangeMax">
      <option value="1.00">1.00</option>
      <option value="1.01">1.01</option>
      <option value="1.02" selected>1.02</option>
      <option value="1.03">1.03</option>
      <option value="1.05">1.05</option>
      <option value="1.1">1.1</option>
    </select>
   请求的值。
  </p>			    
  <p>
    <button type=button name="btnFind"  onclick="Execute()">查找电阻器</button>
	</p>
  <p>
    <div id="divOutput">
    </div>    
  </p>
</form>

<div>
<h3>by：李由     白泽Sec网络安全团队</h3>
  </div>
</div>



<script type="text/javascript">

</script>

<br>  
<br>  
<br>  


</body>
</html>

