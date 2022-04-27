<?php

session_start();
    include("connector.php");
    include("functions.php");
    $_SESSION;
    $user_data = check_login($con);
    global $rows;
    global $name;
    global $id;
    global $outputname;
    global $outputid;
    global $outputauthor;   
    global $cost;  
    global $outputcost;   
    $query = "SELECT  book_name, book_author,book_id,book_cost FROM books";
    $result = mysqli_query($con,$query);
    $queryresult = mysqli_num_rows($result);
        
     if($queryresult > 0)
        {
            while($rows = mysqli_fetch_assoc($result))
            {
                $name = $rows['book_name'];
                $id = $rows['book_id'];
                $author = $rows['book_author'];
                $cost = $rows['book_cost'];
                $outputname .= '<div>'.$name.'</div>';
                $outputid .= '<div>'.$id.'</div>';
                $outputauthor .= '<div>'.$author.'</div>';
                $outputcost .= '<div>'.$cost.' OMR</div>';
            }

        }

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            
           $book_id = $_POST['id'];
           $user_id = $user_data['user_id'];
           $user_name = $user_data['user_name'];
           $query1 = "SELECT * from bill where book_id = '$book_id'";
           $result1 = mysqli_query($con,$query1);
           $querylist = mysqli_num_rows($result1);

            if(!empty($book_id) && !empty($user_id))
           {
               if($querylist > 0)
               {
                echo '<div class="warning">The item already exists in cart</div>';
                header("Refresh:2");
               }
                else
                {
                    $queryget = "SELECT  book_name, book_author,book_id,book_cost FROM books";
                    $results1 = mysqli_query($con,$queryget);
                    $queryresults1 = mysqli_num_rows($results1);
                    
                    if($queryresults1 > 0)
                    {
                        while($rows1 = mysqli_fetch_assoc($results1))
                        {
                            $name = $rows1['book_name'];
                            $books_id = $rows1['book_id'];
                            $author = $rows1['book_author'];
                            $cost = $rows1['book_cost'];
                            if($books_id == $book_id)
                                {
                                    $query3 = "INSERT INTO bill (book_id,book_name,book_cost,user_id,user_name) 
                                    values ('$books_id','$name','$cost','$user_id','$user_name');";
                                    mysqli_query($con,$query3);
                                    echo '<div class="warning">Items added to cart</div>';
                                    header("Refresh:3");

                                }
                        }

                    }
                        
                }
            
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Buy Books</title>
    <style>
        .warning{
            position: absolute;
            left: 80%;
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
       body{
            background-image:url("images/bg8.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;}
         .box-form-head {
            border: 1px solid;
            position: absolute;
            left: 50%;
            top: 10%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            background-color: rgba(0,0,0,.5);
        }
        .container {
            position:absolute;
            left: -10%;
            top:10%;
        }
        .textview{
                    color:white;
                    font-size:24px;
                    font-family: Arial, Helvetica, sans-serif;
                    border: thick double #32a1ce;
                    background-color: rgba(0,0,0,.5);
            }
        .btn34{
            position: absolute;
            left: 8%;
            top: 5%;
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
            left: 23%;
            top: 135%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            font-size:15px;
            font-weight: bold;
            color:white;
        }.btn22{
            position: absolute;
            left: 70%;
            top: 135%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            font-size:15px;
            font-weight: bold;
            color:white;
        }
        .box-form {
            position: absolute;
            left: 85%;
            top: 40%;
            transform: translate(-50%, -50%);
            padding-top:20px;
            padding-bottom:20px;
            padding-left:20px;
            padding-right:20px;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:black;
            border:1px solid;
        }
        .me{
            color:white;
        }
        .heads{
                color:white;
                font-family: Arial, Helvetica, sans-serif;
                font-size:12px;
                background-color: rgba(0,0,0,.5);
            }

    </style>
</head>
<body>
<h1 class="box-form-head">Buy Books</h1>
<form action="index.php">
                        <input type="Submit" value="Go back" class="btn34">
                    </form>
<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;overflow:scroll; overflow-x:hidden; height:400px;">
				<div class="row">
                    
				</div>
				<table class="table table-bordered">
					<tr><th class="heads">ID</th>
						<th class="heads">Name</th>
						
						<th class="heads">Author</th>
                        <th class="heads">Cost</th>
					</tr>
					<tr class="bb"><td class="textview"><?php echo $outputid;?></td>
						<td class="textview"><?php echo $outputname; ?></td>
						
						<td class="textview"><?php echo $outputauthor;?></td>
                        <td class="textview"><?php echo $outputcost;?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
    <div class="box-form">
        <form method="post">
            <div class="me">Input ID</div>
            <input type="number" name="id"placeholder="ID">
            <input type="Submit" value="Add to Cart" class="btn2">
        </form>
        <form action="bill.php">
            <input type="Submit" value="Buy" class="btn22">
        </form>
    </div>


</body>
</html>