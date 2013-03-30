<?
//file for testing functions
require 'kint/Kint.class.php';
include_once('../config.php');

include_once('orm.php');

function function_test($function_name) {
//[Pending] - Echo test passed output false  / whatever is outcome and output failed when function breaks. Give option of giving inputs to funcitons also
    $output = $function_name();
    if($output) {
        echo 'test passed Outuput is :';
        d($output);
    } else {
        echo 'test failed';
    }
}

?>
