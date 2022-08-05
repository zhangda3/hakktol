<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="bin to hex, bin to decimal, binary to ASCII, binary to raw file">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript binary decoder.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>二进制码解码器</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
<div id="header_l">
  
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

<script type="text/javascript" src="../online_tools/createFile.js"></script>

<script type="text/javascript">
<!--
    function clean_bin(input, remove_0b) {
        input = input.toUpperCase();
        
        if (remove_0b) {
          input = input.replace(/0B/gi, "");        
        }
        
        var orig_input = input;
        input = input.replace(/[^01]/g, "");
        if (orig_input != input)
            alert ("警告！忽略输入字符串中的非二进制字符。");
        return input;    
    }
    
    function clean_hex(input) {
        input = input.toUpperCase();
        input = input.replace(/0x/gi, "");        
        input = input.replace(/[^A-Fa-f0-9]/g, "");
        return input;    
    }    
    
    var hD='0123456789ABCDEF';
    function dec2hex(d) {
        var h = hD.substr(d&15,1);
        while (d>15) {
            d>>=4;
            h=hD.substr(d&15,1)+h;
        }
        //if (document.frmConvert.chbLowercaseOutput.checked) {
        //    h = h.toLowerCase();
        //}
        return h;
    }    
    
    function ShowDecodedAsText(val)
    {
        var target = document.getElementById('divDecodedText'); 
        target.innerHTML = val;    
    }       
    
    function Convert() {
      var cleaned_bin = clean_bin(document.frmConvert.ed_input.value, document.frmConvert.chbSeparator.checked);
      document.frmConvert.cleaned_bin.value = cleaned_bin;
      if (cleaned_bin.length % 8) {
        alert ("错误：二进制字符串长度不是8的倍数。");     
        return;
      }

      var separator = "";
      if (document.frmConvert.chbHexSeparator.checked)
        separator = ", 0x";
      var hexText = "";
      if (document.frmConvert.chbHexSeparator.checked)
        hexText = "0x";

      var binary = new Array();
      for (var i=0; i<cleaned_bin.length/8; i++) {
        var h = cleaned_bin.substr(i*8, 8);
        binary[i] = parseInt(h,2);
        hexText = hexText + ((i!=0)?separator:"") + (binary[i]<16?"0":"") + dec2hex(binary[i]);                
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
      document.frmConvert.hex.value = hexText;
              
      ShowDecodedAsText(htmlStr);   

    }
    
    function ConvertToFile() {
      Convert();
      createFileFromHex(clean_hex(document.frmConvert.hex.value), document.frmConvert.filename.value);
    }      

//-->
</script>


<div id="main">
<h1>二进制解码器（二进制到十六进制/十二进制/ASCII/原始文件）</h1>
      <form name="frmConvert" action="">
				<p>二进制字符串：
        <br>
        <input type="checkbox" name="chbSeparator" value="sep" checked="checked">从输入中删除“0b”       
        </p>
			    <p><textarea name="ed_input" rows="4" cols="67" style="width: 550px;"></textarea></p>        
        <p>注意：除 0 和 1 之外的所有字符都将被忽略，因此"100111"= "10 01 11" = "10， 01， 11"等。
        </p>
				<p>已清理的输入：</p>
			    <p><input type="text" name="cleaned_bin" readonly="readonly" value="" style="width: 550px;"></p>
        <p>解码数据为十六进制值：
        <br>
        <input type="checkbox" name="chbHexSeparator" value="sep" checked="checked">用"0x"分隔字节</p>        
        </p>
			  <p><input type="text" name="hex" value="" style="width: 550px;"></p>                			
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
        <h2>将（客户端）转换为原始二进制文件</h2>
				<p>要创建的文件的名称：</p>
			    <p>
				<input type="text" name="filename" value="liyou.dat" style="width: 550px;">
				</p>	        
			  <p>
			    <button type=button name="btnConvertToFile"
            onclick="ConvertToFile()">
           转换为文件
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

