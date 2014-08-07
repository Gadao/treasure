<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>樹德科技大學-校園尋寶大發現</title>
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <meta ContentType=html/text; charset=utf-8>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body >
        <div id="outer">
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <img src="./image/title.png"></img>
                </div>
            </div>
            <div id="page">
                <center><h3>管理系統登入畫面</h3></center>
                <div id="content">
                    <form action="../mobile/service.php" class="form-horizontal" name ="form1" method="POST" role="form">
                        <table class="login_table">
                        <tr><td class="login_td"><label ><h3>帳號</h3></label></td><td><input class="form-control" type = "text" name="uacc"></td></tr>
                        <tr><td class="login_td"><label ><h3>密碼</h3></label></td><td><input class="form-control" type = "password" name="upwd"></td></tr>
                        <tr><td></td><td><input type = "submit" class="btn btn-large btn-success" value="登入" ></td></tr>
                        </table>
                        <input type="hidden" name="action_web" value="login">
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
