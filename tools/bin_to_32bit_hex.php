<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META content="text/html; charset=ISO-8859-2" http-equiv="content-type">
<meta name="robots" content="index,follow">
<META NAME="Keywords" CONTENT="binary, hex, 32-bit unsigned integer, conversion">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="李由">
<META name="description" content="Binary - 32-bit hex conversion">  
<link rel="stylesheet" type="text/css" media="only screen and (max-width: 959px)" href="../css/mobile.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 960px)" href="../css/main.css" />
<script type="text/javascript" src="../tree.js"></script>


<script src="../cookie_consent/js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../cookie_consent/css/jquery-eu-cookie-law-popup.css"/>
<script src="../cookie_consent/js/jquery-eu-cookie-law-popup-en.js"></script>

<title>二进制32位十六进制转换</title>  
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
      function pad(num, size) {
        var s = "0000000" + num;
        return s.substr(s.length-size);
      }

      function binChange() {
        //var output = createHtmlList(document.frmConvert.ed_input.value);
        //document.frmConvert.ed_output.value = output;
        var frm = document.frmConvert;
        var val = 0;
        if (frm.chbBit31.checked)
          val += (1<<31)>>>0;
        if (frm.chbBit30.checked)
          val += (1<<30)>>>0;
        if (frm.chbBit29.checked)
          val += (1<<29)>>>0;
        if (frm.chbBit28.checked)
          val += (1<<28)>>>0;
        if (frm.chbBit27.checked)
          val += (1<<27)>>>0;
        if (frm.chbBit26.checked)
          val += (1<<26)>>>0;
        if (frm.chbBit25.checked)
          val += (1<<25)>>>0;
        if (frm.chbBit24.checked)
          val += (1<<24)>>>0;
        if (frm.chbBit23.checked)
          val += (1<<23)>>>0;
        if (frm.chbBit22.checked)
          val += (1<<22)>>>0;
        if (frm.chbBit21.checked)
          val += (1<<21)>>>0;
        if (frm.chbBit20.checked)
          val += (1<<20)>>>0;
        if (frm.chbBit19.checked)
          val += (1<<19)>>>0;
        if (frm.chbBit18.checked)
          val += (1<<18)>>>0;
        if (frm.chbBit17.checked)
          val += (1<<17)>>>0;
        if (frm.chbBit16.checked)
          val += (1<<16)>>>0;
        if (frm.chbBit15.checked)
          val += (1<<15)>>>0;
        if (frm.chbBit14.checked)
          val += (1<<14)>>>0;
        if (frm.chbBit13.checked)
          val += (1<<13)>>>0;
        if (frm.chbBit12.checked)
          val += (1<<12)>>>0;
        if (frm.chbBit11.checked)
          val += (1<<11)>>>0;
        if (frm.chbBit10.checked)
          val += (1<<10)>>>0;
        if (frm.chbBit9.checked)
          val += (1<<9)>>>0;
        if (frm.chbBit8.checked)
          val += (1<<8)>>>0;
        if (frm.chbBit7.checked)
          val += (1<<7)>>>0;
        if (frm.chbBit6.checked)
          val += (1<<6)>>>0;
        if (frm.chbBit5.checked)
          val += (1<<5)>>>0;
        if (frm.chbBit4.checked)
          val += (1<<4)>>>0;
        if (frm.chbBit3.checked)
          val += (1<<3)>>>0;
        if (frm.chbBit2.checked)
          val += (1<<2)>>>0;
        if (frm.chbBit1.checked)
          val += (1<<1)>>>0;
        if (frm.chbBit0.checked)
          val += (1<<0)>>>0;
        frm.hex.value = "0x" + pad(val.toString(16), 8);                                 
      }

      function hexChange() {
        var frm = document.frmConvert;        
        var num = parseInt(frm.hex.value, 16);

        if (num < 0 || num > 0xFFFFFFFF) {
          alert("Number out of unsigned 32-bit range!");
        }

        frm.chbBit31.checked = num & (1<<31);
        frm.chbBit30.checked = num & (1<<30);
        frm.chbBit29.checked = num & (1<<29);
        frm.chbBit28.checked = num & (1<<28);
        frm.chbBit27.checked = num & (1<<27);
        frm.chbBit26.checked = num & (1<<26);
        frm.chbBit25.checked = num & (1<<25);
        frm.chbBit24.checked = num & (1<<24);
        frm.chbBit23.checked = num & (1<<23);
        frm.chbBit22.checked = num & (1<<22);
        frm.chbBit21.checked = num & (1<<21);
        frm.chbBit20.checked = num & (1<<20);
        frm.chbBit19.checked = num & (1<<19);
        frm.chbBit18.checked = num & (1<<18);
        frm.chbBit17.checked = num & (1<<17);
        frm.chbBit16.checked = num & (1<<16);
        frm.chbBit15.checked = num & (1<<15);
        frm.chbBit14.checked = num & (1<<14);
        frm.chbBit13.checked = num & (1<<13);
        frm.chbBit12.checked = num & (1<<12);
        frm.chbBit11.checked = num & (1<<11);
        frm.chbBit10.checked = num & (1<<10);
        frm.chbBit9.checked = num & (1<<9);
        frm.chbBit8.checked = num & (1<<8);
        frm.chbBit7.checked = num & (1<<7);
        frm.chbBit6.checked = num & (1<<6);
        frm.chbBit5.checked = num & (1<<5);
        frm.chbBit4.checked = num & (1<<4);
        frm.chbBit3.checked = num & (1<<3);
        frm.chbBit2.checked = num & (1<<2);
        frm.chbBit1.checked = num & (1<<1);
        frm.chbBit0.checked = num & (1<<0);
      }
