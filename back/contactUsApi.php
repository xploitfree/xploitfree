<?php
    $response = array();
    $name = "";
    $_message = "";
    $_email = "";
    $sub = "";
    $phone = "";
    $con = mysqli_connect("localhost","root","","xploitfree") or die(mysqli_error($con));
    //check when submitted
    if(isset ($_POST['submit'])){
        if ($_POST['name'] != "") {
            $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            if ($_POST['name'] == "") {
                echo 'Please enter a valid name.<br/><br/>';
            }else {
                $name = $_POST['name'];
            }
        } else{
            echo  'Please enter your name.<br/>';
        }
         //message
        if ($_POST['message'] != "") {
            $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            if ($_POST['message'] == "") {
                echo 'Please enter a message to send.<br/>';
            }else{
                $message = $_POST['message'];
            }
        } else {
            echo 'Please enter a message to send.<br/>';
        }
        //email
        if ($_POST['email'] != "") {
            $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo "$email is <strong>NOT</strong> a valid email address.<br/><br/>";
            }else {
                $email = $_POST['email'];
            }
        } else {
            echo 'Please enter your email address.<br/>';
        }
        //phone
        if($_POST['phone'] != ""){
            $_POST['phone'] = (int)$_POST['phone'];
            if (!filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT)) {
                echo "Number is <strong>NOT</strong> valid.<br/><br/>";
            }else {
                $phone = (string)$_POST['phone'];
            }
        }else {
            echo 'Please enter your Number.<br/>';
        }
        //subject
   if($_POST['subject'] != ""){
    $sub = $_POST['subject'];
   }else {
       $errors .= "Subject cannot be null";
   }

}
    if ($name != "" && $phone != "" && $email != "" && $sub != ""){
    $query1 = "INSERT INTO messagesTable1Num(phone,name,email) VALUES ('$phone','$name','$email')";
    $query2 = "INSERT INTO messagesTable2mes(sub,message,phone) VAlues ('$sub','$message','$phone')";
    $query_result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
    $query_result2 = mysqli_query($con,$query2) or die(mysqli_error($con));

    }

    if($query_result1 && $query_result2){
        $response['success'] = "success";
        $response['message'] = "Your query has benn submitted";   
    }
    else{
        
        $response['success'] = false;
        $response['message'] = "wrong credentials";
    }

    echo json_encode($response);
?>