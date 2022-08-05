<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="converting files to hex, online converter, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line file to hexadecimal array converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>文件到十六进制转换器</title>  
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

	<h1>文件到十六进制转换器</h1>
      <p>客户端（javascript，没有数据发送到服务器）文件到十六进制代码转换。小心>1 MB的文件（可能占用大量资源，例如Chromium 46在将几MB的文本加载到文本区域时存在严重问题，离线工具可能更适合大文件）。
	  </p>
	  <form name="frmConvert" action="">
		<p>
		文件: 
		<input type="file" name="fileinput" onchange='openFile(event)' /> 或者
        <span id="drop_zone" ondrop="drop_handler(event);" ondragover="dragover_handler(event);" ondragend="dragend_handler(event);" style="border: 10px solid darkgray; text-align:center; vertical-align:middle;">
          <strong>将文件拖放到此处</strong>
        </span>       
		</p>        
        <p>选项：</p>
          <p>
		  <input type="checkbox" name="chbSeparator" value="sep" checked="yes">使用0x和逗号作为分隔符（类似C）
		  <br>
			<input type="checkbox" name="chbNewline" value="newline" checked="yes">在每个16B之后插入换行符		  
		  </p>
			  <p>
			    <button type=button name="btnConvert"
            onclick="Convert()">
            转换
          </button>
			  </p>		  
				<p>输出:</p>
			    <p>
				<textarea name="ed_output" rows="10" cols="87" style="width: 700px;"></textarea>				
				</p>			    
			</form>
      <div>
<h3>by：李由     白泽Sec网络安全团队</h3>
  </div>
  </div>
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
    
	var uint8View;
	
    function Convert() {	
			var hexText = "";
			var separator1 = "", separator2 = "";
			var newline = document.frmConvert.chbNewline.checked;
			if (document.frmConvert.chbSeparator.checked)
			{
			  separator1 = "0x";
			  separator2 = ", "
			}			
			for (i=0; i<uint8View.length; i++) {
			  var charVal = uint8View[i];
			  hexText = hexText + separator1 + (charVal<16?"0":"") + dec2hex(charVal) + separator2;
				if (newline) {
					if ((i%16) == 15) {
						hexText += "\n";
					}
				}
			}
			document.frmConvert.ed_output.value = hexText;		  	
    }

    function readFileAsArray(file) {
        var reader = new FileReader();
        reader.onload = function(){
          //var text = reader.result;
		  var arr = reader.result;
		  uint8View = new Uint8Array(arr);	  
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

