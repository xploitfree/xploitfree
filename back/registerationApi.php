<?php
    $response = array();
    $con = mysqli_connect("localhost","root","","EaseYourHire") or die(mysqli_error($con));
    $body= file_get_contents('php://input');
    $string=json_decode($body);
    $name = $string->name;
    $phone = $string->phone;
    $email = $string->email;
    $training = $string->training;
    $service = $string->service;
    $domain = $string->domain;
    
    if($phone!="" && $email!=""){
        if (isset($name) && $name != "") {
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            if ($name == "") {
                $response = 'Please enter a valid name.<br/><br/>';
                echo json_encode($response);
            }
        } else{
            $response = 'Please enter your name.<br/>';
            echo json_encode($response);
        }
        
        //email
        if ($email != "") {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response = "$email is <strong>NOT</strong> a valid email address.<br/><br/>";
                echo json_encode($response);
            }
        } else {
            $response = 'Please enter your email address.<br/>';
            echo json_encode($response);
        }
        //phone
        if($phone != ""){
            $phone = (int)$phone;
            if (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
                echo "Number is <strong>NOT</strong> valid.<br/><br/>";
            }else {
                $phone = (string)$phone;
            }
        }else {
            $response = 'Please enter your Number.<br/>';
            echo json_encode($response);
        }
        //subject
   if(isset($training) && $interest != ""){
    //as it is
   }else {
       $response = "Subject cannot be null";
       echo json_encode($response);
   }
   //domain
    if (isset($domain) && $domain != "") {
        $domain = filter_var($_POST['name'], FILTER_SANITIZE_URL);
        $domain = filter_var(gethostbyname($domain), FILTER_VALIDATE_IP);
        if ($domain == "") {
            $response = 'Please enter a valid domain name.<br/><br/>';
            echo json_encode($response);
        }
    } else{
        $response = 'Please enter your Business domain.<br/>';
        echo json_encode($response);
    }
    //service
    if (isset($service) && $service != "") {
        $service = filter_var($service, FILTER_SANITIZE_STRING);
        if ($service == "") {
            $response = 'Please enter desired service.<br/><br/>';
            echo json_encode($response);
        }
    } else{
        $response = 'Please enter desired service.<br/>';
        echo json_encode($response);
    }

}else {
    $response = "credentials cannot be null";
    echo json_encode($response);
}



if ($name != "" && $phone != "" && $email != "" && $training != ""){
    $query1 = "INSERT INTO RegisteredStudents(name,email,phone) values('$name','$email','$phone')";
    $query2 = "INSERT INTO StudentInterests(name,interest,phone) values('$name','$interest','$phone')";
    $query_result1 = mysqli_query($con,$query1);
    $query_result2 = mysqli_query($con,$query2);
}

if ($name != "" && $phone != "" && $service != "" && $email != ""){
    //something
}

    if($query_result1 && $query_result2){
        $response['success'] = false;
        $response['message'] = "wrong credentials";   
    }
    else{
        
        $response['success'] = true;
        $response['message'] = "successfully registered";
    }

    echo json_encode($response);
?>