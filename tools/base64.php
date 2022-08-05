<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Base64, base 64, on-line decoder, base 64 decoder, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript base 64 to hexadecimal string decoder.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>李由 - Base64 转换器</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
  
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

<script type="text/javascript" src="../online_tools/createFile.js"></script>

<script type="text/javascript">
<!--
    var hD='0123456789ABCDEF';
    function dec2hex(d) {
        var h = hD.substr(d&15,1);
        while (d>15) {
            d>>=4;
            h=hD.substr(d&15,1)+h;
        }
        if (document.frmConvert.chbLowercaseOutput.checked) {
            h = h.toLowerCase();
        }
        return h;
    }

    var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="
    function base64_decode(input) {
        var output = new Array();
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        var orig_input = input;
        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
        if (orig_input != input)
            alert ("警告！忽略输入字符串中Base64范围之外的字符。");
        if (input.length % 4) {
            alert ("错误：输入长度不是4字节的倍数。");
            return "";
        }
        
        var j=0;
        while (i < input.length) {

            enc1 = keyStr.indexOf(input.charAt(i++));
            enc2 = keyStr.indexOf(input.charAt(i++));
            enc3 = keyStr.indexOf(input.charAt(i++));
            enc4 = keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;
            
            output[j++] = chr1;
            if (enc3 != 64)
              output[j++] = chr2;
            if (enc4 != 64)
              output[j++] = chr3;
              
        }
        return output;
    }
    
   
    function ShowDecodedAsText(val)
    {
        var target = document.getElementById('divDecodedText'); 
        target.innerHTML = val;    
    }     
    
    function Convert() {
        var output = base64_decode(document.frmConvert.encoded.value);
        var separator = "";
        if (document.frmConvert.chbSeparator.checked)
            separator = " 0x";
        var hexText = "";
        var htmlStr = "<p style=\"font-family: courier new, monospace\"><b>";
        for (i=0; i<output.length; i++) {
          hexText = hexText + separator + (output[i]<16?"0":"") + dec2hex(output[i]);
          if (output[i] >= 32 && output[i] <= 126)
          {
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
      createFileFromHex(document.frmConvert.hex.value, document.frmConvert.filename.value);
    } 

//-->
</script>


<div id="main">
<h1>Base64 -> 十六进制字符串解码器</h1>
      <form name="frmConvert" action="">
				<p>Base64 字符串：</p>
			    <p><input type="text" name="encoded" value="" style="width: 550px;"></p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep">输出0x和空格分隔符
          <br>
          <input type="checkbox" name="chbLowercaseOutput" value="lowercaseHex">使用小写十六进制字符</p>          
				<p>解码数据（十六进制）</p>
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



<script type="text/javascript">

</script>

<br>  
<br>  
<br>  

</body>
</html>

