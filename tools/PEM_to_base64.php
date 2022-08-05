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

<title>PEM到base64转换器</title>  
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
    <h1>PEM 至 Base64 转换器</h1>
    <p>客户端（javascript，没有数据发送到服务器）PEM（"隐私增强的电子邮件"）格式到base64转换器。这基本上连接了多个base64行，可以选择删除PEM页眉/页脚。</p>
    <form name="frmConvert" action="">
        <p>PEM 源:</p>
        <p><textarea name="edInput" rows="10" cols="67" style="width: 550px;"></textarea></p>
        <p>选项:</p>
        <p><input type="checkbox" name="chbRemoveHeaderAndFooter" value="" checked="checked">移除PEM页眉和页脚</p>

        <p>
            <button type="button" name="btnConvert" onclick="Convert()">转换</button>
        </p>        

        <p>输出:</p>
        <p><textarea name="edOutput" rows="8" cols="67" style="width: 550px;"></textarea></p>
    </form>
    <script type="text/javascript">
    <!--
    //var base64chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    function cleanBase64(input) {
        var output = input.replace(/[^A-Za-z0-9+/=]/g, "");
        if (output != input)
            alert("警告！忽略输入字符串中的非base64字符（包括换行符）。");
        return output;
    }


    function Convert() {
        var input = document.frmConvert.edInput.value;
        var removeHeaderAndFooter = document.frmConvert.chbRemoveHeaderAndFooter.checked;
        var output = "";

        if (!removeHeaderAndFooter) {
            output = input.replace(/\r/g, '');
            output = output.replace(/\n/g, '');
        } else {
            var lines = input.split(/\r?\n/);
            for (var i = 0; i < lines.length; i++) {
                var line = lines[i];
                if (line.indexOf('-----') < 0) {
                    output += line;
                }
            }
        }

        document.frmConvert.edOutput.value = output;
    }

    //-->
    </script>
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

