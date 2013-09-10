<?
//file for testing functions
include_once('../config.php');

include_once('orm.php');

function function_test($function_name, $input=null, $errors=null) {
//[Pending] - Echo test passed output false  / whatever is outcome and output failed when function breaks. Give option of giving inputs to funcitons also
	if($input==null) {
		$input = array();
	}
	if($errors==null) {
		$errors = array(-1);
	}
	if(empty($input)) {
    	$output = $function_name();
	} else {
		$output = call_user_func_array($function_name, $input);
	}

    if(!in_array($output, $errors)) {
        echo 'test passed Outuput is :<pre>';
        print_r($output);
        echo '</pre>';
    } else {
        echo 'test failed';
    }
}

// function one($one, $two, $three) {
// 	return "hola . $one . $two" . serialize($three);

// }

// function_test("one", array("one", "two", array("gollum", "ate", "fish")));
?>
