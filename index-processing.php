<?php 
include('lib/test.php');
include('lib/orm.php');

$form_data_raw = get_postform();
$form_name = get_formname();
$form_data_as_object = convert_formdata_to_object($form_data_raw, $form_name);
print_r($form_data);


?>
