<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="ASCII, ASCII to hex, online converter, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript ASCII to hexadecimal C-like array converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>ASCII到类C数组转换器</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
<div id="header_l">
  
</div>
   
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

<script type="text/javascript">
<!--
    var hD='0123456789ABCDEF';
    function dec2hex(d) {
        var h = hD.substr(d&15,1);
        while (d>15) {
            d>>=4;
            h=hD.substr(d&15,1)+h;
        }
        return h;
    }    
    
    function Convert() {
        var input = document.frmConvert.ed_input.value;
        var separator1 = "", separator2 = "";
        if (document.frmConvert.chbSeparator.checked)
        {
          separator1 = "0x";
          separator2 = ", "
        }
        var hexText = "";
        for (i=0; i<input.length; i++) {
          var charVal = input.charCodeAt(i);
          hexText = hexText + separator1 + (charVal<16?"0":"") + dec2hex(charVal) + separator2;       
        }
        document.frmConvert.hex.value = hexText;
    } 

//-->
</script>


<div id="main">
<h1>ASCII -> ASCII -> 十六进制类C数组</h1>
      <form name="frmConvert" action="">
				<p>输入文本内容:</p>
			    <p>
            <textarea name="ed_input" rows="10" cols="67" style="width: 550px;"></textarea>
          </p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep" checked="yes">输出0x和逗号分隔符</p>
				<p>输出十六进制数组</p>
			    <p><input type="text" name="hex" value="" style="width: 550px;"></p>			    
			  <p>
			    <button type=button name="btnConvert"
            onclick="Convert()">
            转换
          </button>
			  </p>
			</form>
 
<h3>by：李由     白泽Sec网络安全团队</h3>  

<div id="sidebar">

<script type="text/javascript">

</script>

<br>  
<br>  
<br>  


</body>
</html>

