<?php
include_once "funcs.php";

$key = set_workshopKey($training);
if(is_training_available($training)){                  //training is available i.e. dates are updated

    if(user_registration($phone)){                   //user registered in table 1               
            if(workshop_registration($phone,$key)){ //user already registered for particular workshop in table 2
                $response['success'] = true;
                $response['message'] = "You are already registered for $training workshop user registered in table 1 a";
                echo json_encode($response);
                exit();
            }else{                            //user not registered for particular workshop in table 2
              
                $query = "INSERT INTO StudentInterests(phone,interest,workshop_key,standby,ispaid) 
                VALUES ('$phone', '$training','$key',0,0)" or die(mysqli_error($con));
                $q = mysqli_query($con,$query) or die(mysqli_error($con));

                if($q){
                    $response['success'] = true;
                    $response['message'] = "Successfully registered for $training workshop";

                    echo json_encode($response);
                    exit();
                }else{
                    $response['message'] = "Some error occured!";
                }

            }
    }else{                                            //user not registered in table any table
            $query1 = "INSERT INTO RegisteredStudents(name,email,phone)
            values('$name','$email','$phone')";
            $q1 = mysqli_query($con,$query1) or die(mysqli_error($con));
            $query2 = "INSERT INTO StudentInterests(phone,interest,workshop_key,standby,ispaid) 
            $q2 = mysqli_query($con,$query2) or die(mysqli_error($con));
            VALUES ('$phone', '$training','$key',1,0)";
           
            if($q2){
            
                if(send_mail($email,"Registration Successfull!" , "You are successfully registered for ".$training.". Our team will contact you in 24hrs. for further details.")){
                $response['success'] = true;
                $response['message'] = "Thank you for registering with our training. Our team will soon contact you";  
                echo json_encode($response);
                exit();
                }else{
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
}


else{                                          //training is not available i.e dates are not updated

    $key = set_workshopKey($training);
    
    if(user_registration($phone)){            //user registered in table 1               
            if(workshop_registration($phone,$key)){ //user already registered for particular workshop in table 2
                $response['success'] = true;
                $response['message'] = "You are already registered for $training workshop from user registered in table 1 ";

                echo json_encode($response);
                exit();
            }else{                            //user not registered for particular workshop in table 2
              
                $Query = "INSERT INTO StudentInterests (phone,interest,workshop_key,standby,ispaid) 
                VALUES ('$phone', '$training','$key',0,0)" or die(mysqli_error($con));

                $q4 = mysqli_query($con,$Query) or die(mysqli_error($con));


                if($q4){
                    if(send_mail($email,"Registration Successfull!" , "You are successfully registered for ".$training.".
                     Our team will contact you in 24hrs. for further details.")){
                    $response['success'] = true;
                    $response['message'] = "Successfully registered for $training workshop";
                    echo json_encode($response);
                    exit();

                    }else{
                    $response['success'] = true;
                    $response['message'] = "Regsitration successful but we were unable to send you email due to technical error!";
                    echo json_encode($response);
                    exit();
                    }
                }else{
                    echo "nothing";
                }

            }
    }else{                                            //user not registered in table any table
        
            echo "I;m here";
            $query1 = "INSERT INTO RegisteredStudents (name,email,phone) VALUES ('$name','$email','$phone')";
            $q1 = mysqli_query($con,$query1) or die(mysqli_error($con));
            $query2 = "INSERT INTO StudentInterests(phone,interest,workshop_key,standby,ispaid) 
            VALUES ('$phone', '$training','$key',1,0)";

            $q2 = mysqli_query($con,$query2) or die(mysqli_error($con));
        
            if($q2){
            
                if(send_mail($email,"Registration Successfull!" , "You are successfully registered for ".$training.". Our team will contact you in 24hrs. for further details.")){
                $response['success'] = true;
                $response['message'] = "Thank you for registering with our training. Our team will soon contact you";  
                echo json_encode($response);
                exit();
                }else{
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
}

?>