<?
//file for database interactions
//function names are like noun_verb()
////error_reporting(-1);
//ini_set('display_errors', '1');

//    print_r('hola');

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
