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
                    $response['message'] = "Invalid Name";
                    $response['success'] = false;
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                }
                } else {
                    $response['message'] = "Invalid Name";
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
                    $response['message'] = "email is not a valid email address.";
                    $response['success'] = false;
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                    $email = "";
                }
            } else {
                $response['message'] = "Not a valid email address.";
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
                if (strlen($phone) > 10) {
                    $response['message'] = "Number is not valid.";
                    $response['success'] = false;
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                    $phone = "";
                }
            }else {
                $response['message'] = 'Please enter your Number.';
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
            $response['message'] = "training cannot be null";
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
                }
            }

            if ($name != "" && $phone != "" && $email != "" && $training != ""){
                $query1 = "INSERT INTO RegisteredStudents(name,email,phone) values('$name','$email','$phone')";
                $query2 = "INSERT INTO StudentInterests(name,interest,phone) values('$name','$training','$phone')";
                $query_result1 = mysqli_query($con,$query1);
                $query_result2 = mysqli_query($con,$query2);
                

                if($query_result1 || $query_result2){
                    
                    if(send_mail($email,"Registration Successfull!" , "You are successfully registered for ".$training.". Our team will contact you in 24hrs. for further details.")){
                    $response['success'] = true;
                    $response['message'] = "Thank you for registering with our training. Our team will soon contact you";  
                    echo json_encode($response);
                    }else{
                        $response['success'] = true;
                        $response['message'] = "Regsitration successful but we were unable to send you email due to technical error!";
                        echo json_encode($response);
                    }
                    
                }
                else{
                    $response['success'] = false;
                    $response['message'] = "could not register";
                    echo json_encode($response);
                }
            }

            if ($phone != "" && $service != "" && $email != "" && $domain != ""){
            
                $query1 = "INSERT INTO registration_services(email, contact, domain, service_name) values('$email','$phone','$domain','$service')";
                $query_result1 = mysqli_query($con,$query1);
            
            
                if($query_result1){
                    if(send_mail($email,"Registration Successfull!" , "You are successfully registered for ".$service." service. Our team will contact you in 24hrs. for further details.")){
                        $response['success'] = true;
                        $response['message'] = "Thankyou for registering our service. Our team will soon contact you.";   
                    }
                    else{
                        $response['success'] = true;
                        $response['message'] = "Regsitration successful but we were unable to send you email due to technical error!";  
                    }
                }
                else{
                    $response['success'] = false;
                    $response['message'] = "Could not register";
                }
                echo json_encode($response);
                mysqli_close($con);
            }
        }else {
            $response['message'] = "credentials cannot be null";
            echo "hello";
            echo json_encode($response);
            mysqli_close($con);
        }

?>