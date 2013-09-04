<?
//file for database interactions
//function names are like noun_verb()

/* * * * * * * * get_formname * * * * *
*
* Returns the name of the form or pageForm, depending on the form was created
*/
function get_formname() {
    if(empty($_POST)) {
        return FALSE;
    } else {
        $keys = array_keys($_POST);
        $exploded_key = explode('-', $keys[0]);
        return $exploded_key[0];
    }
}

/* * * * * * * * get_postfrm and get_getform * * * * *
*
* Used to catch values from all forms, both get and post,
* returns submitted data or false
* input is a string, either '_POST' or '_GET', depending on which values are required
* use get_formdata for a generalized request
*/

function get_getdata() {
    if(empty($_POST)) {
        return FALSE;
    } else {
        return fix_utf8($_POST);
    }
}
function get_postdata() {
    if(empty($_POST)) {
        return FALSE;
    } else {
        return fix_utf8($_POST);
    }
}

function get_formdata(){
    if(empty($_REQUEST)) {
        return FALSE;
    } else {
        return fix_utf8($_REQUEST);
    }
}
/* * * * * * * *fix_utf8 * * * * *
*
*fixes utf8 issues for anything that has to go into database
* reminds me of wordpress find and replace on live edupristine's site
* created havoc with most stuff, takes inputs as single string, array or object
* has recursion for objects and arrays
*/
function fix_utf8($value) {
    if (is_null($value) or $value === '') {
        return $value;

    } else if (is_string($value)) {
        if ((string)(int)$value === $value) {
            // shortcut
            return $value;
        }
        return iconv('UTF-8', 'UTF-8//IGNORE', $value);

    } else if (is_array($value)) {
        foreach ($value as $k=>$v) {
            $value[$k] = fix_utf8($v);
        }
        return $value;

    } else if (is_object($value)) {
        $value = clone($value); // do not modify original
        foreach ($value as $k=>$v) {
            $value->$k = fix_utf8($v);
        }
        return $value;

    } else {
        // this is some other type, no utf-8 here
        return $value;
    }
}
/* * * * * * * *Convert_formdata_to_object * * * * *
* Converts formdata or any associated array into an object
* to_strip contains the initial few characters which are to be removed
* from keys of array and are not supposed to go into the object name
*/

function convert_formdata_to_object($arr, $to_strip, $has_many=0) {
//strip off second argument from keys of the array and then convert it into an     
//object or array of objects(in case third parameter is non zero)
//not very efficient algo right now :-/
    //has many code has some error with digits > 9
    $to_strip = $to_strip . '-';
    $keys = array_keys($arr);
    $new_keys = array();
    foreach($keys as $key) {
        $new_keys[] = str_replace($to_strip, '', $key);
    }
    $new_arr = array_combine($new_keys,array_values($arr));
    if($has_many==1) {
        $final_arr = array();
        for($i = 0; $i < count($new_arr); $i++) {
            $index = substr($new_keys[$i], -1);
            if(is_numeric($index)) {
                $final_key = rtrim($new_keys[$i], $index);
                if(isset($final_arr[$index])) {
                    $final_arr[$index]->$final_key = $new_arr[$new_keys[$i]];
                } else {
                    $final_arr[$index] = new stdClass;
                    $final_arr[$index]->$final_key = $new_arr[$new_keys[$i]];
                }
            } else {
                //either this is n or bad input
                $final_arr[$index] = $new_arr[$new_keys[$i]];
            }
        }
        //should return array of objects
        return $final_arr;
    } elseif($has_many == 0) {
        //should return an object
        return (object) $new_arr;
    } else {
        return 'wrong value of has_many';
    }
}

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

function db_disconnect($link) {
    return mysql_close($link);
}

    /**
     * Insert a record into a table and return the "id" field if required.
     *
     * Some conversions and safety checks are carried out. Lobs are supported.
     * If the return ID isn't required, then this just reports success as true/false.
     * $data is an object containing needed data
     * @param string $table The database table to be inserted into
     * @param object $data A data object with values for one or more fields in the record
     * @param bool $returnid Should the id of the newly created record entry be returned? If this option is not requested then true/false is returned.
     * @return bool|int true or new id
     * @throws dml_exception if error
     */
function insert_record($table, $dataobject, $returnid=true, $bulk=false) {
    $dataobject = (array)$dataobject;

    $columns = get_columns($table);
    $cleaned = array();

    foreach ($dataobject as $field=>$value) {
        if ($field === 'id') {
            continue;
            //ignore if id field is given in the dataobject
        }
        if (!in_array($field, $columns, TRUE)) {
            continue;
            //ignore if this field is not there in column
        }
        $column = $columns[array_search($field, $columns)];
        $cleaned[$field] = normalise_value($column, $value);
    }
    if($index = array_search('date_created', $columns)) {
        //[PENDING] - date not showing up in db
        $cleaned['date_created'] = time();
        $cleaned['date_modified'] = $cleaned['date_created'];
    }
    return insert_record_raw($table, $cleaned, $returnid, $bulk);
}

function insert_record_raw($table, $params, $returnid, $bulk) {
    if(!array($params)) {
        $params = (array) $params;
    }

    if(empty($params)) {
        //log error to no fields found
        return -1;
    }

    $fields = implode(',', array_keys($params));
    $values = implode(',', $params);

    $sql = "INSERT INTO $table ($fields) VALUES($values)";
    $link = db_connect();
    $resource = mysql_query($sql, $link);
    //add exception handling
    $id = mysql_insert_id($link);
    db_disconnect($link);
    return $id;
}
    /**
     * Normalise values based in RDBMS dependencies (booleans, LOBs...)
     *  Pending (all that is done in moodle, after get_columns is finished
     *
     */
function normalise_value($column, $value) {
    if (is_bool($value)) { // Always, convert boolean to int
        $value = (int)$value;
    }
    if (is_string($value)) {
        $value = "'$value'"; //Add singlequotes around the string
    }
    return $value;
}

/**
*
* returns array of columns in the given table and a key 'n'
* whose value is total number of columns in the table.
*/
function get_columns($table) {
    $sql = "SHOW COLUMNS FROM $table";
    $link = db_connect();
    $resource = mysql_query($sql, $link);
    $column = array();
    $n = 0;
    while ($row = mysql_fetch_array($resource)) {
        $column[] = $row['Field'];
        $n = $n + 1;
    }
    db_disconnect($link);
    $column['n'] = $n;
    //stre the results in an array
    //return only columns for now, rest of the parameters later
    return $column;
}

function insert_record_from_postform($table) {
    $form_data_raw = get_postdata();                                                                   
    $form_name = get_formname();                                                                       
    $form_data_as_object = convert_formdata_to_object($form_data_raw, $form_name);                     
    $id = insert_record($table, $form_data_as_object);
    return $id;
}
?>
