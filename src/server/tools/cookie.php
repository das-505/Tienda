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


   public static function  verifyCookieLogin(&$session){

        $db = new DatabaseController();
    
        $token = Cookie::getCookie('login_token');
        if($token){
    
            $data = array("token" => $token);
            $user = $db->getByData("users", $data);
    
            if(count($user) > 0){
                $session["logged_user"] = serialize($user[0]);
                return true;
            }
        }
    
        return false;
    
    }
}
?>