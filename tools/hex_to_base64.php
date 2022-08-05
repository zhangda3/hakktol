<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Base64, base 64, base 64 encoder, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript hexadecimal to base 64 converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>Hex to base64转换器</title>  
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

    var base64_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"
    function binary_to_base64(input) {
      var ret = new Array();
      var i = 0;
      var j = 0;
      var char_array_3 = new Array(3);
      var char_array_4 = new Array(4);
      var in_len = input.length;
      var pos = 0;
  
      while (in_len--)
      {
          char_array_3[i++] = input[pos++];
          if (i == 3)
          {
              char_array_4[0] = (char_array_3[0] & 0xfc) >> 2;
              char_array_4[1] = ((char_array_3[0] & 0x03) << 4) + ((char_array_3[1] & 0xf0) >> 4);
              char_array_4[2] = ((char_array_3[1] & 0x0f) << 2) + ((char_array_3[2] & 0xc0) >> 6);
              char_array_4[3] = char_array_3[2] & 0x3f;
  
              for (i = 0; (i <4) ; i++)
                  ret += base64_chars.charAt(char_array_4[i]);
              i = 0;
          }
      }
  
      if (i)
      {
          for (j = i; j < 3; j++)
              char_array_3[j] = 0;
  
          char_array_4[0] = (char_array_3[0] & 0xfc) >> 2;
          char_array_4[1] = ((char_array_3[0] & 0x03) << 4) + ((char_array_3[1] & 0xf0) >> 4);
          char_array_4[2] = ((char_array_3[1] & 0x0f) << 2) + ((char_array_3[2] & 0xc0) >> 6);
          char_array_4[3] = char_array_3[2] & 0x3f;
  
          for (j = 0; (j < i + 1); j++)
              ret += base64_chars.charAt(char_array_4[j]);
  
          while ((i++ < 3))
              ret += '=';
  
      }
  
      return ret;
    }
    
    function Convert() {
      var cleaned_hex = clean_hex(document.frmConvert.hex.value, document.frmConvert.chbSeparator.checked);
      document.frmConvert.cleaned_hex.value = cleaned_hex;
      if (cleaned_hex.length % 2) {
        alert ("错误：十六进制字符串长度为奇数。");
        document.frmConvert.base64.value = "";        
        return;
      }
      var binary = new Array();
      for (var i=0; i<cleaned_hex.length/2; i++) {
        var h = cleaned_hex.substr(i*2, 2);
        binary[i] = parseInt(h,16);        
      }
      document.frmConvert.base64.value = binary_to_base64(binary);
    } 

//-->
</script>


<div id="main">
<h3>十六进制 -> base64 字符串解码器</h3>
      <form name="frmConvert" action="">
				<p>十六进制字符串：</p>
			    <p><input type="text" name="hex" value="" style="width: 550px;"></p>
        <p>注意：十六进制集之外的所有字符都将被忽略，因此"12AB34" = "12 AB 34" = "12， AB， 34"等。输入不区分大小写。</p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep" checked="yes">从输入中删除"0x"</p>
				<p>已清理的输入：</p>
			    <p><input type="text" name="cleaned_hex" value="" style="width: 550px;"></p>				
        <p>输出（以64为基数）：</p>
			    <p><input type="text" name="base64" value="" style="width: 550px;"></p>	    
			  <p>
			    <button type=button name="btnConvert"
            onclick="Convert()">
            Convert
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

