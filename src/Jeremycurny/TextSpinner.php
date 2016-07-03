<?php
namespace Jeremycurny;

class TextSpinner {

    public static function spin($string, $pick = null) {
    	$callback = function ($string) use ($pick) {
	        $string = static::spin($string[1], $pick);
	        $parts = explode('|', $string);
	        $randKey = $pick === null ? array_rand($parts) : array_keys($parts)[$pick % count($parts)];
	        return $parts[$randKey];
	    };
        return preg_replace_callback('/\{(((?>[^\{\}]+)|(?R))*)\}/x', $callback, $string);
    }

}
