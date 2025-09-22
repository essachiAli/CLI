<?php 

namespace App\Utils;

class Formatter{
    public static function highlight(string $text): string{
        return strtoupper($text);
    }
}