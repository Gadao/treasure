<?php
require_once('function_web.php');
require_once('../mobile/loader.php');
header("Content-Type:text/html; charset=utf-8");
if( !isset($_SESSION['uacc']) )
    header("location:insert.php");
$uacc = $_SESSION['uacc'];
unset($_SESSION['uacc']);
$login = json_decode(file_get_contents_curl('http://apit.cedric.testapi-1.stu.edu.tw/acc/retrieve/uacc/'.$uacc.'/apikey/59caf5091e5c1fadb987074e332da31f0d6db2ef'),true);
$requirement = $login['0']['SEC_SNAME'];
$sql_delete = "DELETE FROM record where account like '%".$uacc."%'";
$db->query($sql_delete);
$sql = "INSERT INTO record values('null','$uacc','$requirement','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','103')";
if($db->query($sql)){
    echo    "<script language=javascript>
            alert('學號 : ".$uacc." ,新增成功!!');
            window:location.href='insert.php';
            </script>";
}
else{
    echo    "<script language=javascript>
            alert('學號 : ".$uacc." ,新增失敗!!');
            window:location.href='insert.php';
            </script>";
}