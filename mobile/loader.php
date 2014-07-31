<?php
# 檢查 config
$root_dir = str_replace('\\', '/', dirname(__FILE__) ).'/';
if ( !file_exists($root_dir.'/config.php') ){
    echo 'The system folder are missing file "config.php", you can copy config.sample.php and rename to config.php, don\'t forget change config content!';
    exit;
}

require_once('config.php');
require_once('base_function.php');

define( 'FOLDER_NAME',  get_folderName() );

# 自定義錯誤處理
set_error_handler('error_handler');

# 建立資料庫連線
global $db;
$db = new PDO(
    'mysql:host='.DB_HOST.';dbname='.DB_NAME.';',
    DB_USERNAME, DB_PASSWORD,
    array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'" ));
require_once('function.php');

start_session(1800);