<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="converting files to base64, online converter, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line file to base64 converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>文件到base64转换器</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
<div id="header_l">
  
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     


<div id="main">

	<h1>文件到base64转换器</h1>
      <p>客户端（javascript，没有数据发送到服务器）文件到base64转换。小心>1 MB的文件（可能占用大量资源，例如Chromium 46在将几MB的文本加载到文本区域时存在严重问题，离线工具可能更适合大文件）。	  
	  </p>
	  <form name="frmConvert" action="">
        <p>选项：</p>
          <p>
			<input type="checkbox" name="chbNewline" value="newline">将输出拆分为多行
		  </p>
		<p>
		文件：
		<input type="file" name="fileinput" onchange='openFile(event)' />或者
        <span id="drop_zone" ondrop="drop_handler(event);" ondragover="dragover_handler(event);" ondragend="dragend_handler(event);" style="border: 10px solid darkgray; text-align:center; vertical-align:middle;">
          <strong>将文件拖放到此处</strong>
        </span>       
		</p>        

			  </p>		  
				<p>输出：</p>
			    <p>
				<textarea name="ed_output" rows="5" cols="87" style="width: 700px;"></textarea>				
                <br>
                <br>
                <button type="button" name="btnCopyOutputToClipboard" onclick="copyOutputToClipboard()">将输出复制到剪切板</button>
				</p>			    
			</form>
<div>
<h3>by：李由     白泽Sec网络安全团队</h3>
  </div>
  </div>
<script type="text/javascript">
<!--
    var base64_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"
    function binary_to_base64(input) {
      var ret = new Array();
      var i = 0;
      var j = 0;
      var char_array_3 = new Array(3);
      var char_array_4 = new Array(4);
      var in_len = input.length;
      var pos = 0;
  
      while (in_len--)
      {
          char_array_3[i++] = input[pos++];
          if (i == 3)
          {
              char_array_4[0] = (char_array_3[0] & 0xfc) >> 2;
              char_array_4[1] = ((char_array_3[0] & 0x03) << 4) + ((char_array_3[1] & 0xf0) >> 4);
              char_array_4[2] = ((char_array_3[1] & 0x0f) << 2) + ((char_array_3[2] & 0xc0) >> 6);
              char_array_4[3] = char_array_3[2] & 0x3f;
  
              for (i = 0; (i <4) ; i++)
                  ret += base64_chars.charAt(char_array_4[i]);
              i = 0;
          }
      }
  
      if (i)
      {
          for (j = i; j < 3; j++)
              char_array_3[j] = 0;
  
          char_array_4[0] = (char_array_3[0] & 0xfc) >> 2;
          char_array_4[1] = ((char_array_3[0] & 0x03) << 4) + ((char_array_3[1] & 0xf0) >> 4);
          char_array_4[2] = ((char_array_3[1] & 0x0f) << 2) + ((char_array_3[2] & 0xc0) >> 6);
          char_array_4[3] = char_array_3[2] & 0x3f;
  
          for (j = 0; (j < i + 1); j++)
              ret += base64_chars.charAt(char_array_4[j]);
  
          while ((i++ < 3))
              ret += '=';
  
      }
  
      return ret;
    }

    function chunk(er){
      return er.match(/.{1,75}/g).join('\n');
    }            
    
	  var uint8View;
	
    function Convert() {	
			 var text = binary_to_base64(uint8View);		  	
       var splitLines = document.frmConvert.chbNewline.checked;
       if (splitLines) {
         text = chunk(text);
       }
       document.frmConvert.ed_output.value = text;
    }

    function copyOutputToClipboard() {
        var target = document.frmConvert.ed_output;
        // https://stackoverflow.com/questions/51158061/copy-data-to-clipboard-without-selecting-any-text
        // - restoring original selection doesn't seem to work        
        var origSelectionStart, origSelectionEnd;
        origSelectionStart = target.selectionStart;
        origSelectionEnd = target.selectionEnd;
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch(e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }
        // restore prior selection
        target.setSelectionRange(origSelectionStart, origSelectionEnd);                        
    }

    function readFileAsArray(file) {
        var reader = new FileReader();
        reader.onload = function(){
          //var text = reader.result;
		      var arr = reader.result;
		      uint8View = new Uint8Array(arr);	  
          Convert();          	  
        };
        reader.readAsArrayBuffer(file);    
    }    

    var openFile = function(event) {
        var input = event.target;
        readFileAsArray(input.files[0]);
    };
      
    function drop_handler(ev) {
        ev.preventDefault();
        // If dropped items aren't files, reject them
        var dt = ev.dataTransfer;
        if (dt.items) {
            // Use DataTransferItemList interface to access the file(s)
            for (var i = 0; i < dt.items.length; i++) {
                if (dt.items[i].kind == "file") {
                    var f = dt.items[i].getAsFile();
                    readFileAsArray(f);
                    break;
                }
            }
        } else {
            // Use DataTransfer interface to access the file(s)
            for (var i = 0; i < dt.files.length; i++) {
                readFileAsArray(dt.files[i]);
                break;
            }
        }
    }

    function dragover_handler(ev) {
        // Prevent default select and drag behavior
        ev.preventDefault();
    }

    function dragend_handler(ev) {
        // Remove all of the drag data
        var dt = ev.dataTransfer;
        if (dt.items) {
            // Use DataTransferItemList interface to remove the drag data
            for (var i = 0; i < dt.items.length; i++) {
                dt.items.remove(i);
            }
        } else {
            // Use DataTransfer interface to remove the drag data
            ev.dataTransfer.clearData();
        }
    }                     


//-->
</script>




<script type="text/javascript">

</script>

<br>  
<br>  
<br>  



</body>
</html>

