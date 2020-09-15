<?php

    if(basename($_SERVER['SCRIPT_FILENAME']) == "funcs.php"){
        include_once "../shared/notfound.php";
    }
    else{

        include_once 'dbconn.php';

        function get_page(){

            $db_p_conn = new Db_Connect();
            $p_conn = $db_p_conn->get_connection();

            if(strpos($_SERVER['REQUEST_URI'], "?") == false){
                $current_page = explode('.', array_slice(explode('/', $_SERVER['REQUEST_URI']), -1)[0])[0];
            }
            else if(strpos($_SERVER['REQUEST_URI'], "?") != false){
                include_once "back/dbconn.php";
            
                $n = implode(' ',explode('_', $_GET['name']));

                $n = sanitizeStringOstyle($p_conn, $n);

                $n = filter_var($n, FILTER_SANITIZE_STRING);

                $q = "select * from trainings where name = '$n'";
            
                $d = $p_conn->query($q);
            
                $r_r = $d->num_rows;

                if($r_r){
                    $t = $d->fetch_array(MYSQLI_ASSOC);
                    $current_page = $t["name"];
                }
            } 

            $p_conn->close();
            
            return $current_page;
        }
        
        
        function get_heading(){
            
            $current_page = get_page();
            
            switch($current_page){
                case "home":
                    return "home";
                case "aboutus":
                    return "About XploitFree";
                case "services":
                    return "Services";
                case "contactus":
                    return "Contact to connect";
                case "trainings":
                    return "Trainings";
                case "socialengg":
                    return "Social Engineering";
                case "redteaming":
                    return "Red Teaming";
                case "websecurity":
                    return "Web Security";
                case "networksecurity":
                    return "Network Security";
                case $current_page:
                    return $current_page;
            }
        }

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
            return mysqli_real_escape_string($conn, $var);
        }

        function is_training_available($training_name){

            $db_ta_conn = new Db_Connect();
            $ta_conn = $db_ta_conn->get_connection();

            $trng_nme = sanitizeStringOstyle($ta_conn, $training_name);

            $trng_nme = filter_var($trng_nme, FILTER_SANITIZE_STRING);

            $qry = "select isAvailable from trainings where name = '$trng_nme'";

            $data = $ta_conn->query($qry);

            $val = $data->fetch_array(MYSQLI_ASSOC);

            $ta_conn->close();

            return (int)$val["isAvailable"];

        }

        function set_workshopKey($training_name){

            $db_ta_conn = new Db_Connect();
            $ta_conn = $db_ta_conn->get_connection();
            
            $qry = "select * from trainings where name = '$training_name'";
            $data = $ta_conn->query($qry);
            $dates = $data->fetch_array(MYSQLI_ASSOC);
    
            $sdate = (string)$dates['start_date'];
           
            $edate = (string)$dates['end_date'];
            
            $key = implode('',explode('-',$sdate)).implode('',explode(' ',$training_name)).implode('',explode('-',$edate));
            
            $ta_conn->close();

            return $key;
        }
    
        function is_user_registered($email) {
            $db_ta_conn = new Db_Connect();
            $ta_conn = $db_ta_conn->get_connection();
            
            $qry = "SELECT * FROM RegisteredStudents WHERE email = '$email'";
            $qry_result = $ta_conn->query($qry);
    
            $num = mysqli_num_rows($qry_result);
            
            if($num){
                return true;
            }else{
                return false;
            }
        }
    
    
        function is_workshop_registered($email,$key) {
            $db_ta_conn = new Db_Connect();
            $ta_conn = $db_ta_conn->get_connection();
            
            $qry = "SELECT * FROM StudentInterests WHERE email = '$email' AND workshop_key = '$key'";
            $qry_result = $ta_conn->query($qry);
            
            $num = mysqli_num_rows($qry_result);
            
            if($num){
                return true;
            }else{
                return false;
            }
            
        }

    }
    
?>