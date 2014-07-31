<?php
    require_once("../mobile/loader.php");
    $arr=array("0"=>"未通過","1"=>"通過");
    // print_r(sql_q("SELECT * FROM record"));
     $sth=$db->prepare("SELECT * FROM record");
     $sth->execute();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>樹德科技大學-校園尋寶大發現</title>
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <meta ContentType=html/text; charset=utf-8>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script >
        $(function(){
        $( ".dialog-message" ).dialog({
                autoOpen:false,
                modal: true,
                height:600,
                width: 400,
                buttons:{
                    "OK":function(){
                        $(this).dialog("close");
                    }
                }
            }); 
            $(".open-message").click(function(){
                    var msg = $(this).parent().next().html();
                    $(".surre" ).html(msg),
                    $( ".dialog-message" ).dialog( "open" );
            });  
            $(".tablesorter").tablesorter({sortList: [[2,1]]}); 
        });
        </script>
    </head>
    <body >
        <div id="outer">
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <img src="./image/title.png"></img>
                </div>
            </div>
            <div class="dialog-message" title="詳細資料">
                <table class="table " style="border-style:solid;">
                    <td class="surre">
                    </td>
                </table>
            </div>
            <div id="page">
                <center><h3>學生藏寶圖資料進度</h3></center>
                <center><input type="button" class="btn btn-primary " onclick="window:location.href='excel_output.php?action=excel'" value="匯出EXCEL檔案" /></li></center>
                <div id="content">
                <table class="table tablesorter table-striped table-condensed table-bordered">
                    <thead>     
                        <th > 校務帳號 </th> 
                        <th > 系所 </th> 
                        <th > 通過關數 </th> 
                        <th > 是否通過 </th>
                        <th > 資訊 </th>
                    </thead>
                    <tbody>
                        <?php
                        while($dt=$sth->fetch(PDO::FETCH_ASSOC))
                        {
                        ?>
                        <tr>
                            <td><?php echo $dt['account']; ?></td>
                            <td><?php echo $dt['dep']; ?></td>
                            <td><?php echo count_record($dt['record_id']); ?></td>
                            <td><?php if(count_record($dt['record_id'])=='25')echo $arr['1']; else echo $arr['0'];?></td>
                            <td><button class="btn open-message btn-primary" value="<?php echo $dt['record_id']; ?>">詳細資料</button></td>
                            <td style="display:none;"><table class="table">
                            <tr><thead><th>欄位</th><th>資料</th></thead></tr>
                            <tr><th>各系系辦</th><td><?php echo $arr[$dt['edo']]; ?></td></tr>
                            <tr><th>總務處文書組</th><td><?php echo $arr[$dt['swn']]; ?></td></tr>
                            <tr><th>教務處課指組</th><td><?php echo $arr[$dt['cgcs']]; ?></td></tr>
                            <tr><th >健促中心</th><td><?php echo $arr[$dt['health']]; ?></td></tr>
                            <tr><th>教務處註冊組</th><td><?php echo $arr[$dt['cgrs']]; ?></td></tr>
                            <tr><th>兩岸合作交流處</th><td><?php echo $arr[$dt['obsce']]; ?></td></tr>
                            <tr><th>校安中心</th><td><?php echo $arr[$dt['mid']]; ?></td></tr>
                            <tr><th>學務處生輔組</th><td><?php echo $arr[$dt['life']]; ?></td></tr>
                            <tr><th>電算中心</th><td><?php echo $arr[$dt['ecc']]; ?></td></tr>
                            <tr><th>學務處課指組</th><td><?php echo $arr[$dt['activity']]; ?></td></tr>
                            <tr><th>學務處校友中心</th><td><?php echo $arr[$dt['alumnus']]; ?></td></tr>
                            <tr><th>學務處諮商中心</th><td><?php echo $arr[$dt['ccdc']]; ?></td></tr>
                            <tr><th>總務處出納組</th><td><?php echo $arr[$dt['scs']]; ?></td></tr>
                            <tr><th>公共事務室</th><td><?php echo $arr[$dt['pam']]; ?></td></tr>
                            <tr><th>總務處事務組</th><td><?php echo $arr[$dt['sgas']]; ?></td></tr>
                            <tr><th>總務處環安組</th><td><?php echo $arr[$dt['seass']]; ?></td></tr>
                            <tr><th>總務處營繕組</th><td><?php echo $arr[$dt['scams']]; ?></td></tr>
                            <tr><th>圖書館</th><td><?php echo $arr[$dt['lib']]; ?></td></tr>
                            <tr><th>進修推廣部</th><td><?php echo $arr[$dt['nac']]; ?></td></tr>
                            <tr><th>教學中心</th><td><?php echo $arr[$dt['tlrc']]; ?></td></tr>
                            <tr><th>國際事務處</th><td><?php echo $arr[$dt['iad']]; ?></td></tr>
                            <tr><th>統一美食廣場</th><td><?php echo $arr[$dt['upr']]; ?></td></tr>
                            <tr><th>體育室</th><td><?php echo $arr[$dt['peo']]; ?></td></tr>
                            <tr><th>語文中心</th><td><?php echo $arr[$dt['lcc']]; ?></td></tr>
                            <tr><th>藝文中心</th><td><?php echo $arr[$dt['mac']]; ?></td></tr>
                            <tr><th>學年</th><td><?php echo $dt['year']; ?></td></tr>
                        </table></td>
                        </tr>
                        <?php }?>
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
