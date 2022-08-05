<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="ASCII, dec, dec to ASCII converter, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript decimal to ASCII converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>Dec到ASCII转换器</title>  
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
    function clean_dec(input) {
        //input = input.toUpperCase();
        
        if (remove_0x) {
          input = input.replace(/0x/gi, "");        
        }
        
        return input;        
    }
    
    function ShowDecodedAsText(val)
    {
        var target = document.getElementById('divDecodedText'); 
        target.innerHTML = val;    
    }       
    
    function Convert() {
      var input = document.frmConvert.dec.value;
      var binary = new Array();
      var binary_cnt = 0;
      var num = "";
      var num_found = 0;
      var negative = 0;
      for (var i=0; i<input.length; i++) {
        var c = input.charAt(i);
        var eon = 0;
        if (c == '-') {
          if (num_found == 0) {
            negative = 1;
          } else {
            eon = 1;
          }
        } else if (c < '0' || c > '9') {
          if (num_found) {
            eon = 1;
          }
        } else {
          num_found = 1;
          if (num == "" && negative) {
            num = "-";
          }
          num = num + c;
        }
        if (eon) {
          binary[binary_cnt++] = num;
          num = "";
          num_found = 0;
          negative = 0;                        
        }
      }
      if (num_found) {
        binary[binary_cnt++] = num;                
      }

      var cleaned_dec = "";
      for (var i=0; i<binary.length; i++) {
        if (i > 0) {
          cleaned_dec += ", ";
        }
        cleaned_dec += binary[i].toString();
      }
      document.frmConvert.cleaned_dec.value = cleaned_dec;

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
<h3>十进制 -> ASCII 字符串解码器</h3>
      <p>将一系列十进制数转换为等效的 ASCII 字符串。用于从日志文件中的十进制编码数据中提取文本。
      </p>
      <form name="frmConvert" action="">
				<p>十进制数系列：</p>
			    <p><input type="text" name="dec" value="" style="width: 550px;"></p>
        <p>注意：十进制数可以用任何非数字字符分隔。</p>
				<p>规范化、逗号分隔的输入：</p>
			    <p><input type="text" name="cleaned_dec" readonly="readonly" value="" style="width: 550px;"></p>
        <br>				
        <p>解码后的数据为 ASCII 文本，超出 32...126 范围的值以斜体显示为<i>[字节值]</i>:<br>        
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

