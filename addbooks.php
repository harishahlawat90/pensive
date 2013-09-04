<?php  include('config.php');  ?>
<head>
<title>Bootstrap 101 Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
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
    		$columns = $books[0]; ?> 
    		<table class="table table-condensed table-hover">
    		<form name="addbooks" action="addbooks.php" method="post">
    		<tr>
    		<?php
    		$header = $books[0];
    		for ($i=0; $i<count($header); $i++) {
    			echo '<th>' . $header[$i] . '</th>';
    		} ?>
    		<th> <input type="checkbox" id="all"> all </input> </th>s
    		</tr> 
    		<?php
    		for ($i = 1; $i < count($books); $i++) { ?>   			
    				<tr>
    					<?php
    						for ($j = 0; $j < 5; $j++) {
    							echo '<td>' . $books[$i][$j] . '</td>';
    						}
    					?>
    					<td><input type="checkbox" name="addbooks-<?php echo $books[$i][0]; ?>"> </td>
    				</tr>

    		<?php
    		}
    		?>
    		</table>
    		<input type="submit" name="addbooks" value="submit">
    		</form>
    		<?php
        //3. Ask to choose which ones to upload, with select all option
    	} else {
	        echo "Possible file upload attack!\n";
    	}
    }
}

if(isset($_REQUEST['addbooks'])) {
	print_r($_REQUEST);
}
    		// echo "<pre>";
    		// print_r($books);
    		// echo "</pre>";
?>
<script src="bootstrap/assets/js/jquery.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $("input[type=checkbox]").not("#all").click(function(e) {
    if (!this.checked) { 
      $("#all")[0].checked = false; 
    }
  });

  $("#all").click(function(e) {
    var that = this;
    $("input[type=checkbox]").not("#all").each(function() {
       this.checked = that.checked; 
    });
  });
</script>
</body>