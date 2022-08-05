<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Pascal escaping, Pascal text escaping, convert text to Pascal literal">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Text -> Pascal string converter (special characters escaping).">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>Text->Pascal字符串转换器</title>  
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

function insertAtCursor(myField, myValue)
    {
    //IE support
    if (document.selection) 
        {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = myValue;
        }
    
    //MOZILLA/NETSCAPE support
    else if (myField.selectionStart || myField.selectionStart == '0') 
        {
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        restoreTop = myField.scrollTop;
        
        myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
        
        myField.selectionStart = startPos + myValue.length; 
        myField.selectionEnd = startPos + myValue.length;
        
        if (restoreTop>0)
            {
            myField.scrollTop = restoreTop;
            }
        } 
    else 
        {
        myField.value += myValue;
        }
    }

    function interceptTabs(evt, control)
        {
        key = evt.keyCode ? evt.keyCode : evt.which ? evt.which : evt.charCode;
        if (key==9)
            {
            insertAtCursor(control, '\t');
            return false; 
            }
        else
            {
            return key;
            }
        }

    function pascal_encode(input) {
        var output = "";
        var splitLines = document.frmConvert.chbSplitLines.checked;
        var quoted = false;
        for (i = 0; i < input.length; i++) {
            switch (input[i]) {
            case '\n':
              if (quoted) {
                output += "'";
                quoted = false;
              }            
              if (splitLines) {
                output += "#10";
                if (i < input.length - 1) {
                  output += " +\n";
                } else {
                  output += "\n";
                }
              } else {
                output += "#10";              
              }
              break;
            case '\r':
              if (quoted) {
                output += "'";
                quoted = false;
              }
              output += "#13";
              break;
            case '\t':
              if (quoted) {
                output += "'";
                quoted = false;
              }
              output += "#9";
              break;
            case '\'':
              if (quoted == false) {
                output += "'";
                quoted = true;
              }
              output += "''";
              break;
            default:
              if (quoted == false) {
                output += "'";
                quoted = true;
              }
              output += input[i];
              break;	     
            }                       
        }
        if (quoted) {
          output += "'";
        }
        return output;
    } 
    
    function Convert() {
        var output = pascal_encode(document.frmConvert.ed_input.value);
        document.frmConvert.ed_output.value = output;
    } 

//-->
</script>


<div id="main">
<h1>Text->Pascal字符串转换器</h1>
	<p>将文本转换为 Pascal 单行或多行文字。转义换行符、制表符、引号。
  </p>
      <form name="frmConvert" action="">
				<p>源文本：</p>
			    <p><textarea onkeydown="return interceptTabs(event, this);" name="ed_input" rows="10" cols="67" style="width: 550px;"></textarea></p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSplitLines" value="split" checked="yes">将输出拆分为多行</p>			  
			  <p>
			    <button type=button name="btnConvert"
            onclick="Convert()">
            转换
          </button>
			  </p>
				<p>Pascal字符串文字</p>
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

