<?php
header("Content-Type:application/json; charset=utf-8");
require_once('loader.php');

# check params
if( !isset($_POST['action']) )
    print_response_msg( 0 );

# login
if ( $_POST['action']=='login' && !check_login_status( false ) )
    login( $_POST['uacc'], $_POST['upwd'] );

check_login_status();

switch($_POST['action']){
    case 'get_sessionData':
        $result = get_sessionData();
        print_response_msg(
            ( is_array($result) ? 4 : 5 ),
            ( is_array($result) ? $result : null )
        );
    break;

    case 'get_record':
        $result = get_record();
        print_response_msg(
            ( is_array($result) ? 4 : 5 ),
            ( is_array($result) ? $result : null )
        );
    break;
    
    case 'update_record':
        $result = update_record($_POST['column'] );
        print_response_msg(
            ( $result ? 4 : 5 )
        );
    break;

    case 'logout':
        logout();
        print_response_msg(4);
    break;

    default:
        print_response_msg(0);
    break;
}