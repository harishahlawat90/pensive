<?php 
include_once('config.php');
include('lib/orm.php');

$form_data_raw = get_postdata();
$form_name = get_formname();
$form_data_as_object = convert_formdata_to_object($form_data_raw, $form_name);
$id = insert_record('articles', $form_data_as_object);
print_r($id);
?>
