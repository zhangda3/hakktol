<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="wav, wave, wave file generaor">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Wave file generator">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>波形文件发生器</title>  
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
    
    function CreateFile() {
      var filename = document.frmGenerator.filename.value;
      var numberOfSamples = parseInt(document.frmGenerator.numberOfSamples.value);
      if (numberOfSamples < 0) {
        alert("样本数量无效！");
        return;
      }
      var samplingFrequency = parseInt(document.frmGenerator.samplingFrequency.value);
      if (samplingFrequency <= 0 || samplingFrequency > 0xFFFFFFFF) {
        alert("采样频率值无效！");
        return;
      }
      // TODO
      var bitsPerSample;
      if (document.frmGenerator.bitsPerSample.selectedIndex == 1) {
        bitsPerSample = 24;
      } else {
        bitsPerSample = 16;
      }
      var numChannels = 1;

      var binary = new Array();      
      var pos = 0;
      // "RIFF" chunk descriptor
      binary[pos++] = 'R'.charCodeAt();
      binary[pos++] = 'I'.charCodeAt();
      binary[pos++] = 'F'.charCodeAt();
      binary[pos++] = 'F'.charCodeAt();
      // skip chunksize to be filled later
      var posChunkSize = pos;
      binary[pos++] = 0x00;      
      binary[pos++] = 0x00;      
      binary[pos++] = 0x00;      
      binary[pos++] = 0x00;      
      // Format
      binary[pos++] = 'W'.charCodeAt();
      binary[pos++] = 'A'.charCodeAt();
      binary[pos++] = 'V'.charCodeAt();
      binary[pos++] = 'E'.charCodeAt();
      
      // "fmt ", subchunk 1
      binary[pos++] = 'f'.charCodeAt();
      binary[pos++] = 'm'.charCodeAt();
      binary[pos++] = 't'.charCodeAt();
      binary[pos++] = ' '.charCodeAt();
      // subchunk 1 size
      binary[pos++] = 16;
      binary[pos++] = 0;
      binary[pos++] = 0;
      binary[pos++] = 0;
      // audio format = PCM
      binary[pos++] = 1;
      binary[pos++] = 0;
      // number of channels
      binary[pos++] = numChannels & 0xFF;
      binary[pos++] = (numChannels & 0xFF00) >> 8;
      // SampleRate
      binary[pos++] = samplingFrequency & 0xFF;
      binary[pos++] = (samplingFrequency & 0xFF00) >> 8;
      binary[pos++] = (samplingFrequency & 0xFF0000) >> 16;
      binary[pos++] = (samplingFrequency & 0xFF000000) >> 24;
      // ByteRate = SampleRate * NumChannels * BitsPerSample/8
      var byteRate = samplingFrequency * numChannels * bitsPerSample/8;
      binary[pos++] = byteRate & 0xFF;
      binary[pos++] = (byteRate & 0xFF00) >> 8;
      binary[pos++] = (byteRate & 0xFF0000) >> 16;
      binary[pos++] = (byteRate & 0xFF000000) >> 24;
      // BlockAlign       == NumChannels * BitsPerSample/8
      var blockAlign = numChannels * bitsPerSample/8;
      binary[pos++] = blockAlign & 0xFF;
      binary[pos++] = (blockAlign & 0xFF00) >> 8;
      // bitsPerSample
      binary[pos++] = bitsPerSample & 0xFF;
      binary[pos++] = (bitsPerSample & 0xFF00) >> 8;
      
      // "data", subchunk 2
      binary[pos++] = 'd'.charCodeAt();
      binary[pos++] = 'a'.charCodeAt();
      binary[pos++] = 't'.charCodeAt();
      binary[pos++] = 'a'.charCodeAt();
      // Subchunk2Size    == NumSamples * NumChannels * BitsPerSample/8
      var subchunk2Size = numberOfSamples * numChannels * bitsPerSample/8;
      binary[pos++] = subchunk2Size & 0xFF;
      binary[pos++] = (subchunk2Size & 0xFF00) >> 8;
      binary[pos++] = (subchunk2Size & 0xFF0000) >> 16;
      binary[pos++] = (subchunk2Size & 0xFF000000) >> 24;
      
      var minInt;
      var maxInt;
      if (bitsPerSample == 16) {
        maxInt = -1+(1<<15);
        minInt = -1<<15;
      } else {
        maxInt = -1+(1<<23);
        minInt = -1<<23;      
      }
      
      var generateFunction = "function generateFn(){ return (" + document.frmGenerator.formula.value + ");}";
      eval(generateFunction);
            
      // actual data
      for (n = 0; n < numberOfSamples; n++) {
        var sampleValue = generateFn();
        if (sampleValue < minInt) {
          sampleValue = minInt;
        } else if (sampleValue > maxInt) {
          sampleValue = maxInt;
        }
        if (bitsPerSample == 16) {
          binary[pos++] = sampleValue & 0xFF;
          binary[pos++] = (sampleValue & 0xFF00) >> 8;
        } else {
          binary[pos++] = sampleValue & 0xFF;
          binary[pos++] = (sampleValue & 0xFF00) >> 8;
          binary[pos++] = (sampleValue & 0xFF0000) >> 16;
        }                          
      }

      // fill correct chunk size
      var chunkSizeVal = pos - 8;
      pos = posChunkSize;
      binary[pos++] = chunkSizeVal & 0xFF;
      binary[pos++] = (chunkSizeVal & 0xFF00) >> 8;
      binary[pos++] = (chunkSizeVal & 0xFF0000) >> 16;
      binary[pos++] = (chunkSizeVal & 0xFF000000) >> 24;
      
  		var byteArray = new Uint8Array(binary);
  		var a = window.document.createElement('a');
  
  		a.href = window.URL.createObjectURL(new Blob([byteArray], { type: 'application/octet-stream' }));
  		a.download = filename;
  
  		// Append anchor to body.
  		document.body.appendChild(a)
  		a.click();
  
  		// Remove anchor from body
  		document.body.removeChild(a)        
    } 

