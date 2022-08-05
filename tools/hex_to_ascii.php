<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="ASCII, hex, hex to ASCII converter, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript hexadecimal to ASCII converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>十六进制到ASCII转换器</title>  
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
    function clean_hex(input, remove_0x) {
        input = input.toUpperCase();
        
        if (remove_0x) {
          input = input.replace(/0x/gi, "");        
        }
        
        var orig_input = input;
        input = input.replace(/[^A-Fa-f0-9]/g, "");
        if (orig_input != input)
            alert ("警告！忽略输入字符串中的非十六进制字符。");
        return input;    
    }
    
    function ShowDecodedAsText(val)
    {
        var target = document.getElementById('divDecodedText'); 
        target.innerHTML = val;    
    }       
    
    function Convert() {
      var cleaned_hex = clean_hex(document.frmConvert.hex.value, document.frmConvert.chbSeparator.checked);
      document.frmConvert.cleaned_hex.value = cleaned_hex;
      if (cleaned_hex.length % 2) {
        alert ("错误：十六进制字符串长度为奇数。");     
        return;
      }

      var binary = new Array();
      for (var i=0; i<cleaned_hex.length/2; i++) {
        var h = cleaned_hex.substr(i*2, 2);
        binary[i] = parseInt(h,16);        
      }

      var output = binary;

      var htmlStr = "<p style=\"font-family: courier new, monospace\"><b>";
      for (i=0; i<output.length; i++) {
        if (output[i] >= 32 && output[i] <= 126) {
          switch(String.fromCharCode(output[i])) {
          case '&': htmlStr += "&amp;";
            break;
          case '<': htmlStr += "&lt;";
            break;
          case '>': htmlStr += "&gt;";
            break;
          case '"': htmlStr += "&quot;";
            break;
          case '\'': htmlStr += "&#039;";
            break;
          default: htmlStr += String.fromCharCode(output[i]);
          }
        }
        else {
          htmlStr += "<i>[" + output[i] + "]<" + "/i>";
        }
      }
      htmlStr += "<" + "/b><" + "/p>";  // stupid W3C validator...
      //document.frmConvert.hex.value = hexText;
              
      ShowDecodedAsText(htmlStr);   

    } 

//-->
</script>


<div id="main">
<h3>十六进制 -> ASCII 字符串解码器</h3>
      <form name="frmConvert" action="">
				<p>十六进制字符串：</p>
			    <p><input type="text" name="hex" value="" style="width: 550px;"></p>
        <p>注意：十六进制集之外的所有字符都将被忽略，因此"12AB34" = "12 AB 34" = "12， AB， 34"等。输入不区分大小写。</p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep" checked="checked">从输入中删除"0x"</p>
				<p>已清理的输入：</p>
			    <p><input type="text" name="cleaned_hex" readonly="readonly" value="" style="width: 550px;"></p>				
        <p>解码后的数据为 ASCII 文本，超出 32...126 范围的字节以斜体显示为 <i>[字节值]</i>:<br>        
        <div id="divDecodedText">
        <p><i>...解码文本...</i></p>
        </div>        
			  <p>
			    <button type=button name="btnConvert"
            onclick="Convert()">
           转换
          </button>
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

