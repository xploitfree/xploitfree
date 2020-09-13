<?php
    
    if(strpos($_SERVER['REQUEST_URI'], "?") == false){
        $current_page = explode('.', array_slice(explode('/', $_SERVER['REQUEST_URI']), -1)[0])[0];
    }
    else if(strpos($_SERVER['REQUEST_URI'], "?") != false){
        include_once "back/dbconn.php";
    
        $n = implode(' ',explode('_', $_GET['name']));

        if(filter_var($n, FILTER_SANITIZE_STRING)){
            $q = "select * from trainings where name = '$n'";
        
            $d = $conn->query($q);
        
            $r_r = $d->num_rows;
        }
        else{
            $r_r = 0;
        }

        if($r_r){
            $t = $d->fetch_array(MYSQLI_ASSOC);
            $current_page = $t["name"];
        }
    }
    
    function get_heading(){
        
        global $current_page;
        
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
?>