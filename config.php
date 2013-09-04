<?php

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'library';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'hola';

$CFG->wwwroot = 'http://localhost/library';
