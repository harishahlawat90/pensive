<?
//file for testing functions
include_once('../config.php');

include_once('orm.php');

function function_test($function_name, $input=null) {
//[Pending] - Echo test passed output false  / whatever is outcome and output failed when function breaks. Give option of giving inputs to funcitons also
	if($input==null) {
		$input = array();
	}
	if(empty($input)) {
    	$output = $function_name();
	} else {
		$output = call_user_func_array($function_name, $input);
	}
    if($output) {
        echo 'test passed Outuput is :<pre>';
        print_r($output);
        echo '</pre>';
    } else {
        echo 'test failed';
    }
}



?>
