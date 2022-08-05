<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="ASCII, hex, hex to dec converter, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript hexadecimal to decimal converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>十六进制到十进制转换器</title>  
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
            alert ("警告!忽略输入字符串中的非十六进制字符。");
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

	  var output = "";
	  var separator = document.frmConvert.separator.value;
	  var splitLines = document.frmConvert.chbSplitLines.checked;
	  var valuesPerLine = document.frmConvert.valuesPerLine.value;		  
	  var padValues = document.frmConvert.chbPadValues.checked;
	  
      for (var i=0; i<binary.length; i++) {
		var val = binary[i];
		if (padValues) {
			if (val < 10) {
				output += "  ";
			} else if (val < 100) {
				output += " ";
			}
		}
		output += val;
		if (i != binary.length - 1) {
			output += separator;
		}
		if (splitLines) {
			if (i % valuesPerLine == (valuesPerLine-1)) {
				output += "\r\n";
			}
		}
	  }
		document.frmConvert.ed_output.value	= output;

    } 

//-->
</script>


<div id="main">
<h3>十六进制 -> 十进制序列转换器</h3>
      <form name="frmConvert" action="">
				<p>十六进制字符串：</p>
			    <p><input type="text" name="hex" value="" style="width: 550px;"></p>
        <p>注意：十六进制集之外的所有字符都将被忽略，因此"12AB34" = "12 AB 34" = "12， AB， 34"等。输入不区分大小写。</p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep" checked="checked">从输入中删除"0x"</p>
				<p>已清理的输入：</p>
			    <p><input type="text" name="cleaned_hex" readonly="readonly" value="" style="width: 550px;"></p>				
				
				<p>输出值的分隔符：<input type="text" name="separator" value=", " style="width: 80px;">				
				<br>
				<input type="checkbox" name="chbSplitLines" value="" checked="checked">将输出拆分为多行，每行值：
				<input type="text" name="valuesPerLine" value="8" style="width: 40px;">				
				<br>
				<input type="checkbox" name="chbPadValues" value="" checked="checked">用空格填充每个值，最多3个字符
				</p>
				
				<p>输出：</p>
			    <p>
				<textarea name="ed_output" rows="10" cols="87" style="width: 700px;"></textarea>				
				</p>
				
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

