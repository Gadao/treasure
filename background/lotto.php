<?php
require_once("../mobile/loader.php");
$requirement = array();
$row = $db->query( "SELECT record_id,dep,account FROM record" );
while( $dt=$row->fetch(PDO::FETCH_ASSOC) ){
    if( count_record($dt['record_id'])=='25' )
        array_push( $requirement, $dt['dep']." ".$dt['account']." 同學" );
}
$winner=$requirement[array_rand($requirement,1)];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>樹德科技大學-校園尋寶大發現</title>
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <meta ContentType=html/text; charset=utf-8>
        <link href="../web/css/style.css" rel="stylesheet" type="text/css" />
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="../web/css/bootstrap.css">
        <script language="javascript">

// global variables 

var timer;

var flag = new Array(100);

var existingnum = new Array(100);

var clickTimes = 0;

var randnum;

var cellnum =1;

var mobile = new Array();

// set data here!!

mobile[0] = "<?php echo '12113240'; ?>";
mobile[1] = "<?php echo '12123245'; ?>";
mobile[2] = "<?php echo '11545246'; ?>";
mobile[3] = "<?php echo '13354364'; ?>";
var num = mobile.length-1;

function getRandNum(){

document.getElementById("result").value = mobile[GetRnd(0,num)];

}

function start(){

clearInterval(timer);

timer = setInterval('change()',50); 

}

function ok(){

clearInterval(timer);

}

function GetRnd(min,max){

randnum = parseInt(Math.random()*(max-min+1));

return randnum;

}

function setTimer(){

 timer = setInterval("getRandNum();",10);

 document.getElementById("start").disabled = true;

 document.getElementById("end").disabled = false;

}

function clearTimer(){

 noDupNum();

 clearInterval(timer);

 document.getElementById("start").disabled = false;

 document.getElementById("end").disabled = true;

}

function noDupNum(){

 // to remove the selected mobile phone number

 mobile.removeEleAt(randnum);

 // to reorganize the mobile number array!!

 var o = 0;

 for(p=0; p<mobile.length;p++){

 if(typeof mobile[p]!="undefined"){

 mobile[o] = mobile[p];

 o++;

 }

 }

 num = mobile.length-1;

 }

// method to remove the element in the array

Array.prototype.removeEleAt = function(dx)

 {

 if(isNaN(dx)||dx>this.length){return false;}

 this.splice(dx,1);

 }

// set mobile phone numbers to the table cell 

function setValues(){

 document.getElementById(cellnum).value = document.getElementById("result").value ;

 cellnum++;

 }

</script>
    </head>
    <body >
        <div id="outer">
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <img src="../web/image/title.png"></img>
                </div>
                <div id="menu">
                    <ul>
                        <li><a href="alldata.php">所有學生資料</a></li>
                        <li><a href="insert.php">新增通關同學資料</a></li>
                        <li><a href="successdata.php">系所通過成功率</a></li>
                        <li><a href="lotto.php">開獎系統</a></li>
                    </ul>
                </div>
            </div>
            <div id="page">
                <center><h1>開獎系統</h1></center>
                <div id="content">
                   <div id="main">
                        <center>
                        <div>
                            <p><input id="result" type="text" size="30"  readonly/></p>
                            <p>
                            <input id="start" type="button" value="START"  onclick="setTimer()" />
                            <input id="end" type="button" value="STOP" onclick="clearTimer();setValues();" disabled/>
                            </p>
                            <p style="padding-top:30px; "><h1 style="padding-bottom:30px;">得獎同學</h1></p>
                            <table width="946" height="79" >
                            <tr >
                            <td><input name="text1" type="text" id="1" style="height:60px;width:190px;border:1px solid ;font-size:40px;"  size="28" readonly/></td>
                            <td><input name="text2" type="text" id="2" style="height:60px;width:190px;border:1px solid ;font-size:40px;" size="20" readonly/></td>
                            <td><input name="text3" type="text" id="3" style="height:60px;width:190px;border:1px solid ;font-size:40px;" size="20" readonly/></td>
                            <td><input name="text4" type="text" id="4" style="height:60px;width:190px;border:1px solid ;font-size:40px;;" size="20" readonly/></td>
                            <td><input name="text5" type="text" id="5" style="height:60px;width:190px;border:1px solid ;font-size:40px;" size="20" readonly/></td>
                            </tr>
                            <tr>
                            <td><input name="text6" type="text" id="6" style="height:60px;width:190px;border:1px solid ;font-size:40px;" size="28" readonly/></td>
                            <td><input name="text7" type="text" id="7" style="height:60px;width:190px;border:1px solid ;font-size:40px;" size="20" readonly/></td>
                            <td><input name="text8" type="text" id="8" style="height:60px;width:190px;border:1px solid ;font-size:40px;" size="20" readonly/></td>
                            <td><input name="text9" type="text" id="9" style="height:60px;width:190px;border:1px solid ;font-size:40px;" size="20" readonly/></td>
                            <td><input name="text10" type="text" id="10" style="height:60px;width:190px;border:1px solid ;font-size:40px;" size="20" readonly/></td>
                            </tr>
                            </table>
                        </div> 
                        </center>
                    </div>
                </div>
            </div>
        <div id="footer">
            &copy;若對尋寶活動有相關疑問，歡迎前來「學務處課指組」，我們很樂意為您解答，讓您加滿油</br>
            、尋寶去哦！ 加油地點：課外活動指導組（行政大禮堂二樓）/加油專線：07-615-8000#2152、2105
        </div>
        </div>
        </div>
    </body>
</html>
