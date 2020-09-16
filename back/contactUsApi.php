<?php
        
        include_once "funcs.php";
        include_once "mailer.php";
        $con = mysqli_connect("localhost","root","","xploitfree");
        $response = array();
        $body= file_get_contents('php://input');
        $string=json_decode($body);
        
        //check when submitted
        if(isset($string->name) && isset($string->message) && isset($string->email) && isset($string->subject) && isset($string->phone)){
            $name = $string->name;
            $email = $string->email;
            $message = $string->message;
            $subject = $string->subject;
            $phone = $string->phone;
            if ($name != "") {
                $name = sanitizeStringPstyle($con, $name);
                $name = filter_var($name, FILTER_SANITIZE_STRING);
                if ($name > 30) {
                    $response['message'] = "Character limit exceeded!(Limit: 30)";
                    $response['success'] = false;
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                }
            } else {
                $response['message'] = "Please enter valid name(text only).";
                $response['success'] = false;
                echo json_encode($response);
                mysqli_close($con);
                exit();
            }
            //message
            if ($message != "") {
                $message = sanitizeStringPstyle($con, $message);
                $message = filter_var($message, FILTER_SANITIZE_STRING);
                if (strlen($message) > 500) {
                    $response['message'] = "Message must be less than 500 characters.";
                    $response['success'] = false;
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                }
            } else {
                $response['message'] = "Message cannot be null";
                $response['success'] = false;
                echo json_encode($response);
                    
            }
            //email
            if ($email != "") {
                $email = $string->email;
                $email = sanitizeStringPstyle($con, $email);
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $response['message'] = "Enter valid email!";
                    $response['success'] = false;
                    $email = "";
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
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
                }else {
                    $phone = (string)$phone;
                }
            }else {
                $response['message'] = 'Enter valid contact!';
                $response['success'] = false;
                echo json_encode($response);
                mysqli_close($con);
                exit();
            }
            //subject
            if($subject != ""){
                    $subject = sanitizeStringPstyle($con, $subject);
                    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
                    if (strlen($subject) > 100) {
                        $response['message'] = "Subject must be less than 100 characters.";
                        $response['success'] = false;
                        echo json_encode($response);
                        mysqli_close($con);
                        exit();
                    }
                }
                else {
                    $response['message'] = "Subject cannot be null";
                    $response['success'] = false;
                    echo json_encode($response);
                    mysqli_close($con);
                    exit();
                }

            if ($name != "" && $phone != "" && $email != "" && $subject != "" && $message !=""){

                $ip = get_client_ip();

                if($ip != null){                                      // block after getting ip
                    if(check_client_ip($ip, $con)){                  // block after checking ip
                
                        $query = "select * from messagestable1num where email = '$email'";
                        $query_result = mysqli_query($con, $query);
        
                        if(mysqli_num_rows($query_result)){

                            $row = mysqli_fetch_assoc($query_result);
                            $counter = $row['counter'];
                            
                            if(!reset_counter($row['first_request_time'], $email, "email", "messagestable1num", $counter, $con)){                      //if error occurs in resetting counter
                                $response['success'] = false;
                                $response['message'] = "Something went wrong on our side. Try again.";
                                echo json_encode($response);
                                mysqli_close($con);
                                exit();
                            }

                            if($counter < 3){

                                $counter++;
                                
                                $sub_q = "UPDATE `messagestable1num` SET `counter` = '$counter' WHERE `messagestable1num`.`email` = '$email'";
                                $query2 = "INSERT INTO messagestable2mes VALUES (null, '$subject','$message','$email')";
                                $sub_q_result = mysqli_query($con, $sub_q);
                                $query_result2 = mysqli_query($con,$query2);
        
                                if($sub_q_result && $query_result2){
                                    $response['success'] = true;
                                    $response['message'] = "Thank You for contacting us! Your message was successfully received.";    
                                    echo json_encode($response); 
                                    mysqli_close($con);
                                    send_mail("18bcs054@smvdu.ac.in", "User Contacted[SUBJECT: $subject](!IMPORTANT)" , "Name: $name\nSubject: $subject\nMessage: $message", $email, $name);
                                    exit();
                                }
                                else{
                                    $response['success'] = false;
                                    $response['message'] = "Something went wrong on our side. Try again.";
                                    echo json_encode($response);
                                    mysqli_close($con);
                                    exit();
                                }
                            }
                            else{
                                $response['success'] = false;
                                $response['message'] = "Some error occurred! Try again in sometime.";
                                echo json_encode($response);
                                mysqli_close($con);
                                exit();
                            }
                        }
                        else{
        
                            $query1 = "INSERT INTO messagestable1Num(phone, name, email, counter) VALUES ('$phone','$name','$email', '1')";
                            $query2 = "INSERT INTO messagestable2mes VALUES (null, '$subject','$message','$email')";
                            $query_result1 = mysqli_query($con,$query1);
                            $query_result2 = mysqli_query($con,$query2);
            
                            if($query_result1 || $query_result2){
                                $response['success'] = true;
                                $response['message'] = "Thank You for contacting us! Your message was successfully received.";  
                                echo json_encode($response); 
                                mysqli_close($con);
                                send_mail("18bcs054@smvdu.ac.in", "User Contacted[SUBJECT: $subject](!IMPORTANT)" , "Name: $name\nMessage: $message", $email, $name);
                                exit();
                            }
                            else{
                                $response['success'] = false;
                                $response['message'] = "Something went wrong on our side. Try again.";
                                echo json_encode($response);
                                mysqli_close($con);
                                exit();
                            }
                        }
                    }
                    else{
                        $response['success'] = false;
                        $response['message'] = "Something went wrong on our side in check ip. Try again.";
                        echo json_encode($response);
                        mysqli_close($con);
                        exit();
                    }
                }
                else{
                    $response['success'] = false;
                    $response['message'] = "Something went wrong on our side. Try again.";
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