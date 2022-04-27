<?php
session_start();
    include("connector.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //Posted data and collecting it from POST variable 
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $position = $_POST['position'];

        if(!empty($user_name) && !empty($user_password) && 
        !empty($user_email) && !empty($address) && !empty($phone) && !empty($position) && !is_numeric($user_name))
        {
            $user_id = random_num(20);
            $query = "INSERT INTO userinformation (user_id,user_name,user_password,user_email,user_position,user_address,user_phone) 
            values('$user_id','$user_name','$user_password','$user_email','$position','$address','$phone')";
            mysqli_query($con,$query);

            header("Location: login.php");
            die;
        }
        else{
            echo '<div class="warning">Please enter valid information. No numbers in username. Can only be characters A-Z a-z</div>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Here</title>
</head>
<style>
    .warning{
            position: absolute;
            left: 70%;
            top: 90%;
            height:90px;
            width:200px;
            text-align: center;
            transform: translate(-50%, -50%);
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;border:1px solid;
        }
    body{
        background-image:url("images/bg2.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .box-form {
            position: absolute;
            left: 50%;
            top: 60%;
            transform: translate(-50%, -50%);
            padding: 20px;
            padding-bottom: 60px;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            border:1px solid;
            
        }
        .box-form-head {
            position: absolute;
            left: 50%;
            border:1px solid;
            top: 10%;
            text-align: center;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            background-color: rgba(0,0,0,.5);
            

        }
        .headers{
            text-align: center;
           
        }
        .field{
            margin-left:20px;
            margin-right: 20px;
            padding:5px;
        }
        .btn{
            position: absolute;
            left: 25%;
            top: 93%;
            transform: translate(-50%, -50%);
            padding:8px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            font-size: 20px;
        }
        .btn1{
            position: absolute;
            left: 75%;
            top: 93%;
            font-size:20px;
            transform: translate(-50%, -50%);
            padding: 8px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
        }
</style>
<body>
<h1 class="box-form-head">Register</h1>
    <div class="box-form">
        <form method="post">
            <div class="headers">Username</div>
            <input type="text" name="user_name" class="field"><br>
            <div class="headers">Password</div>
            <input type="password" name="user_password" class="field"><br>
            <div class="headers">Email</div>
            <input type="email" name="user_email" class="field">
            <div class="headers">Address</div>
            <input type="text" name="address"  class="field">
            <div class="headers">Phone</div>
            <input type="text" name="phone" class="field">
            <div class="headers">Job Title</div>
            <input type="text" name="position" class="field"><br>
            <input type="submit" value="Save" class="btn">
        </form>
        <form action="login.php">
            <input type="submit" value="cancel" class="btn1">
        </form>
    </div>
    
</body>
</html>