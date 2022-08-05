<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="Linux, /proc/diskstats, formatting">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Formatter for Linux /proc/diskstats">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>/proc/diskstats转换为更具可读性的形式</title>  
</head>
<body class="eupopup eupopup-bottomleft eupopup-style-compact">

<div id="wrap">
<div id="header">
<div id="header_l">
       
</div>

<a href="../bot-trap/">
  <img src="../images/pixel.gif" border="0" alt=" " width="1" height="1">
</a>
     

    <style>
        table, th, td {
          border: 1px solid black;
        }
        td {
          font-family: Courier New; text-align: right;
        }
    </style>

<div id="main">
    <h1>/proc/diskstats转换为更具可读性的形式</h1>
    <p>将 Linux /proc/diskstats 的内容转换为更具可读性的形式。有关文件文档，请参阅 <a href="https://www.kernel.org/doc/Documentation/ABI/testing/procfs-diskstats">https://www.kernel.org/doc/Documentation/ABI/testing/procfs-diskstats</a> for file documentation.</p>

    <form name="frmConvert" action="">
        <p>/proc/diskstats 内容：</p>
        <p><textarea name="edInput" rows="10" cols="80" style="width: 600px;"></textarea></p>
        <p>选项：</p>
        <p><input type="checkbox" name="chbSkipEmpty" value="" checked="checked">跳过没有读取和没有写入的行（设备）</p>        
        <p>
            <button type="button" name="btnConvert" onclick="Convert()">格式化</button>
        </p>
        <p>格式化:</p>
        <table id="diskstatsTable" style="display: block; overflow-x: auto;">
          <thead>
            <tr>
            <th>开发编号</th>
            <th>开发人员名称</th>
            <th>读取已成功完成</th>
            <th>读取合并</th>
            <th>扇区读取</th>
            <th>读取时间 [毫秒]</th>
            <th>写入完成</th>
            <th>写入合并</th>
            <th>写入的扇区</th>
            <th>写入时间[ms]</th>
            <th>正在进行的I/O</th>
            <th>执行I/O所花费的时间[ms]</th>
            <th>执行 I/O 所花费的加权时间</th>
            <th>丢弃</th>
            <th>丢弃已合并</th>
            <th>丢弃的扇区</th>
            <th>丢弃所花费的时间</th>
            <th>刷新请求已完成</th>
            <th>冲洗时间</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </form>
	<p>要获取最近修改的文件列表（内容或权限修改），请使用：
	</p>
	<pre>
	cd /
	find . -xdev -ctime -0.2
	</pre>
	<p>
	其中 -0.2 = "不早于 0.2 天"， -xdev = 不要下降到作为挂载点的目录中
	</p>
    <script type="text/javascript">
    <!--

    function Convert() {
        var input = document.frmConvert.edInput.value;
        var skipEmpty = document.frmConvert.chbSkipEmpty.checked;
        var table = document.getElementById("diskstatsTable");
        
        var rowCount = table.rows.length;
        for (var x=rowCount-1; x>0; x--) {
           table.deleteRow(x);
        }        
        
        arrayOfLines = input.match(/[^\r\n]+/g);        
        
        var rowId = 1;
        for (var i = 0; i < arrayOfLines.length; i++) {
            var line = arrayOfLines[i];
            var stringArray = line.match(/\S+/g);
            
            if (skipEmpty) {
                if (stringArray.length >= 10) {
                    if (stringArray[5] == "0" && stringArray[9] == "0") {
                        continue;
                    }
                }
            }

            row = table.insertRow(rowId++);
            
            if (stringArray.length >= 2)
            {
                var cell = row.insertCell(0);
                cell.innerText = stringArray[0] + "/" + stringArray[1];
            }
            for (var j=2; j < stringArray.length; j++) {
                var cell = row.insertCell(j-1);
                cell.innerText = stringArray[j];
            }
        }
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

