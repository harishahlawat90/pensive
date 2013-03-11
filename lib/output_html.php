<?php
//include_once('test.php');
//function_test('print_header');
function print_header($title='pensive') {
    global $CFG;
    $output = "<html><head>";
    $output = $output . "<title> $title </title>";
    $output = $output . "</head>";
    $output = $output . "<body>";
    $output = $output . '<link rel="stylesheet" href="' . $CFG->wwwroot . '/bootstrap/css/bootstrap.css" media="all">';
    $output = $output . '<link rel="stylesheet" href="' . $CFG->wwwroot . '/bootstrap/css/bootstrap-responsive.min.css" media="all">';
    $output = $output . '<div class="container">';
    echo $output;
}

function print_footer() {
    global $CFG;
    $output = "</div>"; //ending container
    $output = $output . '<script src="' . $CFG->wwwroot . '/bootstrap/js/bootstrap.min.js"></script>';
    $output = $output . '</body></html>';
    echo $output;
}
