<?php
    
    $current_page = explode('.', array_slice(explode('/', $_SERVER['REQUEST_URI']), -1)[0])[0];
    
    function give_heading(){
        
        global $current_page;
        
        switch($current_page){
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
            case "contactus":
                return "Contact to connect";
        }
    }
?>