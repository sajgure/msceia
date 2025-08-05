<?php 
/*
-------------------------------------------------------------
Author 	: Sumit Darbeshwar				Date: 19 Apr 17
-------------------------------------------------------------
Purpose:insert after the string 1st occurance
ToDo:
Refrence:
http://stackoverflow.com/questions/4530571/how-do-you-insert-characters-after-the-first-occurrence-of-a-word-or-phrase-in-a
http://codepad.org/LJIWedZv
*/
function str_insert($str, $search, $insert) 
{
    $index = strpos($str, $search);
    if($index === false) {
        return $str;
    }
    return substr_replace($str, $search.$insert, $index, strlen($search));
}
/*
-------------------------------------------------------------
Author 	: Sumit Darbeshwar				Date: 19 Apr 17
-------------------------------------------------------------
Purpose:Reset array numeric indexces 
ToDo:
Refrence:
http://stackoverflow.com/questions/6990970/reset-array-keys-in-multidimensional-array
*/
function fix_keys($array) {
    $numberCheck = false;
    foreach ($array as $k => $val) {
        if (is_array($val)) $array[$k] = fix_keys($val); //recurse
        if (is_numeric($k)) $numberCheck = true;
    }
    if ($numberCheck === true) {
        return array_values($array);
    } else {
        return $array;
    }
}