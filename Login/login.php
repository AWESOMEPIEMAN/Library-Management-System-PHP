<?php 
session_start();
    include("connector.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //Posted data and collecting it from POST variable 
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        
        if(!empty($user_name) && !empty($user_password) && !is_numeric($user_name))
        {
            $query = "SELECT * FROM userinformation WHERE user_name = '$user_name' limit 1";
            $results = mysqli_query($con,$query);

            if($results && mysqli_num_rows($results) > 0)
            {
                $user_data = mysqli_fetch_assoc($results);
                if($user_data['user_password'] === $user_password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
                else{
                    echo '<div class="warning">Wrong username or password</div>';
                }
            }
            else{
                echo '<div class="warning">Wrong username or password</div>';
            }
            
        }
        else{
            echo '<div class="warning">Please enter valid information. No blanks allowed</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System for AlRahma Charity</title>
    <style>
        .warning{
            position: absolute;
            left: 50%;
            top: 80%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            border:1px solid;
            font-size: 12px;
        }
        .box-form {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;border:1px solid;
        }
        .box-form-head {
            position: absolute;
            left: 50%;
            top: 20%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            background-color: rgba(0,0,0,.5);
            border:1px solid;
            text-align: center;

        }
        body{
            background-image:url("images/bg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .username{
            margin-left: 70px;

        }
        .password{
            margin-left: 70px;
        }
        .field{
            margin-left:20px;
            margin-right: 20px;
        }
        .login{
            margin-left:75px;
            font-size:20px;
            border: 10px 10px 10px 10px;
            background-color: rgba(0,0,0,.5);
            color: white;
            font-family: Arial;
        }
        .btn{
            position: absolute;
            left: 80%;
            top: 85%;
            transform: translate(-50%, -50%);
            padding-left: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
        }
        .btn1{
            position: absolute;
            left: 20%;
            top: 85%;
            transform: translate(-50%, -50%);
            padding-left: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
        }
    </style>
</head>
<body>
    <h1 class="box-form-head">Books Donation and Selling Management System for Al-Rahma Charity</h1>
    <div class="box-form">
        <form method="post">
        <div class="username">Username</div>
            <input type="text" name="user_name" class="field"><br>
            <div class="password">Password</div>
            <input type="password" name="user_password" class="field"><br><br>
            <input type="submit" value="Login" class="login"><br><br><br>
        </form>
            <form action="signup.php">
                <button type="submit" class="btn1">Register</button>
             </form>
            <form action="admin_login.php">
                <button type="submit" class="btn">Admin</button>
            </form>
    </div>
</body>
</html>
