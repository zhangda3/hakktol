<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="encryption, RC4, online, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="RC4 file encryption/decryption">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>RC4文件加密/解密</title>  
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

    <h1>RC4 文件加密/解密</h1>
    <p>客户端（javascript，没有数据发送到服务器）RC4 加密/解密。小心大文件（可能导致浏览器崩溃的高资源消耗，离线工具可能更适合大文件）。</p>
    <p>RC4是一种对称流密码，加密和解密都使用相同的操作 - 基本上是XORing输入数据，具有从密码/初始矢量生成的非常长（256B的状态变量）字节流。由于 XOR 属性 （X ^ Y） ^ Y = X 数据在第一次运行时加密 （X ^ Y），在第二次运行时由 XORing 解密，字节流与第一次相同。</p>
    <p>安全 （*）：</p>
    <ul>
      <li>从不重用初始向量</li>
      <li>使用强初始向量，例如某些文本密码和唯一计数器的哈希或某种salt；MD5应该是好的，因为它的目的是雪崩效应，而不是抗碰撞</li>
      <li>从关键字节流中删除第一个字节（也称为RC dropN），以最小化偏差</li>
    </ul>
    <p>（*）安全性没有保证，但如果您丢失了加密文件的初始向量或删除了该文件的编号，您将度过一段不愉快的时光</p>
    <form name="frmConvert" action="">
      <p>源文件: 
      <input type="file" name="fileinput" onchange="openFile(event)" /></p>
      <p>初始化向量（十六进制，任意长度，最多256字节）：<br>
      <input type="text" name="initial_bytes" value="0x11, 0x22, 0x33, 0x44, 0x55, 0x66, 0x77, 0x88" style="width: 550px;">
      <br>
      先删除 <input type="text" name="dropN" value="256" style="width: 50px;">来自密钥流的字节数。
      </p>
        <p>选项:</p>
          <p><input type="checkbox" name="chbSeparator" value="sep" checked="checked">除非十六进制字符外，从初始化字符串中删除“0x”</p>
        <p>已清除的初始化向量（已删除非十六进制字符）：</p>
        <p><input type="text" name="cleaned_hex" readonly="readonly" value="" style="width: 550px;"></p>				      
        
        <p>要创建的文件的名称：</p>
        <p>
        <input type="text" name="filename" value="file.rc4" style="width: 550px;">
        </p>      
      <p>
        <button type="button" name="btnConvert" onclick="Convert()">转化</button>
      </p>
    </form>
    <h2>脱机工具</h2>
    <p>
    具有类似功能的简单 win32 应用程序。密码/初始矢量可以以文本或十六进制形式输入。还可以选择从处理的文件中跳过（直接复制）初始字节（例如标头）。Turbo C++： <a href="../bin/RC4/FileEncryptDecrypt.zip">FileEncryptDecrypt.zip</a><br>
    
    </p>
<div>
<h3>by：李由     白泽Sec网络安全团队</h3>
  </div>
</div>


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

    function rc4(iv, dropN, source) {
        var s = [],
            j = 0,
            x;
        var res = [];
        for (var i = 0; i < 256; i++) {
            s[i] = i;
        }
        for (i = 0; i < 256; i++) {
            j = (j + s[i] + iv[i % iv.length]) % 256;
            x = s[i];
            s[i] = s[j];
            s[j] = x;
        }

        i = 0;
        j = 0;
        for (var y = 0; y < dropN; y++) {
            i = (i + 1) % 256;
            j = (j + s[i]) % 256;
            x = s[i];
            s[i] = s[j];
            s[j] = x;
        }
        for (var y = 0; y < source.length; y++) {
            i = (i + 1) % 256;
            j = (j + s[i]) % 256;
            x = s[i];
            s[i] = s[j];
            s[j] = x;
            res[y] = source[y] ^ s[(s[i] + s[j]) % 256];
        }
        return res;
    }

    var fileData;

    function Convert() {
        var cleaned_hex = clean_hex(document.frmConvert.initial_bytes.value, document.frmConvert.chbSeparator.checked);
        var filename = document.frmConvert.filename.value;
        document.frmConvert.cleaned_hex.value = cleaned_hex;
        if (cleaned_hex.length % 2) {
            alert("错误：十六进制字符串长度为奇数。");
            return;
        }

        var binaryIV = new Array();
        for (var i = 0; i < cleaned_hex.length / 2; i++) {
            var h = cleaned_hex.substr(i * 2, 2);
            binaryIV[i] = parseInt(h, 16);
        }

        var dropN = parseInt(document.frmConvert.dropN.value);
        var processed = rc4(binaryIV, dropN, fileData);
        var byteArray = new Uint8Array(processed);

        var a = window.document.createElement('a');
        a.href = window.URL.createObjectURL(new Blob([byteArray], {
            type: 'application/octet-stream'
        }));
        a.download = filename;
        // Append anchor to body.
        document.body.appendChild(a);
        a.click();
        // Remove anchor from body
        document.body.removeChild(a);
    }


    var openFile = function(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var arr = reader.result;
            fileData = new Uint8Array(arr);
        };
        reader.readAsArrayBuffer(input.files[0]);
    };
//-->
</script>





<script type="text/javascript">

</script>

<br>  
<br>  
<br>  



</body>
</html>

