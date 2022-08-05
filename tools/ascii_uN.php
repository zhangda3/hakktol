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

<title>ASCII到类C数组的2/4/8字节值转换器</title>  
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
        return h;
    }
    
    function copyOutputToClipboard(btn) {
        var target;
        if (btn == document.frmConvert.btnCopy2B)
          target = document.frmConvert.hex2B;
        else if (btn == document.frmConvert.btnCopy4B)
          target = document.frmConvert.hex4B;
        else if (btn == document.frmConvert.btnCopy8B)
          target = document.frmConvert.hex8B;
        else
          return;
        
        // https://stackoverflow.com/questions/51158061/copy-data-to-clipboard-without-selecting-any-text
        // - restoring original selection doesn't seem to work        
        var origSelectionStart, origSelectionEnd;
        origSelectionStart = target.selectionStart;
        origSelectionEnd = target.selectionEnd;
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch(e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }
        // restore prior selection
        target.setSelectionRange(origSelectionStart, origSelectionEnd);                        
    }        
    
    function Convert() {
        var input = document.frmConvert.ed_input.value;
        var separator1 = "", separator2 = "";
        if (document.frmConvert.chbSeparator.checked) {
          separator1 = "0x";
          separator2 = ", "
        }
        var bigEndian = document.frmConvert.chbBigEndian.checked;
        var suffix4B = document.frmConvert.suffix4B.value;        
        var suffix8B = document.frmConvert.suffix8B.value;                
        
        var hexText;
        
        if (input.length % 2) {
          document.frmConvert.hex2B.value = "无效，字符数不均匀";      
        } else {
          hexText = "";
          if (bigEndian) {
            i = 0;
            while (i < input.length) {
              hexText += separator1;
              for (j=0; j<2; j++) {            
                  charVal = input.charCodeAt(i+j);
                  hexText += (charVal<16?"0":"") + dec2hex(charVal);
              }
              hexText += separator2;       
              i += 2;
            }
          } else {
            i = 0;
            while (i < input.length) {
              hexText += separator1;            
              for (j=1; j>=0; j--) {            
                  charVal = input.charCodeAt(i+j);
                  hexText += (charVal<16?"0":"") + dec2hex(charVal);
              }
              hexText += separator2;       
              i += 2;
            }          
          }
          document.frmConvert.hex2B.value = hexText;
        }
        
        if (input.length % 4) {
          document.frmConvert.hex4B.value = "无效，字符数不是4的倍数";      
        } else {
          hexText = "";
          if (bigEndian) {
            i = 0;
            while (i < input.length) {
              hexText += separator1;            
              charVal = input.charCodeAt(i);
              for (j=0; j<4; j++) {            
                  charVal = input.charCodeAt(i+j);
                  hexText += (charVal<16?"0":"") + dec2hex(charVal);
              }
              hexText += suffix4B;
              hexText += separator2;       
              i += 4;
            }
          } else {
            i = 0;
            while (i < input.length) {
              hexText += separator1;            
              charVal = input.charCodeAt(i);
              for (j=3; j>=0; j--) {            
                  charVal = input.charCodeAt(i+j);
                  hexText += (charVal<16?"0":"") + dec2hex(charVal);
              }
              hexText += suffix4B;
              hexText += separator2;       
              i += 4;
            }       
          }
          document.frmConvert.hex4B.value = hexText;
        }

        if (input.length % 8) {
          document.frmConvert.hex8B.value = "无效，字符数不是8的倍数";      
        } else {
          hexText = "";
          if (bigEndian) {
            i = 0;
            while (i < input.length) {
              hexText += separator1;            
              charVal = input.charCodeAt(i);
              for (j=0; j<8; j++) {            
                  charVal = input.charCodeAt(i+j);
                  hexText += (charVal<16?"0":"") + dec2hex(charVal);
              }
              hexText += suffix8B;
              hexText += separator2;       
              i += 8;
            }
          } else {
            i = 0;
            while (i < input.length) {
              hexText += separator1;            
              charVal = input.charCodeAt(i);
              for (j=7; j>=0; j--) {            
                  charVal = input.charCodeAt(i+j);
                  hexText += (charVal<16?"0":"") + dec2hex(charVal);
              }
              hexText += suffix8B;
              hexText += separator2;       
              i += 8;
            }       
          }
          document.frmConvert.hex8B.value = hexText;
        }

    }
    
    function onInputChange() {
      if (document.frmConvert.chbConvertOnChange.checked) {
        Convert();
      }    
    } 

//-->
</script>


<div id="main">
<h1>ASCII -> 2/4/8 字节十六进制 C 值的数组</h1>
    <p>
   将文本转换为十六进制短（16 位）、32 位和 64 位整数的数组。
    </p>
      <form name="frmConvert" action="">
				<p>输入文本:</p>
			    <p>
            <textarea name="ed_input" rows="10" cols="67" style="width: 550px;" oninput="onInputChange()"></textarea>
          </p>
        <p>选项：<br>
          <input type="checkbox" name="chbSeparator" value="sep" checked="yes">输出0x和逗号分隔符<br>
          <input type="checkbox" name="chbBigEndian" value="sep">大端输出<br>
          <input type="checkbox" name="chbConvertOnChange" value="sep">输入更改时立即转换<br>
          32位值的后缀（例如UL） <input type="text" name="suffix4B" value="" style="width: 50px;"><br>          
         64位值的后缀（例如ULL） <input type="text" name="suffix8B" value="ULL" style="width: 50px;"><br>          
        </p>
        <p>
			    <button type=button name="btnConvert"
            onclick="Convert()">
            转换
          </button>
			  </p>
				<p>输出：16位值</p>
			  <p><input type="text" name="hex2B" value="" style="width: 550px;"><button type=button name="btnCopy2B" onclick="copyOutputToClipboard(this)">Copy</button></p>			    
				<p>输出：32位值</p>
			  <p><input type="text" name="hex4B" value="" style="width: 550px;"><button type=button name="btnCopy4B" onclick="copyOutputToClipboard(this)">Copy</button></p>				    
				<p>输出：64位值</p>
			  <p><input type="text" name="hex8B" value="" style="width: 550px;"><button type=button name="btnCopy8B" onclick="copyOutputToClipboard(this)">Copy</button></p>			    
			  
			</form>

<h3>by：李由     白泽Sec网络安全团队</h3>  
</div>
<div id="sidebar">
<h3>快捷页面：</h3><br>
<h3>预留，暂时没想好</h3>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<script type="text/javascript">

</script>

<br>  
<br>  
<br>  



</body>
</html>

