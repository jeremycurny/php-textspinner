<?php
namespace Jeremycurny;

class TextSpinner {

    public static function replace($string) {
        $string = static::spin($string[1]);
        $parts = explode('|', $string);
        return $parts[array_rand($parts)];
    }

    public static function spin($string) {
        return preg_replace_callback('/\{(((?>[^\{\}]+)|(?R))*)\}/x', ['static', 'replace'], $string);
    }

}
