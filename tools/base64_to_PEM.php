<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Base64, base 64, PEM, javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="On-line base64 to PEM converter.">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>Base64到PEM转换器</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
    
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

<div id="main">
    <h1>Base64 至 PEM 转换器</h1>
    <p>客户端（javascript，没有数据发送到服务器）base64到PEM（"隐私增强的电子邮件"）格式转换器。这基本上将base64拆分为多行，每行64个字符，并可以选择添加PEM页眉/页脚。</p>
    <form name="frmConvert" action="">
        <p>Base64 源（单行或多行）：</p>
        <p><textarea name="edInput" rows="4" cols="67" style="width: 550px;"></textarea></p>
        <p>页眉/页脚：
            <select name="headerType">
                <option value="- none -">- 无 -</option>
                <option value="CERTIFICATE">证书</option>
                <option value="PRIVATE KEY">私钥</option>
                <option value="PUBLIC KEY">公钥</option>
                <option value="RSA PRIVATE KEY">RSA 私钥</option>
                <option value="RSA PUBLIC KEY">RSA 公钥</option>
                <option value="EC PRIVATE KEY">EC 私钥</option>
            </select>    
        </p>

        <p>
            <button type="button" name="btnConvert" onclick="Convert()">转换</button>
        </p>        

        <p>已清理的base64：</p>
        <p><input type="text" name="cleanedBase64" readonly="readonly" value="" style="width: 550px;"></p>				      
        <p>选项：</p>
        <p><textarea name="edOutput" rows="12" cols="67" style="width: 550px;"></textarea></p>
    </form>
    <script type="text/javascript">
    <!--
    //var base64chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    function cleanBase64(input) {
        var output = input.replace(/[^A-Za-z0-9+/=]/g, "");
        if (output != input)
            alert("Warning! Non-base64 characters (including newlines) from input string ignored.");
        return output;
    }


    function Convert() {
        var cleanedBase64 = cleanBase64(document.frmConvert.edInput.value);
        document.frmConvert.cleanedBase64.value = cleanedBase64;

        var wrapped = cleanedBase64.replace(/(\S{64}(?!$))/g, "$1\r\n");
        var header = document.frmConvert.headerType.value;
        if (header != "- none -") {
            wrapped = "-----BEGIN " + header + "-----\r\n"
                + wrapped
                + "\r\n-----END " + header + "-----\r\n";
        }
        document.frmConvert.edOutput.value = wrapped;
    }

    //-->
    </script>

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

