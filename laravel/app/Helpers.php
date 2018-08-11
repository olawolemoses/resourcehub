<?php
namespace App;

class Helpers
{
    public static function trim_characters($text, $min=20)
    {
        $words = str_word_count($text, 1);
        $len = min($min, count($words));
        $first_num = array_slice($words, 0, $len);
        array_push($first_num, "...");
        return implode(' ', $first_num);
    }
    
    public static function get_cart_total()
    {
        $data = session("cart_item");
         
        return count( $data );
    }
}