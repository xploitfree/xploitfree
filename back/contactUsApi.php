<?php
    $con = mysqli_connect("localhost","root","","xploitfree");
    $response = array();
    $body= file_get_contents('php://input');
    $string=json_decode($body);
    $name = $string->name;
    $message = $string->message;
    $email = $string->email;
    $sub = $string->sub;
    $phone = $string->phone;
    //check when submitted
    if($name!="" && $message!="" && $email!="" && $sub!="" && $phone!=""){
        if ($name != "") {
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            if ($name == "") {
                $response['name'] = "Invalid Name";
                
            }
        } else {
            $response['name'] = "Invalid Name";
               
        }
         //message
        if ($message != "") {
            $message = filter_var($message, FILTER_SANITIZE_STRING);
            if ($message == "") {
                $response['message'] = "Invalid message";
               
            }
        } else {
            $response['message'] = "Invalid message";
                
        }
        //email
        if ($email != "") {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['email'] = "$email is not a valid email address.";
                $email = "";
            }
        } else {
            $response['email'] = "Not a valid email address.<br/><br/>";
            
        }
        //phone
        if($phone != ""){
            $phone = (int)$phone;
            $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            if (strlen($phone) > 10) {
                $response['phone'] = "$phone is not valid.";
                $phone = "";
            }else {
                $phone = (string)$phone;
            }
        }else {
            $response['phone'] = 'Please enter your Number.';
            
        }
        //subject
   if($sub != ""){
    $sub = filter_var($sub, FILTER_SANITIZE_STRING);
    if ($sub == "") {
        $response['name'] = "Invalid subject";
     }
   }else {
       $response['sub'] = "Subject cannot be null";
       
   }

}else {
    $response['general'] = "credentials cannot be null";
    
}
    if ($name != "" && $phone != "" && $email != "" && $sub != ""){
    $query1 = "INSERT INTO messagesTable1Num(phone,name,email) VALUES ('$phone','$name','$email')";
    $query2 = "INSERT INTO messagesTable2mes(sub,message,phone) VAlues ('$sub','$message','$phone')";
    $query_result1 = mysqli_query($con,$query1);
    $query_result2 = mysqli_query($con,$query2);

    }

    if($query_result1 || $query_result2){
        $response['success'] = true;
        $response['message'] = "Your query has been submitted";  
        echo json_encode($response); 
    }
    else{
        
        $response['success'] = false;
        $response['message'] = "wrong credentials";
        echo json_encode($response);
    }

    
?>