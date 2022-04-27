<?php
session_start();
    include("connector.php");
    include("functions.php");
    $_SESSION;
    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $user_id = $user_data['user_id'];

        if(!empty($user_name) && !empty($user_password) && !empty($user_email) 
        && !empty($address) && !empty($phone) && !is_numeric($user_name))
        {
            $query = "UPDATE userinformation SET user_name='$user_name', user_password='$user_password',
        user_email='$user_email',user_address='$address',user_phone='$phone' WHERE user_id = '$user_id'";

            mysqli_query($con,$query);
            header("Location:updateprofile.php");
            die;
            echo "Information has been updated";

        }
        else
        {
            echo '<div class="warning"> Please input valid information </div>';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Profile </title>
</head>
<style>
    .warning{
            position: absolute;
            left: 50%;
            top: 97%;
            height:20px;
            width:250px;
            text-align: center;
            transform: translate(-50%, -50%);
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;border:1px solid;
        }
    body{
        background-image:url("images/bg5.jpg");
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
            top: 10%;
            text-align: center;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            border:1px solid;
            color: white;
            background-color: rgba(0,0,0,.5);
            

        }
        .headers{
           
            text-align: center;
            padding: 5px;
           
        }
        .field{
            margin-left:20px;
            margin-right: 20px;
            padding:5px;

        }
        .user{
            position: absolute;
            left: 50%;
            top: 20%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            font-weight: bold;
            background-color: rgba(0,0,0,.5);
            border:1px solid white;
        }
        .btn{
            position: absolute;
            left: 30%;
            top: 90%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            font-size: 20px;
        }
        .btn1{
            position: absolute;
            left: 70%;
            top: 90%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            font-size: 20px;        }
        
</style>
<body>

<h1 class="box-form-head">Update Your Profile Information</h1>

        <div class="user">
        <?php echo  $user_data['user_name']; ?>
        </div>

<div class="box-form">
    <form method="post">
        <div class="headers">New name</div>
        <input type="text" name="user_name" class="field">
        <div class="headers">New Password</div>
        <input type="text" name="user_password" class="field">
        <div class="headers">New Email</div>
        <input type="email" name="user_email" class="field">
        <div class="headers">New Phone Number</div>
        <input type="text" name="phone" class="field">
        <div class="headers">New Address</div>
        <input type="text" name="address" class="field"><br><br>
        <input type="submit" value="Update" class="btn">
    </form>
    <form action="index.php">
        <input type="submit" value="Cancel" class="btn1">
    </form>
</div>
</body>
</html>