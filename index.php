<?php

class MyClass{

    public function debug($string){
        echo '<pre>';
        print_r($string);
        echo '</pre>';
    }

public function revertPunctuationMarks ($string){
    $array = preg_split('//u', $string);
    $mark_ids = [];
    foreach ($array as $id => $value){
        if (preg_match( "/[a-zа-яё0-9 ]/iu", $value )){
            continue;
        } else {
            array_push($mark_ids, $id);
        }
    }

    while (count($mark_ids) > 1){
        $first = array_shift($mark_ids);
        $last = array_pop($mark_ids);
        $temp = $array[$first];
        $array[$first] = $array[$last];
        $array[$last] = $temp;
    }
    return implode($array);
}
}

$quote = "! @ # $ % ^ & * ( ) _ + = - ? : \ / | [ ] { } < >";
$magic = new MyClass();
$magic->debug('Исходная строка: '.$quote);
$count = $magic->revertPunctuationMarks($quote);
$magic->debug('Строка после обработки: '.$count);
