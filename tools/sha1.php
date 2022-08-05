<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="SHA1, SHA1 calkulator, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line SHA1 calculator with binary and text input.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>李由 - SHA1 计算器</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
<div id="header_l">
 
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

<script type="text/javascript" src="../online_tools/rusha.js"></script>

<script type="text/javascript">
<!--
	var rusha = new Rusha();

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
  function HashInit() {
    rusha.resetState();
    document.frmCalc.output.value = "";    
    initialized = true;
  }
  
  function HashUpdateText() {
    if (!initialized) {
      HashInit();
    }
    var inp = document.frmCalc.input.value;
		rusha.append(inp);    
  }
  
  function HashUpdateHex() {
    if (!initialized) {
      HashInit();
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
    var arr = new Array();
    for (var i=0; i<inp.length; i+=2) {
			arr.push(hex2dec(inp.substr(i, 2)));      
    }
    rusha.append(arr);
  }
  
  function HashFinish() {
    initialized = false;
    var hexHash = rusha.end();
    document.frmCalc.output.value = "";
    document.frmCalc.output.value = hexHash;
  }
  

	function readFileAsArray(file) {
	    var reader = new FileReader();
	    reader.onload = function(){
	      //var text = reader.result;
		  	var arr = reader.result;
		  	uint8View = new Uint8Array(arr);
		    if (!initialized) {
		      HashInit();
		    }
				rusha.append(uint8View);					  
	    };
	    reader.readAsArrayBuffer(file);    
	}    
	
	var openFile = function(event) {
	    var input = event.target;
	    readFileAsArray(input.files[0]);
	};  
//-->
</script>


<div id="main">
<h3> SHA1 计算器</h3>
      <p>Javascript（客户端）SHA1计算器用于混合输入（文本，十六进制或文件 - 可以以任何组合添加到哈希）。使用<a href="https://github.com/srijs/rusha">Rusha</a>.
      <form name="frmCalc" action="">
			  <p>
			    <button type=button name="btnInit" style="width: 470px"
            onclick="HashInit()">
            Reinit计算（清晰的哈希状态）
          </button>
			  </p>

				<p>输入:</p>
		    <p><input type="text" name="input" value="" style="width: 470px; font-family: courier, monospace; font-size: large;"><br>
			    <button type=button name="btnUpdateText" style="width: 470px"
            onclick="HashUpdateText()">
            更新将输入视为文本
          </button>          
			    <button type=button name="btnUpdateHex" style="width: 470px"
            onclick="HashUpdateHex()">
            更新将输入视为十六进制字符串
          </button>
					<br>
					或使用文件内容进行更新（选择文件后立即）：
					<br>					 
					<input type="file" name="fileinput" onchange='openFile(event)' />					          
        </p>
			  <p>
			    <br>
          <button type=button name="btnFinish" style="width: 470px"
            onclick="HashFinish()">
            完成计算/获取结果
          </button>
			  </p>
        <p><input type="text" name="output" value="" style="width: 470px; font-family: courier, monospace; font-size: large;"></p>  
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

