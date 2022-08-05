<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Base32hex, on-line decoder, base32hex to hex decoder, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript base32hex to hexadecimal string decoder.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>Base32hex 转换器</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
      
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
        if (document.frmConvert.chbLowercaseOutput.checked) {
            h = h.toLowerCase();
        }        
        return h;
    }
                  
    var keyStr = "0123456789ABCDEFGHIJKLMNOPQRSTUV="
    function base32_decode(input) {
        var buffer = 0;
        var bitsLeft = 0;    
        var output = new Array();
        var i = 0;
        var count = 0;
        
        while (i < input.length) {
            var val = keyStr.indexOf(input.charAt(i++));
            if (val >= 0 && val < 32) {
              buffer <<= 5;
              buffer |= val;
              bitsLeft += 5;
              if (bitsLeft >= 8) {
                output[count++] = (buffer >> (bitsLeft - 8)) & 0xFF;
                bitsLeft -= 8;
              }            
            }                         
        }        
        return {output : output, bitsLeft : bitsLeft};
    }
    
   
    function ShowDecodedAsText(val)
    {
        var target = document.getElementById('divDecodedText'); 
        target.innerHTML = val;    
    }     

    function ShowWarn(val)
    {
        var target = document.getElementById('divWarn'); 
        target.innerHTML = val;    
    }    
    
    function Convert() {
        var input = document.frmConvert.encoded.value.toUpperCase();
        var cleaned = "";
        var myRegExp = /[A-V0-9]/ ;        
        for (i=0; i<input.length; i++) {
          var ch = input.charAt(i);
          if (myRegExp.test(ch) == false) {
            continue;
          }
          cleaned += ch;          
        }
        document.frmConvert.cleaned.value = cleaned;
        var result = base32_decode(cleaned);
        var output = result.output;
        var bitsLeft = result.bitsLeft;
        var separator = "";
        if (document.frmConvert.chbSeparator.checked)
            separator = " 0x";
        var hexText = "";
        //if (bitsLeft > 0) {
        // var htmlWarn = "<p" + ">" + "Warning: input data is not a multiple of 8 bits, ";
        //  htmlWarn += "last output byte was padded with " + (8-bitsLeft) + " zero bits on the right.</p" + ">";
        //  ShowWarn(htmlWarn);        
        //} else
        {
          var htmlWarn = "<p" + ">" + "</p" + ">";
          ShowWarn(htmlWarn);          
        }
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

//-->
</script>


<div id="main">
<h3>Base32 十六进制 -> 十六进制字符串解码器</h3>
      <p>Base32hex是使用不同字母表的base32变体，即"0123456789ABCDEFGHIJKLMNOPQRSTUV"。这允许以与二进制输入相同的方式轻松对base32hex字符串进行排序。另一方面，该字母表包含（与base32相反）易于混合的字符对：0和O，1和L，B和8。
      </p>  
      <form name="frmConvert" action="">
				<p>Base32hex字符串：</p>
			    <p><input type="text" name="encoded" value="" style="width: 550px;"></p>
				<p>清理字符串（仅大写，修复了常见的错误类型，如8-B，删除了base32集合之外的字符）：</p>
			    <p><input type="text" name="cleaned" readonly="readonly" value="" style="width: 550px;"></p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep">输出0x和空格分隔符
          <br>
          <input type="checkbox" name="chbLowercaseOutput" value="lowercaseHex">使用小写十六进制字符</p>  
        <div id="divWarn">
        <p></p>
        </div>	          
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
			</form>

<div >
<h3>by：李由     白泽Sec网络安全团队</h3>  

  </div>

<script type="text/javascript">

</script>

<br>  
<br>  
<br>  


</body>
</html>

