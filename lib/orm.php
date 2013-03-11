<?
//file for database interactions
//function names are like noun_verb()
require_once('../config.php');
include_once('test.php');

//function_test('db_connect');

function db_connect() {
    global $CFG;
    $sql_connection = mysql_connect($CFG->dbhost,$CFG->dbuser,$CFG->dbpass);
    if($sql_connection) {
        mysql_select_db($CFG->dbname,$sql_connection);
        return $sql_connection;
    } else {
        return FALSE;
    }
}
?>
