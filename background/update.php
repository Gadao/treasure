<?php
require_once('function_web.php');
require_once('../mobile/loader.php');
header("Content-Type:text/html; charset=utf-8");
if( !isset($_POST['uacc']) )
    header("location:insert.php");
$_SESSION['uacc'] = $_POST['uacc'];
$uacc = $_POST['uacc'];
$sql_select = "SELECT account from record where account like '%".$_POST['uacc']."%'";
if( $db->query($sql_select) ){
	echo    "<script language=javascript>
            confirm('學號 : ".$uacc." ,在資料庫已經有資料,請問是否要讓此學號重新修改資料!!');
            window:location.href='update_olddata.php';
            </script>";
}
else{
$uacc = $_POST['uacc'];
$login = json_decode(file_get_contents_curl('http://apit.cedric.testapi-1.stu.edu.tw/acc/retrieve/uacc/'.$uacc.'/apikey/59caf5091e5c1fadb987074e332da31f0d6db2ef'),true);
$requirement = $login['0']['SEC_SNAME'];
$sql = "INSERT INTO record values('null','$uacc','$requirement','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','103')";
if($db->query($sql)){
    echo    "<script language=javascript>
            alert('學號 : ".$uacc." ,新增成功!!');
            window:location.href='insert.php';
            </script>";
}
else{
    echo    "<script language=javascript>
            alert('學號 : ".$uacc." ,新增失敗 ,可能資料庫上有同樣的學號登入!!');
            window:location.href='insert.php';
            </script>";
}
}