<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="C++ unescaping, C++ special characters, C++ text unescaping">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="C/C++ string literal to text converter (unescaping).">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>C/C++字符串文字到文本转换器</title>  
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
    function showErrorInfo(text, pos) {
      alert("错误:\r\n" + text + "\r\n错误的字数位置： " + pos);
    }

    function cstr_decode(input) {
        var output = "";
        var states = {
            OPENING: 0,
            STRING: 1,
            ESCAPING: 2
        };
        var state = states.OPENING;

        for (i = 0; i < input.length; i++) {
        
            switch (state) {
              
              case states.OPENING:
                switch (input[i]) {
                  case ' ':
                  case '\f':
                  case '\n':
                  case '\r':
                  case '\t':
                  case '\v':
                    break;;
                  case '\"':
                    state = states.STRING;
                    break;
                  default:
                    if (i != input.length - 1) {
                      showErrorInfo("意外字符 (" + input[i] + "), 不是字符串（需要引号包裹）", i);
                      return output;
                    } else {
                      showErrorInfo("意外字符 (" + input[i] + "), 转换中断", i);                       
                      break;
                    }
                }
                break;
              
              case states.STRING:
                switch (input[i]) {
                  case '\f':
                  case '\n':
                  case '\r':
                  case '\t':
                    break;
                  case '\"':
                    state = states.OPENING;
                    break;
                  case '\\':
                    state = states.ESCAPING;
                    break;
                  default:
                    output += input[i];
                    break;
                }              
                break;
                
              case states.ESCAPING:
                switch (input[i]) {
                  case 'f':
                    output += '\f';
                    break;
                  case 'n':
                    output += '\n';
                    break;
                  case 'r':
                    output += '\r';
                    break;
                  case 't':
                    output += '\t';
                    break;
                  case '"':
                    output += '\"';
                    break;
                  case '\\':
                    output += '\\';
                    break;

                  default:
                    showErrorInfo("Unexpected character (" + input[i] + "), expecting one of the escaped character (f, n, r, t, \, or quotation)", i);
                    return output;
                }
                state = states.STRING;              
                break;
            }
                             
        }

        if (state != states.OPENING) {
          showErrorInfo("Source string not terminated correctly", i);          
        }
        return output;
    } 
    
    function Convert() {
        var output = cstr_decode(document.frmConvert.ed_input.value);
        document.frmConvert.ed_output.value = output;
    } 

//-->
</script>


<div id="main">
<h1>C/C++字符串文字到文本转换器</h1>
	<p>将类C字符串文字转换为文本（取消跳过）。</p>
      <form name="frmConvert" action="">
				<p>C/C++/...字符串文字：</p>
			    <p><textarea name="ed_input" rows="10" cols="67" style="width: 550px;"></textarea></p>		  
			  <p>
			    <button type=button name="btnConvert"
            onclick="Convert()">
            转换
          </button>
			  </p>
				<p>未转义文本：</p>
			    <p>
            <textarea name="ed_output" rows="10" cols="67" style="width: 550px;"></textarea>          
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

