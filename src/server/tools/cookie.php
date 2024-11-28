<?php

class Cookie{

    public static function setCookie($name, $value, $expiry = 172800)
    {
        $expiryDate = time() + $expiry;

        if (is_array($value)) {
            $value = json_encode($value);
        }

        setcookie($name, $value, $expiryDate, "/");
    }


    //leer cookie.
    public static function getCookie($name)
    {
        if (isset($_COOKIE[$name])) {
            $value = $_COOKIE[$name];

            $decodedValue = json_decode($value, true);
            return $decodedValue === null ? $value : $decodedValue;
        }
        return null;
    }

    public static function deleteCookie($name)
    {
        setcookie($name, "", time() - 3600, "/");
    }
}
?>