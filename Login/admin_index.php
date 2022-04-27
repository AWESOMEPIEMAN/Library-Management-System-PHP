<?php 
session_start();
    include("connector.php");
    include("functions.php");
    $_SESSION;
    $user_data = check_login_admin($con)
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
            background-image:url("images/bg6.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .box-form {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding-top:80px;
            padding-bottom:130px;
            padding-left:200px;
            padding-right:200px;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            border:1px solid;
        }
        .box-form-head {
            position: absolute;
            left: 50%;
            top: 20%;
            border: 1px solid;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            background-color: rgba(0,0,0,.5);
            

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
            left: 75%;
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
            top: 60%;
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
            top: 85%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            font-size:15px;
            font-weight: bold;
            color:white;

        }
        .btn5{
            position: absolute;
            left: 30%;
            top: 60%;
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
    <h1 class="box-form-head">Admin Page</h1>
    <div class="box-form">
        <form action="viewusers.php">
            <input type="submit" value="View Contributors/Buyers" class="btn">
        </form>
        <form action="viewbooks.php">
            <input type="submit" value="View Books" class="btn2">
        </form>
        <form action="assigncost.php">
            <input type="submit" value="Assign Cost to Book" class="btn3">
        </form>
        <form action="report.php">
            <input type="submit" value="Report" class="btn5">
        </form>
        <form action="logoutadmin.php">
            <input type="submit" value="Logout" class="btn4">
        </form>
        
    </div>
</body>
</html>