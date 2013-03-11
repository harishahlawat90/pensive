<?php

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'pensive';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'hola';

$CFG->wwwroot = 'http://localhost/sandbox/pensive';
