<?php
require_once('config.php');
require_once('lib/output_html.php');
print_header('Pensive 0.1');
?>
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
<?php
print_footer();
?>
