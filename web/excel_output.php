<?php
if ($_GET['action'] == 'excel') {
    $filename="treasure_data.xls";
    header("Content-disposition: filename=$filename");
    header("Content-type: application/octetstream");
    header("Pragma: no-cache");
    header("Expires: 0");
}
require_once("../mobile/loader.php");
$arr=array("0"=>"未通過","1"=>"通過");
$sth=$db->prepare("SELECT * FROM record");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
?>

<html >
    <body >
        <form action="">
            <input type="submit" name="action" value="excel">
        </form>
        <table border="1">
            <tr>
                <td> 校務帳號 </td> 
                <td> 系所 </td> 
                <td> 通過關數 </td> 
                <td> 是否通過 </td>
                <td> 學年</td>
                <td> 各系系辦 </td>
                <td> 總務處文書組 </td>
                <td> 教務處課務組 </td>
                <td> 學務處健康促進中心 </td>
                <td> 教務處註冊組 </td>
                <td> 兩岸合作交流處 </td>
                <td> 校安中心 </td>
                <td> 學務處生輔組 </td>
                <td> 電算中心 </td>
                <td> 學務處課指組 </td>
                <td> 學務處校友中心 </td>
                <td> 學務處諮商與生涯發展中心 </td>
                <td> 總務處出納組 </td>
                <td> 公共事務室 </td>
                <td> 總務處事務組 </td>
                <td> 總務處環安組 </td>
                <td> 總務處營繕組 </td>
                <td> 圖書館 </td>
                <td> 進修推廣部 </td>
                <td> 教學與學習資源中心 </td>
                <td> 國際事務處 </td>
                <td> 統一美食廣場 </td>
                <td> 體育室 </td>
                <td> 語文中心 </td>
            </tr>
            <?php foreach($result as $key => $dt): ?>
            <tr> 
                <td><?=$dt['account'];?></td>
                <td><?=$dt['dep'];?></td>
                <td><?=count_record($dt['record_id']);?></td>
                <td><?php if(count_record($dt['record_id'])=='25')echo $arr['1']; else echo $arr['0'];?></td>
                <td><?=$arr[$dt['edo']];?></td>
                <td><?=$arr[$dt['swn']];?></td>
                <td><?=$arr[$dt['cgcs']];?></td>
                <td><?=$arr[$dt['health']];?></td>
                <td><?=$arr[$dt['cgrs']];?></td>
                <td><?=$arr[$dt['obsce']];?></td>
                <td><?=$arr[$dt['mid']];?></td>
                <td><?=$arr[$dt['life']];?></td>
                <td><?=$arr[$dt['ecc']];?></td>
                <td><?=$arr[$dt['activity']];?></td>
                <td><?=$arr[$dt['alumnus']];?></td>
                <td><?=$arr[$dt['ccdc']];?></td>
                <td><?=$arr[$dt['scs']];?></td>
                <td><?=$arr[$dt['pam']];?></td>
                <td><?=$arr[$dt['sgas']];?></td>
                <td><?=$arr[$dt['seass']];?></td>
                <td><?=$arr[$dt['scams']];?></td>
                <td><?=$arr[$dt['lib']];?></td>
                <td><?=$arr[$dt['nac']];?></td>
                <td><?=$arr[$dt['tlrc']];?></td>
                <td><?=$arr[$dt['iad']];?></td>
                <td><?=$arr[$dt['upr']];?></td>
                <td><?=$arr[$dt['peo']];?></td>
                <td><?=$arr[$dt['lcc']];?></td>
                <td><?=$arr[$dt['mac']];?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
