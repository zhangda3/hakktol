<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="XOR, hex, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Javascript: XOR of two hexadecimal strings">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>两个十六进制字符串的异或</title>  
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
            alert("警告！忽略输入字符串中的非十六进制字符（包括换行符）。");
        return input;
    }

    var hD = '0123456789ABCDEF';

    function dec2hex(d) {
        var h = hD.substr(d & 15, 1);
        while (d > 15) {
            d >>= 4;
            h = hD.substr(d & 15, 1) + h;
        }
        return h;
    }

    function Convert() {
        var cleaned_hex_src = clean_hex(document.frmConvert.hex_src.value, document.frmConvert.chbSeparator.checked);
        document.frmConvert.cleaned_hex_src.value = cleaned_hex_src;
        if (cleaned_hex_src.length % 2) {
            alert("错误：十六进制源字符串长度为奇数。");
            return;
        }

        var cleaned_hex_key = clean_hex(document.frmConvert.hex_key.value, document.frmConvert.chbSeparator.checked);
        document.frmConvert.cleaned_hex_key.value = cleaned_hex_key;
        if (cleaned_hex_key.length % 2) {
            alert("错误：十六进制键字符串长度为奇数。");
            return;
        }

        var binary_src = new Array();
        for (var i = 0; i < cleaned_hex_src.length / 2; i++) {
            var h = cleaned_hex_src.substr(i * 2, 2);
            binary_src[i] = parseInt(h, 16);
        }

        var binary_key = new Array();
        for (var i = 0; i < cleaned_hex_key.length / 2; i++) {
            var h = cleaned_hex_key.substr(i * 2, 2);
            binary_key[i] = parseInt(h, 16);
        }

        var binary_out = new Array();
        for (var i = 0; i < binary_src.length; i++) {
            binary_out[i] = binary_src[i] ^ binary_key[i % binary_key.length];
        }

        var hexText = "";
        var separator1 = "",
            separator2 = "";
        var newline = document.frmConvert.chbNewline.checked;
        if (document.frmConvert.chbSeparatorOut.checked) {
            separator1 = "0x";
            separator2 = ", "
        }
        for (i = 0; i < binary_out.length; i++) {
            var charVal = binary_out[i];
            hexText = hexText + separator1 + (charVal < 16 ? "0" : "") + dec2hex(charVal) + separator2;
            if (newline) {
                if ((i % 16) == 15) {
                    hexText += "\n";
                }
            }
        }
        document.frmConvert.hex_out.value = hexText;
    }

//-->
</script>


<div id="main">

    <h1>两个十六进制字符串的异或</h1>
    <p>计算两个十六进制字符串的异或。按照惯例，第一个字符串（字节数组）被视为源（或明文），第二个字节数组被视为键，如果它比第一个短路，则循环。
    </p>
    <form name="frmConvert" action="">
        <p>第一个（"source"/"plaintext"）字节数组作为十六进制字符串：</p>
        <p>
            <textarea name="hex_src" rows="3" cols="87" style="width: 700px;"></textarea>
        </p>
        <p>第二个（"key"，如有必要，循环使用）字节数组作为十六进制字符串：</p>
        <p>
            <textarea name="hex_key" rows="3" cols="87" style="width: 700px;"></textarea>
        </p>
        <p>注意1：十六进制集之外的所有字符都将被忽略，因此"12AB34" = "12 AB 34" = "12， AB， 34"等。字符串不区分大小写。</p>
        <p>注2：使用"FF"作为键有效地否定了所有源位。</p>
        <p>选项:</p>
        <p>
            <input type="checkbox" name="chbSeparator" value="sep" checked="checked">源/键：从字符串中删除“0x”
            <br>
            <input type="checkbox" name="chbSeparatorOut" value="sep_out" checked="yes">输出：使用0x和逗号作为分隔符（类似C）
            <br>
            <input type="checkbox" name="chbNewline" value="newline" checked="yes">输出：在每个16B之后插入换行符
        </p>
    
        <p>
            <button type=button name="btnConvert" onclick="Convert()">
                生成异或数组
            </button>
        </p>
        <p>已清理的源：</p>
        <p>
            <input type="text" name="cleaned_hex_src" readonly="readonly" value="" style="width: 700px;">
        </p>
        <p>已清理的密钥：</p>
        <p>
            <input type="text" name="cleaned_hex_key" readonly="readonly" value="" style="width: 700px;">
        </p>
        <p>输出（异或结果）十六进制：</p>
        <p>
            <textarea name="hex_out" rows="3" cols="87" style="width: 700px;"></textarea>
        </p>
    
    </form>
<div >
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

