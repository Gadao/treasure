<?php
/* 資料查詢
Params:
    sql: SQL指令
    sql_array: 資料陣列
Returns:
    Array
*/
function sql_q( $sql, $sql_array ){
    global $db;
    $sth = $db -> prepare($sql);
    $sth -> execute($sql_array);
    if( $sth -> errorCode() != '00000' ){
        $error = $sth -> errorInfo();
        $error_msg = "SQL syntax error.\nSQL Error Code: ".$error[1]."\nSQL Error Msg: ".$error[2];
        trigger_error($error_msg, E_USER_ERROR);
        return false;
    }
    $sth->setFetchMode(PDO::FETCH_ASSOC);

    $result = filter_var_array($sth -> fetchAll(), FILTER_SANITIZE_MAGIC_QUOTES);

    if( count($result) == 0 )
        $result = array();

    return $result;
}


/* 資料寫入、更新、刪除
Params：
    sql: SQL指令
    sql_array: 資料陣列
Returns：
    Boolean
*/
function sql_i( $sql, $sql_array ){
    global $db;
    $sth = $db -> prepare($sql);
    $sth -> execute($sql_array);
    if( $sth -> errorCode() != '00000' ){
        $error = $sth -> errorInfo();
        $error_msg = "SQL syntax error.\nSQL Error Code: ".$error[1]."\nSQL Error Msg: ".$error[2];
        trigger_error($error_msg, E_USER_ERROR);
        return false;
    }

    return true;
}

/* 取得系統目錄名稱
Params:
    None
Returns:
    Folder name string
*/
function get_folderName() {
    $arr = explode('\\', dirname(__FILE__));
    return $arr[count($arr)-1];
}


/* 取得系統完整URL
Params:
    None
Returns:
    URL string
*/
function get_webPathUrl() {
    return substr( $_SERVER['REQUEST_URI'], 0, strpos( $_SERVER['REQUEST_URI'], FOLDER_NAME)+strlen( FOLDER_NAME ) ).'/';
}


/* 啟動session
Params:
    expire: 到期時間(秒) (Optional)
Returns:
    None
*/
function start_session($expire = 0){
    if ($expire == 0) {
        $expire = ini_get('session.gc_maxlifetime');
    } else {
        ini_set('session.gc_maxlifetime', $expire);
    }

    if (empty($_COOKIE['PHPSESSID'])) {
        session_set_cookie_params($expire);
        session_start();
    } else {
        session_start();
        setcookie('PHPSESSID', session_id(), time() + $expire);
    }
}


/* 確認登入狀態
Params:
    print_msg: session timeout時是否輸出訊息 (Optional)
Returns:
    Boolean
*/
function check_login_status( $print_msg = true ){
    if ( isset( $_SESSION[ session_id() ] ) ) {
        # setcookie( session_name(), $_COOKIE[ session_name() ], time()+1800, get_webPathUrl() );
        setcookie( session_name(), $_COOKIE[ session_name() ], time()+1800 );
        return true;
    } else {
        if ( $print_msg )
            print_response_msg(1);
        return false;
    }
}


/* 取得session資料
Params:
    None
Returns:
    一維陣列
*/
function get_sessionData() {
    return isset( $_SESSION[ session_id() ] ) ? $_SESSION[ session_id() ] : false;
}


/* 錯誤處理
*/
function error_handler( $error_level, $error_message, $error_file, $error_line, $error_context ) {
    $err_msg = $error_message." in ".$error_file." Line ".$error_line;
    print_response_msg( 9, $err_msg );

    if ( $error_level > 8 )
        die();
}


/* 資料輸出
Params:
    type: 回應類型，請參考 msg
    data: 附帶資料，無資料時不傳入此參數或傳入null (Optional)
Returns:
    直接輸出無回傳
*/
function print_response_msg( $type, $data=null ) {
    $msg = array(
        0 => array(
            'code' => 0,
            'msg' => 'Not have any action.'
        ),
        1 => array(
            'code' => 1,
            'msg' => 'Not have login or session timeout.'
        ),
        2 => array(
            'code' => 2,
            'msg' => 'Login success.'
        ),
        3 => array(
            'code' => 3,
            'msg' => 'Login fail.'
        ),
        4 => array(
            'code' => 4,
            'msg' => 'Operation success.'
        ),
        5 => array(
            'code' => 5,
            'msg' => 'Operation fail. Please contact the administrator.'
        ),
        9 => array(
            'code' => 9,
            'msg' => 'System Error.'
        )
    );

    $requestResult = $msg[ $type ];
    $requestResult['data'] = $data;

    echo json_encode( $requestResult );
    exit;
}
