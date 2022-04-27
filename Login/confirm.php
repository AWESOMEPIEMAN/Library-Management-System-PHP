
<?php
session_start();
    include("connector.php");
    include("functions.php");
    $_SESSION;
    $user_data = check_login($con);
    global $user_id;
    global $total_cost;
    $user_id = $user_data['user_id'];
    $query = "SELECT * from bill";
    $results = mysqli_query($con,$query);
    $queryresult = mysqli_num_rows($results);

    if($queryresult > 0){
        while($rows = mysqli_fetch_assoc($results)) 
        {   
            $cost = $rows['book_cost'];
            $total_cost += $cost;

        }

        $query1 = "INSERT INTO purchase (user_id,bill_amount) values ('$user_id','$total_cost');";
        mysqli_query($con,$query1);

        $query3 = "TRUNCATE TABLE bill";
        mysqli_query($con,$query3);
        header( "Refresh:3; url=index.php", true, 303);
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .box-form-head {
            border: 1px solid;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            background-color: rgba(0,0,0,.5);
         }
    </style>
</head>
<body>
<h1 class="box-form-head">Purchase Successful</h1>

</body>
</html>