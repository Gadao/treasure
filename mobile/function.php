<?php
/* 登入
Params:
    uacc: 帳號
    upwd: 密碼
Returns:
    無回傳值，直接輸出結果並終止程式
*/
function login( $uacc, $upwd ){
    $login = (array)json_decode(
        file_get_contents(
            'http://apit.cedric.testapi-1.stu.edu.tw/acc/auth/uacc/'.$uacc.'/?upwd='.$upwd.'/apikey/59caf5091e5c1fadb987074e332da31f0d6db2ef',
            true
        )
    );

    # Authentication fail.
    if ( $login['status'] )
        print_response_msg(3);

    # Analyze data.
    $ou_group;
    $start_tag = "ou=";
    $close_tag = ",";
    preg_match_all("($start_tag(.*)$close_tag)siU", $login['dn'], $ou_group);

    # If login user not is student, this column value set 0.
    if ( !preg_match('/\d{2,3}/', $ou_group[1][0]) )
        $ou_group[1][0] = 0;

    # Get record data.
    $sql = "SELECT record_id FROM record WHERE account=? ";
    $record_id = sql_q( $sql, array($login['uacc']) );

    # If this account not have play record in database, insert new row to database.
    if ( !count($record_id) ) {
        $addRecord = add_record(
            $login['uacc'],
            $ou_group[1][1]
        );
        if ( $addRecord )
            $record_id = sql_q( $sql, array($login['uacc']) );
        else
            print_response_msg(5);
    }

    # Session content
    $profile = array(
        'record_id' => $record_id[0]['record_id'],
        'account'   => $login['uacc'],
        'name'      => $login['uname'],
        'dep'       => $ou_group[1][1]
    );

    # Define session
    $_SESSION[ session_id() ] = $profile;

    # Print login success message and session data.
    print_response_msg( 2, $profile );
}


function logout() {
    unset( $_SESSION[ session_id() ] );
}


function add_record( $account, $dep ) {
    $sql = "INSERT INTO record(
            account,
            dep
        ) VALUES(?,?) ";
    $array = array(
        $account,
        $dep
    );

    return sql_i( $sql, $array );
}


/* 取得闖關記錄
Params:
    None
Returns:
    Array
*/
function get_record() {
    $sessionData = get_sessionData();

    # Get record
    $sql = "SELECT * FROM record WHERE record_id=? ";
    $result = sql_q( $sql, array( $sessionData['record_id'] ) );

    # Unset unnecessary data.
    unset( $result[0]['record_id'] );
    unset( $result[0]['account'] );
    unset( $result[0]['dep'] );

    return $result;
}


/* 更新闖關記錄
Params:
    column: 更新欄位 (關卡名稱)
Returns:
    Boolean
*/
function update_record( $column ){
    # SQL Injection examine
    if ( strlen($column) > 8 )
        return false;
    for ( $i=0 ; $i<strlen($column) ; $i++ )
        if ( ($column{$i} < 'a') || ($column{$i} > 'z') )
            return false;

    $sessionData = get_sessionData();
    $sql = "UPDATE record SET ".$column."='1' WHERE record_id=? ";

    return sql_i( $sql, array( $sessionData['record_id'] ) );
}
/* 取得闖關官數
Params:
    record_id: 查詢關卡數量
Returns:
    回傳數量
*/
function count_record( $record_id ){
    $sql = "SELECT edo,swn,cgcs,health,cgrs,obsce,mid,life,ecc,activity,alumnus,ccdc,scs,pam,sgas,seass,scams,lib,nac,tlrc,iad,upr,peo,lcc,mac FROM record WHERE record_id=? ";
    $result = sql_q( $sql, array( $record_id ) );
    $count=0;
    foreach ($result as $key ) {
        foreach($key as $vs => $value){
            if($value=='1')
            $count++;
        }
    }
    return $count;
} 
