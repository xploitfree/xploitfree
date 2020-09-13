<?php

    function sanitizeStringOstyle($conn, $var){
        $var = strip_tags($var);
        $var = htmlentities($var);
        if (get_magic_quotes_gpc())
            $var = stripslashes($var);
        return $conn->real_escape_string($var);
    }

    function sanitizeStringPstyle($conn, $var){
        $var = strip_tags($var);
        $var = htmlentities($var);
        if (get_magic_quotes_gpc())
            $var = stripslashes($var);
        return real_escape_string($conn, $var);
    }

?>