<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Base32hex, base32hex encoder, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript hexadecimal to base32hex converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>Hex to base32hex 转换器</title>  
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

    /*
    RFC4648 test vectors:     
   BASE32-HEX("") = ""
   BASE32-HEX("f") = "CO======"
   BASE32-HEX("fo") = "CPNG===="
   BASE32-HEX("foo") = "CPNMU==="
   BASE32-HEX("foob") = "CPNMUOG="
   BASE32-HEX("fooba") = "CPNMUOJ1"
   BASE32-HEX("foobar") = "CPNMUOJ1E8======"        
    */

    var base32_chars = "0123456789ABCDEFGHIJKLMNOPQRSTUV"
    function binary_to_base32(input) {
      var ret = new Array();
      var ret_len = 0;
      var i = 0;
    
      var unpadded_length = input.length;
      while (input.length % 5) {
        input[input.length] = 0;
      }
    
    	for(i=0; i<input.length; i+=5) {
    		ret += base32_chars.charAt((input[i] >> 3));
    		ret += base32_chars.charAt(((input[i] & 0x07) << 2) | ((input[i+1] & 0xc0) >> 6));
        if (i+1 >= unpadded_length) {
          ret += "======"
          break;
        }
    		ret += base32_chars.charAt(((input[i+1] & 0x3e) >> 1));       
    		ret += base32_chars.charAt(((input[i+1] & 0x01) << 4) | ((input[i+2] & 0xf0) >> 4));
        if (i+2 >= unpadded_length) {
          ret += "===="
          break;
        }        
    		ret += base32_chars.charAt(((input[i+2] & 0x0f) << 1) | ((input[i+3] & 0x80) >> 7));
        if (i+3 >= unpadded_length) {
          ret += "==="
          break;
        }        
    		ret += base32_chars.charAt(((input[i+3] & 0x7c) >> 2));
    		ret += base32_chars.charAt(((input[i+3] & 0x03) << 3) | ((input[i+4] & 0xe0) >> 5));
        if (i+4 >= unpadded_length) {
          ret += "="
          break;
        }          
    		ret += base32_chars.charAt(((input[i+4] & 0x1f))); 		
    	}
    	return ret;
    }
    
    function Convert() {
      var cleaned_hex = clean_hex(document.frmConvert.hex.value, document.frmConvert.chbSeparator.checked);
      document.frmConvert.cleaned_hex.value = cleaned_hex;
      if (cleaned_hex.length % 2) {
        alert ("错误：十六进制字符串长度为奇数。");
        document.frmConvert.base32.value = "";        
        return;
      }
      /*
      if (cleaned_hex.length % 10) {
        alert ("错误：此脚本要求输入长度为40位的倍数。");
        document.frmConvert.base32.value = "";        
        return;
      }
      */
      var binary = new Array();
      for (var i=0; i<cleaned_hex.length/2; i++) {
        var h = cleaned_hex.substr(i*2, 2);
        binary[i] = parseInt(h,16);        
      }
      document.frmConvert.base32.value = binary_to_base32(binary);
    } 

//-->
</script>


<div id="main">
<h3>十六进制 -> base32 十六进制字符串编码器</h3>
      <p>Base32hex是使用不同字母表的base32变体，即"0123456789ABCDEFGHIJKLMNOPQRSTUV"。这允许以与二进制输入相同的方式轻松对base32hex字符串进行排序。另一方面，该字母表包含（与base32相反）易于混合的字符对：0和O，1和L，B和8。
      </p>    
      <form name="frmConvert" action="">
				<p>十六进制字符串：</p>
			    <p><input type="text" name="hex" value="" style="width: 550px;"></p>
        <p>注意：十六进制集之外的所有字符都将被忽略，因此"12AB34" = "12 AB 34" = "12， AB， 34"等。输入不区分大小写。</p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep" checked="yes">从输入中删除"0x"</p>
				<p>已清理的输入：</p>
			    <p><input type="text" name="cleaned_hex" value="" style="width: 550px;"></p>				
        <p>输出（base32hex）</p>
			    <p><input type="text" name="base32" value="" style="width: 550px;"></p>	    
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

