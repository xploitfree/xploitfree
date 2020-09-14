<?php
        
        include_once "funcs.php";
        $con = mysqli_connect("localhost","root","","xploitfree");
        $response = array();
        $body= file_get_contents('php://input');
        $string=json_decode($body);
        
        //check when submitted
        if(isset($string->name) && isset($string->message) && isset($string->email) && isset($string->sub) && isset($string->phone)){
            $name = $string->name;
            $email = $string->email;
            $message = $string->message;
            $sub = $string->sub;
            $phone = $string->phone;
            if ($name != "") {
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
            //message
            if ($message != "") {
                $message = sanitizeStringPstyle($con, $message);
                $message = filter_var($message, FILTER_SANITIZE_STRING);
                if ($message == "") {
                    $response['message'] = "Invalid message";
                    $response['success'] = false;
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                }
            } else {
                $response['message'] = "Invalid message";
                $response['success'] = false;
                echo json_encode($response);
                    
            }
            //email
            if ($email != "") {
                $email = $string->email;
                $email = sanitizeStringPstyle($con, $email);
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $response['message'] = "email is not a valid email address.";
                    $response['success'] = false;
                    $email = "";
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
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
                    $response['message'] = "Phone is not valid.";
                    $response['success'] = false;
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                    $phone = "";
                }else {
                    $phone = (string)$phone;
                }
            }else {
                $response['message'] = 'Please enter your Number.';
                $response['success'] = false;
                echo json_encode($response);
                mysqli_close($con);
                exit();
            }
            //subject
            if($sub != ""){
                    $sub = sanitizeStringPstyle($con, $sub);
                    $sub = filter_var($sub, FILTER_SANITIZE_STRING);
                    if ($sub == "") {
                        $response['message'] = "Invalid subject";
                        $response['success'] = false;
                        echo json_encode($response);
                        mysqli_close($con);
                        exit();
                    }
                }else {
                $response['message'] = "Subject cannot be null";
                $response['success'] = false;
                echo json_encode($response);
                mysqli_close($con);
                exit();
            }

            if ($name != "" && $phone != "" && $email != "" && $sub != "" && $message !=""){
                $query1 = "INSERT INTO messagesTable1Num(phone,name,email) VALUES ('$phone','$name','$email')";
                $query2 = "INSERT INTO messagesTable2mes(sub,message,phone) VAlues ('$sub','$message','$phone')";
                $query_result1 = mysqli_query($con,$query1);
                $query_result2 = mysqli_query($con,$query2);

                if($query_result1 || $query_result2){
                    $response['success'] = true;
                    $response['message'] = "Thank You for contacting us! Your message was successfully received.";  
                    echo json_encode($response); 
                    mysqli_close($con);
                    exit();
                }
                else{
                    
                    $response['success'] = false;
                    $response['message'] = "Something went wrong";
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                }

                }
        }else {
            $response['message'] = "Please fill all fields or else we won't be able to contact you";
            echo json_encode($response);
            mysqli_close($con);
        }


?>