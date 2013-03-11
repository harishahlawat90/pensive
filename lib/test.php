<?
//file for testing functions
require 'kint/Kint.class.php';

function function_test($function_name) {
//[Pending] - Echo test passed result false  / whatever is outcome and result failed when function breaks. Give option of giving inputs to funcitons also
    $result = $function_name();
    if($result) {
        echo 'test passed Outuput is :';
        d($result);
    } else {
        echo 'test failed';
    }
}

?>
