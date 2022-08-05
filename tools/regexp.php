<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="regular expressions, regexp">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Regular expressions tester and short cheatsheet.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>正则表达式</title>  
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
    function TestMatch() {
      var re = new RegExp(document.frmRegexp.regex.value);
      if (document.frmRegexp.test1.value.match(re)) {
        document.frmRegexp.btnMatch1.style.visibility = 'visible';
      } else {
        document.frmRegexp.btnMatch1.style.visibility = 'hidden';
      }
      if (document.frmRegexp.test2.value.match(re)) {
        document.frmRegexp.btnMatch2.style.visibility = 'visible';
      } else {
        document.frmRegexp.btnMatch2.style.visibility = 'hidden';
      }
      if (document.frmRegexp.test3.value.match(re)) {
        document.frmRegexp.btnMatch3.style.visibility = 'visible';
      } else {
        document.frmRegexp.btnMatch3.style.visibility = 'hidden';
      }
      if (document.frmRegexp.test4.value.match(re)) {
        document.frmRegexp.btnMatch4.style.visibility = 'visible';
      } else {
        document.frmRegexp.btnMatch4.style.visibility = 'hidden';
      }
    }
    
    function ShowMatch(inputtext) {
      var re = new RegExp(document.frmRegexp.regex.value);
      var m = re.exec(inputtext);
      if (m == null) {
        alert("没有对手");
      } else {
        var s = "Match at position " + m.index + ":\n";
        for (i = 0; i < m.length; i++) {
          s = s + m[i] + "\n";
        }
        alert(s);
      }
    }    

//-->
</script>


<div id="main">
<h1>正则表达式</h1>
      <p>用于交互式测试正则表达式的 Javascript 表单会再次测试多个文本片段。
      </p>
      <form name="frmRegexp" action="">
				<p>搜索的表达式 （正则表达式）：</p>
			    <p><input type="text" name="regex" value="" onChange="TestMatch()" onKeyUp="TestMatch()" style="width: 550px;"></p>
        <p>经测试的文本片段：</p>
			    <p><input type="text" name="test1" value="" onChange="TestMatch()" onKeyUp="TestMatch()" style="width: 430px;">
          <button type=button name="btnMatch1" style="width: 110px"
            onclick="ShowMatch(document.frmRegexp.test1.value)">
            显示匹配
          </button>
          </p>

			    <p><input type="text" name="test2" value="" onChange="TestMatch()" onKeyUp="TestMatch()" style="width: 430px;">
          <button type=button name="btnMatch2" style="width: 110px"
            onclick="ShowMatch(document.frmRegexp.test2.value)">
            显示匹配
          </button>
          </p>

			    <p><input type="text" name="test3" value="" onChange="TestMatch()" onKeyUp="TestMatch()" style="width: 430px;">
          <button type=button name="btnMatch3" style="width: 110px"
            onclick="ShowMatch(document.frmRegexp.test3.value)">
           显示匹配
          </button>
          </p>

			    <p><input type="text" name="test4" value="" onChange="TestMatch()" onKeyUp="TestMatch()" style="width: 430px;">
          <button type=button name="btnMatch4" style="width: 110px"
            onclick="ShowMatch(document.frmRegexp.test4.value)">
            显示匹配
          </button>
          </p>


			</form>
			<p>基本正则表达式元素：
			<table border="1" width="100%" cellspacing="0" cellpadding="3"
      style="font-family: courier, monospace; font-size: small;">

			<tr><td colspan="2">文字</td>
			</tr>

      <tr>
			<td>a B G 7 0 @ - = %</td><td>字母和数字完全匹配</td>
			</tr>

      <tr>
			<td>\. \\ \$ \[</td><td>转义特殊字符</td>
			</tr>

      <tr>
			<td>\n \r \t \dec_code \xhex_code</td><td>不可打印字符</td>
			</tr>


			<tr><td colspan="2">符号</td>
			</tr>

      <tr>
			<td>^ $</td><td>行的开始/结束</td>
			</tr>

      <tr>
			<td>\b</td><td>词界</td>
			</tr>

      <tr>
			<td>\B</td><td>一个字也没有</td>
			</tr>


			<tr><td colspan="2">字符组</td>
			</tr>

      <tr>
			<td>.</td><td>除换行符外的任何字符</td>
			</tr>
			
      <tr>
			<td>\d \D \s \S \w</td><td>十进制数字，非数字，空白，非空白，字符自[a-zA-Z0-9]</td>
			</tr>
			
      <tr>
			<td>[char_list]</td><td>列表中的任何字符，即[0123456789]，[a-zA-Z0-9_389;]</td>
			</tr>
			
      <tr>
			<td>[^char_list]</td><td>列表之外的任何字符，即[^0-9]</td>
			</tr>
			

			<tr><td colspan="2">计数-添加？非贪婪模式</td>
			</tr>

      <tr>
			<td>expr*</td><td>0 或者更多</td>
			</tr>

      <tr>
			<td>expr?</td><td>0 或者 1</td>
			</tr>

      <tr>
			<td>expr+</td><td>1 或者更多</td>
			</tr>

      <tr>
			<td>expr{n,m}</td><td>n 自 m</td>
			</tr>

      <tr>
			<td>expr{n}</td><td>表示 n</td>
			</tr>

      <tr>
			<td>expr{n,}</td><td>n 或者更多</td>
			</tr>

			<tr><td colspan="2">替代：expr1 | expr2</td>
			</tr>
			
			</table>
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

