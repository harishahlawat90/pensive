<?
//file for testing functions
require_once('config.php');
include_once('lib/db.php');

function function_test($function_name) {
//[Pending] - Echo test passed result false  / whatever is outcome and result failed when function breaks. Give option of giving inputs to funcitons also
    $result = $function_name();
    if($result) {
        echo 'test passed';
    } else {
        echo 'test failed';
    }
}



function test_db_connect() {
    $connection = db_connect();
    if($connection) {
        echo 'connected';
    } else {
        echo 'not connected';
    }
}


?>
