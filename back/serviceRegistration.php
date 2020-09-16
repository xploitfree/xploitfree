<?php

    if(is_user_registered($email, "service_reg_table1")){            //user registered in table 1               
        if(is_service_reg_n_dne($email, $service, $domain)){ //user already registered for particular service and its not yet done in table 2
            $response['success'] = true;
            $response['message'] = "You are already registered for $service workshop. Our team will soon contact you. You may drop a message in case of no contact.";

            echo json_encode($response);
            exit();
        }else{                            //user not registered for particular workshop in table 2
            $date = date("Y-m-d");
            
            $query = "INSERT INTO service_reg_table2 VALUES (null, '$email', '$domain', '$service', '$date', 0, 0)";

            $q = mysqli_query($con,$query);

            if($q){
                $response['success'] = true;
                $response['message'] = "Successfully registered for $service service.";
                echo json_encode($response);
                exit();
            }else{
                $response['success'] = false;
                $response['message'] = "Some error occurred on our side.";
                echo json_encode($response);
                exit();
            }
        }
    }else{                                            //user not registered in table any table
        $query1 = "INSERT INTO service_reg_table1(email, contact) values('$email', '$phone')";
        $q1 = mysqli_query($con,$query1);

        $date = date("Y-m-d");

        $query2 = "INSERT INTO service_reg_table2 VALUES (null, '$email', '$domain', '$service', '$date', 0, 0)";
        $q2 = mysqli_query($con,$query2);
       
        if($q1 and $q2){
        
            if(send_mail($email,"Registration Successfull!" , "You are successfully registered for ".$service." service. Our team will soon contact you.")){
            $response['success'] = true;
            $response['message'] = "Thank you for registering with our training. Our team will soon contact you";  
            echo json_encode($response);
            exit();
            }
            else{
                $response['success'] = true;
                $response['message'] = "Regsitration successful but we were unable to send you email due to technical error!";
                echo json_encode($response);
                exit();
            }
            
        }
        else{
            $response['success'] = false;
            $response['message'] = "could not register";
            echo json_encode($response);
            exit();
        }
    }

?>