//-->
</script>


<div id="main">
<h1>波形文件生成器</h1>
    <p>客户端（javascript）波形文件生成器。
    <br>
    虽然Audacity有一些工具来生成测试信号（例如正弦波），但它缺乏一些功能，特别是我找不到方便的方法来使用它来产生直流失调，需要使用示波器而不是真正的I2S编解码器测试多个I2S输出同时工作。此生成器旨在加快此操作，以前涉及生成具有 16 位样本的二进制文件，并将其作为原始数据导入 Audacity。
    </p>
    <p>使用此生成器，波形将用采样频率（放在波形文件头中），每个样本的位数和样本值的javascript公式来描述。
    <p>
    
	  <form name="frmGenerator" action="">
      <p>采样频率： <input type="text" name="samplingFrequency" value="48000" style="width: 80px;"></p>
      <p>样品大小
        <select name="bitsPerSample">
            <option value="16">16 bits</option>
            <option value="24">24 bits</option>
        </select>      
      </p>    
      <p>文件中的样本数: <input type="text" name="numberOfSamples" value="192000" style="width: 100px;"></p>

			<p>公式（javascript直接计算的）：
        <br>
				<textarea name="formula" rows="4" cols="67" style="width: 550px;">
10000 * Math.sin(2 * Math.PI * 1000/samplingFrequency * n)
        </textarea>
        <br>
        可以使用的符号：
        <dl class="code">
          <dt><strong>n</strong></dt>
            <dd>样本的索引</dd>
          <dt><strong>采样频率</strong></dt>
            <dd>采样频率（上面输入的值）</dd>
        </dl>
        <br>
        例子：
        <dl class="code">
          <dt><strong>3</strong></dt>
            <dd>用常量值填充每个样品 = 3</dd>
          <dt><strong>n % 10000</strong></dt>
            <dd>看到波形，其值从0上升到9999，然后再次上升</dd>
          <dt><strong>( (n/(samplingFrequency/(2*50))) & 0x01 ) ? 8000 : -4000</strong></dt>
            <dd>不对称 （+8000/-4000） 50Hz 方波</dd>
          <dt><strong>10000 * Math.sin（2 * Math.PI * 1000/采样频率 * n）</strong></dt>
            <dd>正弦波，1000 Hz，振幅 = 10000</dd>
        </dl>        
        <br>
        不同的波形可以自由组合（添加）。计算后的样本值根据所选位宽（16 或 24 位）饱和。   
			</p>
      
			<p>要创建的文件的名称：</p>
	    <p>
  			<input type="text" name="filename" value="liyou.wav" style="width: 550px;">
			</p>	  
	  
		  <p>
		    <button type=button name="btnCreateFile"
           onclick="CreateFile()">
           创建文件
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

