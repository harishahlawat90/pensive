<?php  include('config.php');  ?>
<h1> Add new books to Library </h1>
<form name="uploadcsv" action=addbooks.php method=post enctype="multipart/form-data">
<input type="file" name="uploadcsv-file" id="file"> 
<input type="submit" name="uploadcsv" value="Submit">
</form>


<?php
if(isset($_REQUEST['uploadcsv'])) {
    $uploaddir = '/var/www/library/temp/';
    $uploadfile = $uploaddir . 'file.csv';
    if (move_uploaded_file($_FILES['uploadcsv-file']['tmp_name'], $uploadfile)) {
        //success in uploading file
        //1. read the uploaded csv
	$row = 1;
	$books = array();
	
	if (($handle = fopen("temp/file.csv", "r")) !== FALSE) {
    	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        	$books[] = $data;
    	}
    	fclose($handle);
        //2. echo each and every line
        //3. Ask to choose which ones to upload, with select all option
    } else {
        echo "Possible file upload attack!\n";
    }

}
?>
