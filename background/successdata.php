<?php
    require_once("../mobile/loader.php");
    //此陣列是各系所闖關通過的人數
    $requirement = array();
    $row = $db->query( "SELECT record_id,dep FROM record" );
    while( $dt=$row->fetch(PDO::FETCH_ASSOC) ){
        if( count_record($dt['record_id'])=='25' )
            array_push( $requirement, $dt['dep'] );
    }
    $requirement = array_count_values( $requirement );
    //此陣列是計算系所闖關總人數,通過沒通過都包含 ex資工系三個,設計系五個
    $requirement_num = array();
    $num = $db->query( "SELECT dep FROM record" );
    while( $dt=$num->fetch(PDO::FETCH_ASSOC) ){
        array_push( $requirement_num, $dt['dep'] );
    }
    $requirement_num = array_count_values($requirement_num);
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
        <script type="text/javascript" src="../web/js/jquery.tablesorter.js"></script>
        <script >
        $(function(){
            $(".tablesorter").tablesorter({sortList: [[2,1]]}); 
        });
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
                        <li><a href="alldata.php"> 所有學生資料 </a></li>
                        <li><a href="insert.php"> 新增通關同學資料 </a></li>
                        <li><a href="successdata.php"> 系所通過成功率 </a></li>
                        <li><a href="lotto.php">開獎系統</a></li>
                    </ul>
                </div>
            </div>
            <div id="page">
                <center><h3>系所通過成功率</h3></center>
                <div id="content">
                    <table class="table tablesorter table-striped table-condensed table-bordered">
                        <thead>
                            <th > 參加系所 </th> 
                            <th > 通關人數 </th> 
                            <th > 總人數 </th> 
                            <th > 通過百分率 </th>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ( $requirement_num as $key => $value ) {
                                if( array_key_exists( $key,$requirement ) ){
                                    $hundred = number_format( $requirement[$key]/$value , 2 ) * 100;
                                    echo "<tr><td>".$key."</td>"."<td>".$requirement[$key]."</td>"."<td>".$value."</td>"."<td>".$hundred."%</td></tr>";
                                }
                                else
                                    echo "<tr><td>".$key."</td>"."<td>0</td>"."<td>".$value."</td>"."<td>0%</td></tr>";   
                            }
                            ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="footer">
            &copy;若對尋寶活動有相關疑問，歡迎前來「學務處課指組」，我們很樂意為您解答，讓您加滿油</br>
            、尋寶去哦！ 加油地點：課外活動指導組（行政大禮堂二樓）/加油專線：07-615-8000#2152、2105
        </div>
        </div>
    </body>
</html>
