<?php
    function token_random($len=20){
        $str_source = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $token = "";
        for ($i=0; $i < $len; $i++) { 
            $token.=$str_source[rand(0,strlen($str_source)-1)];
        }
        return $token;
    }

?>