//-->
</script>


    <div id="main">
      <h1>二进制 - 32 位十六进制转换</h1>
      <p>将 32 位的集合转换为 32 位十六进制数，反之亦然。
      </p>
      <p>
        我对这个转换器的用例是编辑dts文件。虽然C / C++允许以相对清晰的方式写入数值（位和将预定义的值移动到预定义的位置），但我认为这在dts和设置一些值（特别是多个位，跨越两个或多个十六进制数字边界）时是不可能的，例如位偏移量22或检查它是否已经设置容易出错。
      </p>
      <form name="frmConvert" action="">
        <p><strong>二进制 ：</strong></p>
        <p>
          <table>
            <tr>
              <td>比特 #</td>
              <td>31</td>
              <td>30</td>
              <td>29</td>
              <td>28</td>
              <td>27</td>
              <td>26</td>
              <td>25</td>
              <td>24</td>
              <td>23</td>
              <td>22</td>
              <td>21</td>
              <td>20</td>
              <td>19</td>
              <td>18</td>
              <td>17</td>
              <td>16</td>
            </tr>
            <tr>
              <td>值</td>
              <td><input type="checkbox" name="chbBit31" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit30" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit29" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit28" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit27" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit26" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit25" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit24" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit23" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit22" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit21" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit20" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit19" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit18" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit17" onchange="binChange()"></td>
              <td><input type="checkbox" name="chbBit16" onchange="binChange()"></td>
            </tr>
            <tr>
                <td>比特 #</td>
                <td>15</td>
                <td>14</td>
                <td>13</td>
                <td>12</td>
                <td>11</td>
                <td>10</td>
                <td>9</td>
                <td>8</td>
                <td>7</td>
                <td>6</td>
                <td>5</td>
                <td>4</td>
                <td>3</td>
                <td>2</td>
                <td>1</td>
                <td>0</td>
              </tr>
              <tr>
                <td>值</td>
                <td><input type="checkbox" name="chbBit15" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit14" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit13" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit12" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit11" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit10" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit9" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit8" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit7" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit6" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit5" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit4" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit3" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit2" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit1" onchange="binChange()"></td>
                <td><input type="checkbox" name="chbBit0" onchange="binChange()"></td>
              </tr>            
          </table>
        </p>
        <p>
          <strong>十六进制:</strong> <input type="text" name="hex" value="0x00000000" style="width: 150px; font-family: monospace; font-size: 150%" onchange="hexChange()" onkeyup="hexChange()">
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

