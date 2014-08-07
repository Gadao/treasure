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
                <center><h3>管理介面-紙本通關同學新增至資料庫</h3></center>
                <div id="content">
                    <form action="update.php" class="form-horizontal" name ="form1" method="POST" role="form">
                        <table class="login_table">
                            <tr><td class="login_td"><label ><h3>學生帳號</h3></label></td><td><input class="form-control" type = "text" name="uacc"></td></tr>
                            <tr><td></td><td><input type = "submit" class="btn btn-large btn-success" value="送出" ></td></tr>
                        </table>
                    </form>
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
