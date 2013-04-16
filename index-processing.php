<?php 
include_once('config.php');
include('lib/orm.php');

$id = insert_record_from_postform('articles');
print_r($id);
?>
