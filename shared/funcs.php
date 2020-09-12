<?php
    
    $current_page = explode('.', array_slice(explode('/', $_SERVER['REQUEST_URI']), -1)[0])[0];
    
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
        }
    }
?>