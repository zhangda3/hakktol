<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="hex, hex to file converter, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript hexadecimal code to file converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>十六进制到文件（二进制）转换器</title>  
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
            alert ("警告！忽略输入字符串中的非十六进制字符（包括换行符）。");
        return input;    
    } 
    
    function Convert() {
      console.time("cleaning hex");
      var cleaned_hex = clean_hex(document.frmConvert.hex.value, document.frmConvert.chbSeparator.checked);
      var filename = document.frmConvert.filename.value;	  
      document.frmConvert.cleaned_hex.value = cleaned_hex;
      console.timeEnd("cleaning hex");
      if (cleaned_hex.length % 2) {
        alert ("错误：十六进制字符串长度为奇数。");     
        return;
      }

      console.time("parsing hex");
      var binary = new Array();
      for (var i=0; i<cleaned_hex.length/2; i++) {
        var h = cleaned_hex.substr(i*2, 2);
        binary[i] = parseInt(h,16);        
      }
      console.timeEnd("parsing hex");

        var byteArray = new Uint8Array(binary);
        var a = window.document.createElement('a');
        
        a.href = window.URL.createObjectURL(new Blob([byteArray], { type: 'application/octet-stream' }));
        a.download = filename;
        
        // Append anchor to body.
        document.body.appendChild(a)
        a.click();
        
        // Remove anchor from body
        document.body.removeChild(a)        
    } 

//-->
</script>


<div id="main">
<h1>十六进制 -> 文件 （二进制文件）</h1>
      <p>从十六进制代码创建任意文件（javascript，仅限客户端）。用PaleMoon 25.2.1，Chromium 46进行测试。 
	  </p>
	  <form name="frmConvert" action="">
				<p>十六进制字符串：</p>
			    <p>
				<textarea name="hex" rows="8" cols="67" style="width: 550px;"></textarea>
				</p>
        <p>注意：十六进制集之外的所有字符都将被忽略，因此"12AB34" = "12 AB 34" = "12， AB， 34"等。输入不区分大小写。</p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep" checked="checked">从输入中删除"0x"</p>
				<p>已清理的输入：</p>
			    <p><input type="text" name="cleaned_hex" readonly="readonly" value="" style="width: 550px;"></p>				      
      
				<p>要创建的文件的名称：</p>
			    <p>
				<input type="text" name="filename" value="liyou.dat" style="width: 550px;">
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

