<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Base32, base 32, base 32 encoder, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line javascript hexadecimal to base 32 converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>十六进制到base32转换器</title>  
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
    function clean_hex(input, remove_0x) {
        input = input.toUpperCase();
        
        if (remove_0x) {
          input = input.replace(/0x/gi, "");        
        }
        
        var orig_input = input;
        input = input.replace(/[^A-Fa-f0-9]/g, "");
        if (orig_input != input)
            alert ("警告！忽略输入字符串中的非十六进制字符。");
        return input;    
    }

    /*
    RFC4648 test vectors:     
     BASE32("f" = 0x66) = "MY======"
     BASE32("fo") = "MZXQ===="
     BASE32("foo") = "MZXW6==="
     BASE32("foob") = "MZXW6YQ="
     BASE32("fooba") = "MZXW6YTB"
     BASE32("foobar") = "MZXW6YTBOI======"
    
    hex: 
    66
    666F
    666F6F
    666F6F62
    666F6F6261
    666F6F626172             
    */

    var base32_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567"
    function binary_to_base32(input) {
      var ret = new Array();
      var ret_len = 0;
      var i = 0;
    
      var unpadded_length = input.length;
      while (input.length % 5) {
        input[input.length] = 0;
      }
    
    	for(i=0; i<input.length; i+=5) {
    		ret += base32_chars.charAt((input[i] >> 3));
    		ret += base32_chars.charAt(((input[i] & 0x07) << 2) | ((input[i+1] & 0xc0) >> 6));
        if (i+1 >= unpadded_length) {
          ret += "======"
          break;
        }
    		ret += base32_chars.charAt(((input[i+1] & 0x3e) >> 1));       
    		ret += base32_chars.charAt(((input[i+1] & 0x01) << 4) | ((input[i+2] & 0xf0) >> 4));
        if (i+2 >= unpadded_length) {
          ret += "===="
          break;
        }        
    		ret += base32_chars.charAt(((input[i+2] & 0x0f) << 1) | ((input[i+3] & 0x80) >> 7));
        if (i+3 >= unpadded_length) {
          ret += "==="
          break;
        }        
    		ret += base32_chars.charAt(((input[i+3] & 0x7c) >> 2));
    		ret += base32_chars.charAt(((input[i+3] & 0x03) << 3) | ((input[i+4] & 0xe0) >> 5));
        if (i+4 >= unpadded_length) {
          ret += "="
          break;
        }          
    		ret += base32_chars.charAt(((input[i+4] & 0x1f))); 		
    	}
    	return ret;
    }

    function base32_encode(input, remove_0x) {
        var cleaned_hex = clean_hex(input, remove_0x);
        if (cleaned_hex.length % 2) {      
            return ["", "Error: cleaned hex string length is odd."];
        }
        var binary = new Array();
        for (var i=0; i<cleaned_hex.length/2; i++) {
            var h = cleaned_hex.substr(i*2, 2);
            binary[i] = parseInt(h,16);        
        }
        var output = binary_to_base32(binary);
        return [output, ""];
    }        
    
    function Convert() {
        var lines = document.frmConvert.hexList.value.split('\n');
        var remove_0x = document.frmConvert.chbSeparator.checked;
        var skip_comment = document.frmConvert.chbSkipComment.checked;
        var outputText = "";
        for(var i = 0;i < lines.length; i++){
            var line = lines[i].trim();
            var outputArr = base32_encode(line);
            var output = outputArr[0];
            var status = outputArr[1];
            outputText += output;
            if (skip_comment) {
              outputText += "\r\n";
            } else {
              outputText += ", " + status + "\r\n";
            }                        
        }    
        document.frmConvert.base32List.value = outputText;    
    } 

//-->
</script>


<div id="main">
<h1>多十六进制 -> base32 字符串转换器</h1>
    <p>此表单将十六进制字符串列表（每行一个字符串，可以从 Libre/OpenOffice Calc 导出为 CSV 文件，从具有单个 columm 的工作表或仅通过选择）转换为 base32 字符串列表。
    <br>
    每个输出行都包含 base32 字符串（如果转换成功）和逗号后的可选注释（如果转换失败）（十六进制字符数不均匀）。这可以被视为具有两列的CSV文件并导入回Calc（"选择性粘贴"选项并在文本导入对话框中将逗号标记为分隔符也可以）。
    </p>
          
      <form name="frmConvert" action="">
				<p>十六进制字符串列表（每行一个 = 1 个 CSV 列）：</p>
			    <p>
            <textarea name="hexList" rows="10" cols="67" style="width: 550px;""></textarea>
          </p>
        <p>
          注意：十六进制集之外的所有字符都将被忽略，因此"12AB34" = "12 AB 34" = "12， AB， 34"等。输入不区分大小写。
        </p>
        
        <p>选项：</p>
          <p>
            <input type="checkbox" name="chbSeparator" value="sep" checked="yes">
从输入中删除“0x”
            <br>
            <input type="checkbox" name="chbSkipComment" value="skipComment" checked="yes">跳过带有注释的列（逗号和后面的可选文本）
          </p>			
        
        <p>输出（base32+注释，两个CSV列，第二列为空=无错误）：</p>
			    <p>
    			    <textarea name="base32List" rows="10" cols="67" style="width: 550px;""></textarea>                    
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
  </div>


<script type="text/javascript">

</script>

<br>  
<br>  
<br>  



</body>
</html>

