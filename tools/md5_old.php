<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="MD5, message digest 5, MD5 calkulator, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line MD5 calculator with binary and text input.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>李由 - MD5计算器</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
<div id="header_l">
   
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

<script type="text/javascript" src="../online_tools/md5_old.js"></script>

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
  
  function hex2dec(h) {
    return parseInt(h, 16);
  }

  var initialized = false;
  function Md5Init() {
    md5_init();
    document.frmCalc.output.value = "";    
    initialized = true;
  }
  
  function Md5UpdateText() {
    if (!initialized) {
      Md5Init();
    }
    var inp = document.frmCalc.input.value;
    for(i=0; i<inp.length; i++) {
      md5_update(inp.charCodeAt(i));
    }    
  }
  
  function Md5UpdateHex() {
    if (!initialized) {
      Md5Init();
    }
    var inp = document.frmCalc.input.value.toUpperCase();
    var Chars = "0123456789ABCDEF";   
    for (var i = 0; i < inp.length; i++)
    { 
      if (Chars.indexOf(inp.charAt(i)) == -1) {
        alert ("错误：不是有效的十六进制字符串，找到的字符不是十六进制。");
        return;
      }
    }    
    if (inp.length % 2) {
      alert ("错误：不是有效的十六进制字符串，长度不是2字节的倍数。");
      return;    
    }
    for (var i=0; i<inp.length; i+=2) {
      md5_update(hex2dec(inp.substr(i, 2)));
    }  
  }
  
  function Md5Finish() {
    initialized = false;
    md5_finish();
    document.frmCalc.output.value = "";
    for(i=0; i<digestBits.length; i++) {
      document.frmCalc.output.value += (digestBits[i]<16?"0":"") + dec2hex(digestBits[i]);
    }
  }
//-->
</script>


<div id="main">
<h3>MD5 计算器</h3>
      <p>此计算器的目的是计算质询握手授权方案使用的回复。MD5 状态可以多次更新，每次使用被视为文本或十六进制缓冲区的字符串（将 salt/nonce 视为二进制，将密码视为文本，反之亦然）。
      <form name="frmCalc" action="">
			  <p>
			    <button type=button name="btnInit" style="width: 450px"
            onclick="Md5Init()">
            Reinit计算（md5_init）
          </button>
			  </p>

				<p>输入:</p>
		    <p><input type="text" name="input" value="" style="width: 450px; font-family: courier, monospace; font-size: large;"><br>
			    <button type=button name="btnUpdateText" style="width: 450px"
            onclick="Md5UpdateText()">
            将输入视为文本进行更新 (md5_update)
          </button>          
			    <button type=button name="btnUpdateHex" style="width: 450px"
            onclick="Md5UpdateHex()">
           将输入视为十六进制字符串进行更新 (md5_update)
          </button>          
        </p>
			  <p>
			    <br>
          <button type=button name="btnFinish" style="width: 450px"
            onclick="Md5Finish()">
           完成计算/获得结果 (md5_finish)
          </button>
			  </p>
        <p><input type="text" name="output" value="" style="width: 450px; font-family: courier, monospace; font-size: large;"></p>  
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

