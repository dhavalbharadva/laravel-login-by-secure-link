<?php

namespace App\Helpers;

class Common {

    /**
     * apply base64 first and then reverse the string
     * @author Dhaval Bharadva
     * @param string $str
     * @return endcoded string
     */
    public static function encode5t($str) {
        $str = $str . "|" . time();
        for ($i = 0; $i < 3; $i++) {
            $str = strrev(base64_encode($str));
        }
        $str = str_replace(array('+', '/', '='), array('-', '_', '~'), $str);
        return $str;
    }

    /**
     * reverse the string first and then apply base64
     * @author Dhaval Bharadva
     * @param string $str
     * @return decoded string
     */
    public static function decode5t($str) {
        $str = str_replace(array('-', '_', '~'), array('+', '/', '='), $str);
        for ($i = 0; $i < 3; $i++) {
            $str = base64_decode(strrev($str));
        }
        return $str;
    }

    /**
     * generate random string by given length
     * @author Dhaval Bharadva
     * @param string $length
     * @return string
     */
    public static function generateRandomString($length = 10) {
        return strtoupper(substr(str_shuffle(MD5(microtime())), 0, $length));
    }

}

?>
