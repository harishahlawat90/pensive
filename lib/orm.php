<?
//file for database interactions
//function names are like noun_verb()
/* *
*
* Used to catch values from all forms, both get and post,
* returns submitted data or false
* input is a string, either '_POST' or '_GET', depending on which values are required
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
function get_getform() {
    if(empty($_POST)) {
        return FALSE;
    } else {
        return fix_utf8($_POST);
    }
}
function get_postform() {
    if(empty($_POST)) {
        return FALSE;
    } else {
        return fix_utf8($_POST);
    }
}

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

function convert_formdata_to_object($arr, $to_strip, $has_many=0) {    
//strip off second argument from keys of the array and then convert it into an     object or array of objects(in case third parameter is non zero)
//not very efficient algo right now :-/    
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
?>
