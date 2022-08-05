<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Trim/remove duplicated/sort strings">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Trim/remove duplicated/sort strings.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>修剪/删除重复/排序字符串</title>  
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

            function Convert() {
                var input = document.frmConvert.ed_input.value;
                var trimStrings = document.frmConvert.chbTrimStrings.checked;
                var skipEmptyStrings = document.frmConvert.chbSkipEmptyStrings.checked;
                var removeDuplicatedStrings = document.frmConvert.chbRemoveDuplicatedStrings.checked;
                var sortStrings = document.frmConvert.chbSortStrings.checked;

                var lines = input.split('\n');
                var filteredLines = [];
                for(var i = 0;i < lines.length; i++){
                    var line;
                    if (trimStrings) {
                        line = lines[i].trim();
                    } else {
                        line = lines[i];
                    }
                    if (skipEmptyStrings) {
                        if (line === '') {
                            continue;
                        }
                    }
                    if (removeDuplicatedStrings) {
                        if (filteredLines.indexOf(line) < 0) {
                            filteredLines.push(line);
                        }
                    } else {
                        filteredLines.push(line);
                    }
                }
                if (sortStrings) {
                    filteredLines.sort();
                }
                var output = "";
                if (filteredLines.length) {
                    output = filteredLines[0];
                }
                for (var i=1; i<filteredLines.length; i++) {
                    output += "\r\n" + filteredLines[i];
                }

                document.frmConvert.ed_output.value = output;
            }

//-->
</script>


<div id="main">

            <h1>修剪/删除重复/排序字符串</h1>
            
            <form name="frmConvert" action="http://tomeko.net/online_tools/cpp_text_escape.php?lang=en">
                <p>源字符串（每行一个）：</p>
                <p>
                    <textarea onkeydown="return interceptTabs(event, this);" name="ed_input" rows="12" cols="67" style="width: 550px;"></textarea>
                </p>
                <p>选项:</p>
                <p>
                    <input type="checkbox" name="chbTrimStrings" value="" checked="yes">修剪源字符串
                    <br>
                    <input type="checkbox" name="chbSkipEmptyStrings" value="" checked="yes">跳过空字符串
                    <br>
                    <input type="checkbox" name="chbRemoveDuplicatedStrings" value="" checked="yes">删除重复的字符串
                    <br>                    
                    <input type="checkbox" name="chbSortStrings" value="" checked="yes">排序字符串
                    <br>                    
                </p>
                <p>
                    <button type="button" name="btnConvert" onclick="Convert()">
                        转换
                    </button>
                </p>
                <p>输出字符串</p>
                <p>
                    <textarea name="ed_output" rows="12" cols="67" style="width: 550px;"></textarea>
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

