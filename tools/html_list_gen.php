<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="HTML, unordered list, nested list, HTML list generator">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Text to nested unordered HTML list converter">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>文本 -> 嵌套无序HTML列表转换器</title>  
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

        function insertAtCursor(myField, myValue) {
          //IE support
          if (document.selection) {
            myField.focus();
            sel = document.selection.createRange();
            sel.text = myValue;
          }

          //MOZILLA/NETSCAPE support
          else if (myField.selectionStart || myField.selectionStart == '0') {
            var startPos = myField.selectionStart;
            var endPos = myField.selectionEnd;
            restoreTop = myField.scrollTop;

            myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);

            myField.selectionStart = startPos + myValue.length;
            myField.selectionEnd = startPos + myValue.length;

            if (restoreTop > 0) {
              myField.scrollTop = restoreTop;
            }
          }
          else {
            myField.value += myValue;
          }
        }

      function interceptTabs(evt, control) {
        key = evt.keyCode ? evt.keyCode : evt.which ? evt.which : evt.charCode;
        if (key == 9) {
          insertAtCursor(control, '\t');
          return false;
        }
        else {
          return key;
        }
      }

      function createHtmlList(input) {
        var output = "";

        var re = /\r\n|\n\r|\n|\r/g;
        arrayofLines = input.replace(re,"\n").split("\n");

        function prepareLine(input) {
          var i = 0;
          var output = "";
          if (document.frmConvert.chbRemovePrefix.checked) {
            var prefix = document.frmConvert.linePrefix.value;
            if (input.indexOf(prefix) === 0) {
              input = input.substring(prefix.length);
              // left-trim
              input = input.replace(/^\s+/,"");
            }
          }
          while (i < input.length) {
            switch (input[i]) {
              case '\"':
                output += "&quot;";
                break;
              case '&':
                output += "&amp;";
                break;
              case '<':
                output += "&lt;";
                break;
              case '>':
                output += "&gt;";
                break;
              default:
                output += input[i];
                break;
            }
            i++;
          }    
          return output;
        }

        var previousLevel = -1;
        for (index = 0; index < arrayofLines.length; ++index) {
          var line = arrayofLines[index];
          
          // count leading tab characters
          var newLevel = 0;
          var i = 0;
          while (i < line.length) {
            if (line[i] != '\t') {
              break;
            }
            newLevel++;
            i++;
          }
          
          // get rid of leading tabs
          line = line.substring(newLevel);
          line = prepareLine(line);

          if (newLevel > previousLevel) {
            if (previousLevel >= 0) {
              output += "\n";
            }
            output += Array(newLevel + 1).join("\t");
            output += "<ul>\n";
            output += Array(newLevel + 2).join("\t");
            output += "<li>";
            output += line;
            previousLevel = newLevel;
          } else if (newLevel == previousLevel) {
            output += "</li>\n";            
            output += Array(newLevel + 2).join("\t");
            output += "<li>";
            output += line;           
          } else {
            if (previousLevel > 0) {
              output += "</li>\n";
            }            
            while (previousLevel > newLevel) {            
              output += Array(previousLevel + 1).join("\t");
              output += "</ul>\n";
              output += Array(previousLevel + 1).join("\t");
              output += "</li>\n";              
              previousLevel--;              
            }
            output += Array(newLevel + 2).join("\t");
            output += "<li>";
            output += line;            
          }

        }

        if (previousLevel >= 0) {
          output += "</li>\n";
        }
        while (previousLevel >= 0) {
          output += Array(previousLevel + 1).join("\t");
          output += "</ul>\n";
          if (previousLevel > 0) {
            output += Array(previousLevel + 1).join("\t");
            output += "</li>\n";
          }
          previousLevel--;              
        }

        return output;
      }

      function Convert() {
        var output = createHtmlList(document.frmConvert.ed_input.value);
        document.frmConvert.ed_output.value = output;
      }

      function loadExample() {
        document.frmConvert.ed_input.value = "Item1\nItem2\n\tSubItem2_1\n\tSubItem2_2\nItem3";
      }

//-->
    </script>


<div id="main">

	<h1>Text -> 文本 -> HTML 无序列表转换器</h1>
	<p>将文本列表转换为嵌套的无序列 HTML 列表。源文本中的项目应用新行分隔，前导选项卡的数量定义嵌套级别。字符 "， &， < i > 将被替换为相应的 HTML 实体。
	</p>
	<p>
		我用它来将选项卡格式的应用程序更改日志转换为嵌套的html列表。
	</p>
	<form name="frmConvert" action="">
		<p>
			<button type=button name="btnConvert" onclick="loadExample()">
				例子
			</button>
		</p>
		<p>源文本：</p>
		<p>
			<textarea onkeydown="return interceptTabs(event, this);" name="ed_input" rows="10" cols="67" style="width: 550px;"></textarea>
		</p>
		<p>
			<input type="checkbox" name="chbRemovePrefix">删除<input type="text" name="linePrefix" value="-" style="width: 50px;"> 每行中的前缀（如果存在）并左修剪        
		</p>
		<p>
			<button type=button name="btnConvert" onclick="Convert()">
				转换
			</button>
		</p>
		<p>HTML 输出</p>
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

