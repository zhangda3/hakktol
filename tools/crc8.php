<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="CRC8, Dallas/Maxim CRC8, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="CRC8 from hex array calculator (javascript)">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>CRC8计算器</title>  
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
            alert ("Warning! Non-hex characters in input string ignored.");
        return input;    
    }
    
    function ShowDecodedAsText(val)
    {
        var target = document.getElementById('divDecodedText'); 
        target.innerHTML = val;    
    }       
    
	var crc8table = 
	[
	0, 94, 188, 226, 97, 63, 221, 131, 194, 156, 126, 32, 163, 253, 31, 65,
	157, 195, 33, 127, 252, 162, 64, 30, 95, 1, 227, 189, 62, 96, 130, 220,
	35, 125, 159, 193, 66, 28, 254, 160, 225, 191, 93, 3, 128, 222, 60, 98,
	190, 224, 2, 92, 223, 129, 99, 61, 124, 34, 192, 158, 29, 67, 161, 255,
	70, 24, 250, 164, 39, 121, 155, 197, 132, 218, 56, 102, 229, 187, 89, 7,
	219, 133, 103, 57, 186, 228, 6, 88, 25, 71, 165, 251, 120, 38, 196, 154,
	101, 59, 217, 135, 4, 90, 184, 230, 167, 249, 27, 69, 198, 152, 122, 36,
	248, 166, 68, 26, 153, 199, 37, 123, 58, 100, 134, 216, 91, 5, 231, 185,
	140, 210, 48, 110, 237, 179, 81, 15, 78, 16, 242, 172, 47, 113, 147, 205,
	17, 79, 173, 243, 112, 46, 204, 146, 211, 141, 111, 49, 178, 236, 14, 80,
	175, 241, 19, 77, 206, 144, 114, 44, 109, 51, 209, 143, 12, 82, 176, 238,
	50, 108, 142, 208, 83, 13, 239, 177, 240, 174, 76, 18, 145, 207, 45, 115,
	202, 148, 118, 40, 171, 245, 23, 73, 8, 86, 180, 234, 105, 55, 213, 139,
	87, 9, 235, 181, 54, 104, 138, 212, 149, 203, 41, 119, 244, 170, 72, 22,
	233, 183, 85, 11, 136, 214, 52, 106, 43, 117, 151, 201, 74, 20, 246, 168,
	116, 42, 200, 150, 21, 75, 169, 247, 182, 232, 10, 84, 215, 137, 107, 53
	];
	
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
      var cleaned_hex = clean_hex(document.frmConvert.hex.value, document.frmConvert.chbSeparator.checked);
      document.frmConvert.cleaned_hex.value = cleaned_hex;
      if (cleaned_hex.length % 2) {
        alert ("错误：清除的十六进制字符串长度为奇数。");     
        return;
      }

      var binary = new Array();
      for (var i=0; i<cleaned_hex.length/2; i++) {
        var h = cleaned_hex.substr(i*2, 2);
        binary[i] = parseInt(h,16);        
      }

	  var cleaned_init = clean_hex(document.frmConvert.init.value, true);
      if (cleaned_init.length != 2) {
        alert ("错误：初始值看起来不像1字节。");     
        return;
      }

		var result = parseInt(cleaned_init, 16);
		for (var i=0; i<binary.length; i++) {
			result = crc8table[result ^ binary[i]];
		}
		document.frmConvert.output.value = "0x" + (result<16?"0":"") + dec2hex(result);

    } 

//-->
</script>


<div id="main">
<h1>CRC8 计算器</h1>
	<p>CRC8 计算器采用十六进制数组作为输入，根据
	<a href="https://www.maximintegrated.com/en/app-notes/index.mvp/id/27">达拉斯/Maxim 应用笔记 27页</a>
	（多项式 X^8+X^5+X^4+X^0）计算校验和，即 1-wire协议使用。
      <form name="frmConvert" action="">
		<p>CRC8 初始化： <input type="text" name="init" value="0x00" style="width: 50px;">
		</p>
				<p>十六进制字符串：</p>
			    <p><input type="text" name="hex" value="" style="width: 550px;"></p>
        <p>注意：十六进制集之外的所有字符都将被忽略，因此"12AB34" = "12 AB 34" = "12， AB， 34"等。输入不区分大小写。</p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep" checked="checked">从输入中删除"0x"</p>
				<p>已清理的输入：</p>
			    <p><input type="text" name="cleaned_hex" readonly="readonly" value="" style="width: 550px;"></p>				

		<p>
		<br>
		结果（十六进制编码的校验和）： <input type="text" name="output" readonly="readonly" value="" style="width: 50px;">
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

