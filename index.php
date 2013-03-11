<html>
<head> 
  <title> Pensive 0.1 </title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" media="all">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="all">
</head>
<body>
  <div class="container">
  <div class="row-fluid">
  <p class="lead"> Pensive 0.1 </p>
  <div class="span7">
    <form id="add" method="post" action="index-processing.php">
    <input type="text" name="add-title" class="input-block-level"  
           placeholder="Title"><br>
    <textarea class="input-block-level" rows="10" placeholder="Article" 
              name="add-text"></textarea></br>
    <input class="btn btn-success" type="submit" name="add-submit" 
           value="Add New Article">
    </form>
  </div> <!-- span8 ending -->
  <div class="span4">
<!--    <a href=""> First Article </a></br>
    <a href=""> Second Article </a></br>
    <a href=""> Third Article </a></br>
    <a href=""> 4th Article </a></br>
    <a href=""> Five Article </a></br> -->
  </div> <!-- span4 ending -->
  </div> <!-- row-fluid ending -->
  </div> <!-- container ending -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
