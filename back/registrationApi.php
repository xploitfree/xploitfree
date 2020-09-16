<?php
    include_once "mailer.php";
    include_once "funcs.php";
    
    $response = array();
    $con = mysqli_connect("localhost","root","","xploitfree") or die(mysqli_error($con));
    $body= file_get_contents('php://input');
    $string=json_decode($body);

    
    if(isset($string->name) && isset($string->phone) && isset($string->email) && isset($string->training) ||
    isset($string->phone) && isset($string->email) && isset($string->service) && isset($string->domain)){
        if(!isset($string->name)){
            $name="";
        }else{
            $name = $string->name;
         }
        $phone = $string->phone;
        $email = $string->email;
        if(!isset($string->training)){
            $training="";
        }else{
            $training = $string->training;
         }

        if(!isset($string->service)){
            $service = "";
        }else{
            $service = $string->service;
        }

        if(!isset($string->domain)){
            $domain="" ;
        }else{
            $domain = $string->domain;
        }
        if (isset($string->name)){ 
            if($name!=""){
            $name = sanitizeStringPstyle($con, $name);
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            if ($name == "") {
                $response['message'] = "Character limit exceeded.(Limit: 30)";
                $response['success'] = false;
                echo json_encode($response);
                mysqli_close($con);
                exit();
            }
        } else {
            $response['message'] = "Please enter valid name(to be printed on Certificate).";
            $response['success'] = false;
            echo json_encode($response);
            mysqli_close($con);
            exit();   
        }
    }
         //email
         if ($email != "") {
            $email = sanitizeStringPstyle($con, $email);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['message'] = "Enter valid email!";
                $response['success'] = false;
                echo json_encode($response);
                mysqli_close($con);
                exit();
                $email = "";
            }
        } else {
            $response['message'] = "Enter valid email!";
            $response['success'] = false;
            echo json_encode($response);
            mysqli_close($con);
            exit();
        }
        //phone
        if($phone != ""){
            $phone = (int)$phone;
            $phone = sanitizeStringPstyle($con, $phone);
            $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            if (strlen($phone) != 10) {
                $response['message'] = "Enter valid contact!";
                $response['success'] = false;
                echo json_encode($response);
                mysqli_close($con);
                exit();
                $phone = "";
            }
        }else {
            $response['message'] = 'Enter valid contact!';
            $response['success'] = false;
            echo json_encode($response);
            mysqli_close($con);
            exit();
        }
        //training
    if(isset($string->training)){ 
    if($training != ""){
        $training = sanitizeStringPstyle($con, $training);
        $training = filter_var($training, FILTER_SANITIZE_STRING);
        if ($training == "") {
                $response['message'] = "Invalid training";
                $response['success'] = false;
                echo json_encode($response);
                mysqli_close($con);
                exit();
        }
        }else {
       $response['message'] = "Training cannot be null";
       $response['success'] = false;
       echo json_encode($response);
       mysqli_close($con);
       exit();
   }
}
   //domain
    if(isset($string->domain)){
    if ($domain != "") {
        $domain = sanitizeStringPstyle($con, $domain);
        $domain = filter_var($domain, FILTER_SANITIZE_URL);
        if (!filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
            $response['message'] = 'Please enter a valid domain name.';
            $response['success'] = false;
            echo json_encode($response);
            mysqli_close($con);
            exit();
        
        }
    }
}
    //service
    if(isset($string->service)){
    if ($service != "") {
        $service = sanitizeStringPstyle($con, $service);
        $service = filter_var($service, FILTER_SANITIZE_STRING);
        if ($service == "") {
            $response['message'] = 'Please enter desired service.';
            $response['success'] = false;
            echo json_encode($response);
            mysqli_close($con);
            exit();
        }
    }else{
        $response['message'] = 'Please enter desired service.';
        $response['success'] = false;
        echo json_encode($response);
        mysqli_close($con);
        exit();
    }
}

    if ($name != "" && $phone != "" && $email != "" && $training != ""){
       
        include_once './trainingRegistration.php';
        
    }

    if ($phone != "" && $service != "" && $email != "" && $domain != ""){
    
        include_once './serviceRegistration.php';

    }
}else {
    $response['message'] = "credentials cannot be null";
    echo json_encode($response);
    mysqli_close($con);
}

?>