<?php
    $con = mysqli_connect("localhost","root","","xploitfree") or die(mysqli_error($con));
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
            $name = filter_var($message, FILTER_SANITIZE_STRING);
            if ($name == "") {
                $response['name'] = "Invalid Name";
                echo json_encode($response);
            }
        } else{
            $response['name'] = "Invalid Name";
                echo json_encode($response);
        }
         //message
        if ($message != "") {
            $message = filter_var($message, FILTER_SANITIZE_STRING);
            if ($message == "") {
                $response['message'] = "Invalid message";
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Invalid message";
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
            $response = "$email is <strong>NOT</strong> a valid email address.<br/><br/>";
            echo json_encode($response);
        }
        //phone
        if($phone != ""){
            $phone = (int)$phone;
            $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            if (strlen($phone > 10)) {
                $response = "$phone is <strong>NOT</strong> valid.<br/><br/>";
                echo json_encode($response);
            }else {
                $phone = (string)$phone;
            }
        }else {
            $response = 'Please enter your Number.<br/>';
            echo json_encode($response);
        }
        //subject
   if($sub != ""){
    //as it is
   }else {
       $response = "Subject cannot be null";
       echo json_encode($response);
   }

}else {
    $response = "credentials cannot be null";
    echo json_encode($response);
}
    if ($name != "" && $phone != "" && $email != "" && $sub != ""){
    $query1 = "INSERT INTO messagesTable1Num(phone,name,email) VALUES ('$phone','$name','$email')";
    $query2 = "INSERT INTO messagesTable2mes(sub,message,phone) VAlues ('$sub','$message','$phone')";
    $query_result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
    $query_result2 = mysqli_query($con,$query2) or die(mysqli_error($con));

    }

    if($query_result1 && $query_result2){
        $response['success'] = true;
        $response['message'] = "Your query has been submitted";   
    }
    else{
        
        $response['success'] = false;
        $response['message'] = "wrong credentials";
    }

    echo json_encode($response);
?>