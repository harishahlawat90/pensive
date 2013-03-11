<?php
//include_once('test.php');
//function_test('print_header');
function print_header($title='pensive') {
    global $CFG;
    $output = "<html><head>";
    $output = $output . "<title> $title </title>";
    $output = $output . "</head>";
    $output = $output . '<link rel="stylesheet" href="' . $CFG->wwwroot . '/bootstrap/css/bootstrap-responsive.css" media="all">';
    $output = $output . '<link rel="stylesheet" href="' . $CFG->wwwroot . '/bootstrap/css/bootstrap-responsive.min.css" media="all">';
    $output = $output . "<body>";
    $output = $output . '<div class="container">';
    return $output;
}
