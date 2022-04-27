<?php 
session_start();
    include("connector.php");
    include("functions.php");
    $_SESSION;
    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System for AlRahma Charity</title>
    <style>
        body{
            background-image:url("images/bg3.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .box-form {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding-top:60px;
            padding-bottom:60px;
            padding-left:180px;
            padding-right:180px;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            border:1px solid;
        }
        .box-form-head {
            border: 1px solid;
            position: absolute;
            left: 50%;
            top: 20%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            background-color: rgba(0,0,0,.5);
            text-align: center;
            

        }
        .user{
            position: absolute;
            left: 50%;
            top: 35%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            font-weight: bold;
            background-color: rgba(0,0,0,.5);
            border: solid 1px white
        }
        .btn{
            position: absolute;
            left: 30%;
            top: 25%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            font-size:15px;
            font-weight: bold;
            color:white;
        }
        .btn2{
            position: absolute;
            left: 70%;
            top: 25%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            font-size:15px;
            font-weight: bold;
            color:white;

        }
        .btn3{
            position: absolute;
            left: 70%;
            top: 65%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            font-size:15px;
            font-weight: bold;
            color:white;
        }
        .btn4{
            position: absolute;
            left: 30%;
            top: 65%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            font-size:15px;
            font-weight: bold;
            color:white;

        }
    </style>
</head>
<body>

        <div class="user">
            Welcome
        <?php echo  $user_data['user_name']; ?>
        </div>
        <br><br>
    <div class="box-form">
        <form action="donate.php">
            <input type="submit" value="Donate a Book" class="btn">
        </form>
        <form action="updateprofile.php">
            <input type="submit" value="Update Profile" class="btn2">
        </form>
        <form action="logout.php">
            <input type="submit" value="Logout" class="btn3">
        </form>
        <form action="buybooks.php">
            <input type="submit" value="Buy Books" class="btn4">
        </form>
    </div>
    
</body>
</html>
