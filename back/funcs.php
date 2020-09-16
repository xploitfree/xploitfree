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
    
        function is_user_registered($email, $table1_name) {
            $db_ta_conn = new Db_Connect();
            $ta_conn = $db_ta_conn->get_connection();
            
            $qry = "SELECT * FROM $table1_name WHERE email = '$email'";
            $qry_result = $ta_conn->query($qry);
    
            $num = mysqli_num_rows($qry_result);

            $ta_conn->close();
            
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

            $ta_conn->close();
            
            if($num){
                return true;
            }else{
                return false;
            }  
        }
    
        function is_service_reg_n_dne($email,$service, $domain) {
            $db_ta_conn = new Db_Connect();
            $ta_conn = $db_ta_conn->get_connection();
            
            $qry = "SELECT * FROM registrationtable2 WHERE email = '$email' AND service_name = '$service' and domain = '$domain' and isAudited = '0'";
            $qry_result = $ta_conn->query($qry);
            
            $num = mysqli_num_rows($qry_result);

            $ta_conn->close();
            
            if($num){
                return true;
            }else{
                return false;
            }  
        }

        function get_client_ip()
        {
            // foreach (array(
            //             'HTTP_CLIENT_IP',
            //             'HTTP_X_FORWARDED_FOR',
            //             'HTTP_X_FORWARDED',
            //             'HTTP_X_CLUSTER_CLIENT_IP',
            //             'HTTP_FORWARDED_FOR',
            //             'HTTP_FORWARDED',
            //             'REMOTE_ADDR') as $key) {
            //     if (array_key_exists($key, $_SERVER)) {
            //         foreach (explode(',', $_SERVER[$key]) as $ip) {
            //             $ip = trim($ip);
            //             if (filter_var($ip, FILTER_VALIDATE_IP,
            //                             FILTER_FLAG_IPV4 |
            //                             FILTER_FLAG_IPV6 |
            //                             FILTER_FLAG_NO_PRIV_RANGE |
            //                             FILTER_FLAG_NO_RES_RANGE)) {
            //                 return $ip;
            //             }
            //         }
            //     }
            // }
            // return null;
            return $_SERVER['REMOTE_ADDR'];
        }

        function check_client_ip($ip, $con){

            $query = "select * from ip_check where ip = '$ip'";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result)){
                $data = mysqli_fetch_assoc($result);
                $counter = $data['counter'];
                            
                if(!reset_counter($data['first_request_time'], $ip, "ip", "ip_check", $counter, $con)){          //if error occurs in resetting counter
                    $response['success'] = false;
                    $response['message'] = "Something went wrong on our side. Try again.";
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                }                

                if($counter < 10){
                    
                    $counter++;

                    $sub_q = "UPDATE `ip_check` SET `counter` = '$counter' WHERE `ip_check`.`ip` = '$ip'";
                    $sub_q_result = mysqli_query($con, $sub_q);
                    if($sub_q_result){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    return false;
                }
            }
            else{
                $sub_q = "insert into ip_check(ip, counter) values('$ip', '1')";
                $sub_q_result = mysqli_query($con, $sub_q);

                if($sub_q_result){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        function reset_counter($stored_time, $email, $pk_field, $table1_name, &$counter, $con){

            date_default_timezone_set("Asia/Kolkata");
            $current_time = time();

            if($current_time - strtotime($stored_time) >= 5*60){
                $current_time = date("Y-m-d H:i:s", $current_time);
                $sub_q = "UPDATE `$table1_name` SET `counter` = '0', `first_request_time` = '$current_time' WHERE `$table1_name`.`$pk_field` = '$email'";
                $sub_q_result = mysqli_query($con, $sub_q);
        
                if($sub_q_result){
                    $counter = 0;
                    return true;
                }
                else{
                    return false;
                }
            }

            return true;
        }

    }
    
?>