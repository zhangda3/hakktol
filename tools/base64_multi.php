<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Base64, base 64, on-line decoder, base 64 decoder, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript base 64 to hexadecimal string decoder.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>李由 - Base64 解密</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
     
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

<script type="text/javascript" src="../online_tools/createFile.js"></script>

<script type="text/javascript">
<!--
    var hD='0123456789ABCDEF';
    function dec2hex(d) {
        var h = hD.substr(d&15,1);
        while (d>15) {
            d>>=4;
            h=hD.substr(d&15,1)+h;
        }
        if (document.frmConvert.chbLowercaseOutput.checked) {
            h = h.toLowerCase();
        }
        return h;
    }

    var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="
    function base64_decode(input) {
        var output = new Array();
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        var orig_input = input;
        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
        if (input.length % 4) {
            status = "错误：输入长度不是4字节的倍数";
            return [output, status];
        }
        
        var j=0;
        while (i < input.length) {

            enc1 = keyStr.indexOf(input.charAt(i++));
            enc2 = keyStr.indexOf(input.charAt(i++));
            enc3 = keyStr.indexOf(input.charAt(i++));
            enc4 = keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;
            
            output[j++] = chr1;
            if (enc3 != 64)
              output[j++] = chr2;
            if (enc4 != 64)
              output[j++] = chr3;
              
        }
        var status;
        if (orig_input != input) {
            status = "Warning! Characters outside Base64 range in input string ignored.";
        } else {
            status = "";
        }        
        return [output, status];
    }
           
    function Convert() {
        var hexText = "";
        var separator = "";
        if (document.frmConvert.chbSeparator.checked)
            separator = " 0x";    
        var lines = document.frmConvert.encoded.value.split('\n');
        for(var i = 0;i < lines.length; i++){
            var line = lines[i].trim();
            var outputArr = base64_decode(line);
            var output = outputArr[0];
            var status = outputArr[1];    
            for (var j=0; j<output.length; j++) {
              hexText = hexText + separator + (output[j]<16?"0":"") + dec2hex(output[j]);
            }
            hexText += ", " + status + "\r\n";                        
        }    
        document.frmConvert.hex.value = hexText;                
    }
     

//-->
</script>


<div id="main">
<h1>多 Base64 -> 十六进制字符串解码器</h1>
    <p>此表单转换base64字符串列表（每行一个字符串，可以从带有单个列的工作表或仅通过选择从Libre/OpenOffice Calc作为CSV文件导出）到十六进制字符串列表。
    <br>
   此表单将 base64 字符串列表（每行一个字符串，可以从 Libre/OpenOffice Calc 导出为 CSV 文件，从具有单个 columm 的工作表或仅通过选择）转换为十六进制字符串列表。
每个输出行都包含十六进制字符串（如果转换成功）和逗号后的可选注释（如果发现转换失败或意外字符），可以将其视为具有两列的CSV文件并导入回Calc（"选择性粘贴"选项并在文本导入对话框中将逗号标记为分隔符也可以）。
    </p>
      <form name="frmConvert" action="">
				<p>base64 字符串列表（每行一个 = 1 个 CSV 列）：</p>
			    <p><textarea name="encoded" rows="10" cols="67" style="width: 550px;""></textarea> </p>
        <p>选项：</p>
          <p><input type="checkbox" name="chbSeparator" value="sep">输出0x和空格分隔符
          <br>
          <input type="checkbox" name="chbLowercaseOutput" value="lowercaseHex">使用小写十六进制字符</p>          
				<p>解码数据（十六进制）+注释，两列CSV</p>
			    <p>
    			    <textarea name="hex" rows="10" cols="67" style="width: 550px;""></textarea>                    
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



<script type="text/javascript">

</script>

<br>  
<br>  
<br>  



</body>
</html>

