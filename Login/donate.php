<?php 
session_start();
    include("connector.php");
    include("functions.php");
    $_SESSION;
    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //getting the posted content from form 
        $book_name = $_POST['book_name'];
        $book_author = $_POST['book_author'];
        $book_company = $_POST['book_company'];
        $book_year = $_POST['book_year'];
        $book_cost = $_POST['book_cost'];
        $book_count = $_POST['nobooks'];
        $book_quality = $_POST['book_quality'];
        $book_contributor_name = $user_data['user_name'];
        $book_contributor_id = $user_data['user_id'];
        

        if(!empty($book_name) && !empty($book_author) && !empty($book_company) 
        && !empty($book_year) && !empty($book_cost) && !empty($book_count) && !is_numeric($book_author) && !empty($book_quality))
        {
            $query = "INSERT into books (book_name,book_author,book_company,book_year,book_cost,book_count,book_quality,book_contributor_name,book_contributor_id)
            values ('$book_name', '$book_author', '$book_company','$book_year','$book_cost','$book_count','$book_quality','$book_contributor_name','$book_contributor_id')";
            mysqli_query($con,$query);
            echo '<div class="warning"> The books have been donated </div>';

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
    <title>Donate a book</title>
</head>
<style>
    .warning{
            position: absolute;
            left: 50%;
            top: 90%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
        }
        .box-form {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            padding-bottom: 30px;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
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
            

        }
        body{
            background-image:url("images/bg4.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .field{
            margin-left:20px;
            margin-right: 20px;
        }
        .headers{
            text-align: center;
            padding: 4px;
           
        }
        .donate{
            position: absolute;
            left: 20%;
            top: 95%;
            transform: translate(-50%, -50%);
            padding:5px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            font-size: 15px;
        }
        .btn{
            position: absolute;
            left: 50%;
            top: 95%;
            transform: translate(-50%, -50%);
            padding: 5px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            font-size: 15px;
        }
        .btn1{
            position: absolute;
            left: 80%;
            top: 95%;
            transform: translate(-50%, -50%);
            padding: 5px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            font-size: 15px;        }
            .radbtn{
                    margin-left: 50px;
            }
</style>
<body>
    
    <div class="box-form">
        <form method="post">
            <div class="headers">Number of Books to donate </div>
            <input type="number" name="nobooks"  class="field">
            <div class="headers">Book name</div>
            <input type="text" name="book_name" class="field">
            <div class="headers">Author</div>
            <input type="text" name="book_author" class="field">
            <div class="headers">Publishing Company</div>
            <input type="text" name="book_company" class="field">
            <div class="headers">Publication Date</div>
            <input type="date" name="book_year" class="field">
            <div class="headers">Quality of Book</div>
            <input type="radio" name="book_quality" value="Excellent" class="radbtn" checked="checked">Excellent
            <input type="radio" name="book_quality" value="Good" class="radbtn1">Good<br>
            <input type="radio" name="book_quality" value="Poor" class="radbtn1">Poor
            <input type="radio" name="book_quality" value="Bad" class="radbtn">Bad
            <div class="headers">Cost</div>
            <input type="number" name="book_cost" class="field"><br><br>
            <input type="submit" value="Donate" class="donate">
            
        </form>
        <form action="index.php">
            <input type="submit" value="Cancel" class="btn">
        </form>
        <form action="logout.php">
            <input type="submit" value="Logout" class="btn1">
        </form>
    </div>
</body>
</html>
