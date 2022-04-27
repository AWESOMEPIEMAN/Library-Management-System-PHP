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
    global $author;
    global $outputauthor;   
    global $cost;  
    global $outputcost;   
    global $total_cost;
    //getting cart information
    $query = "SELECT  * from bill";
    $result = mysqli_query($con,$query);
    $queryresult = mysqli_num_rows($result);
    $total_cost = 0;
   
    if($queryresult > 0)
        {
            while($rows = mysqli_fetch_assoc($result))
            {
                $book_id = $rows['book_id'];
                $name = $rows['book_name'];
                $book_cost = $rows['book_cost'];
                $outputname .= '<div>'.$name.'</div>';
                $outputid .= '<div>'.$book_id.'</div>';
                $outputcost .= '<div>'.$book_cost.' OMR</div>';
                $total_cost +=  $book_cost;
            }    
            }
        else{
            echo '<div class="warning2">The Items cart is empty :(</div>';
            header( "Refresh:0.5; url=buybooks.php", true, 303);
        }

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Bill for Books</title>
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
        .warning2{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            border:1px solid;
            font-size: 50px;
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
            top: 4%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 50px;
            color: white;
            background-color: rgba(0,0,0,.5);
         }
         .box-form-head-cost {
            border: 1px solid;
            position: absolute;
            left:10%;
            top: 20%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 20px;
            color: white;
            background-color: rgba(0,0,0,.5);
         }
         .box-form-head-cost1 {
            border: 1px solid;
            position: absolute;
            left:10%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 14px;
            color: white;
            background-color: rgba(0,0,0,.5);
         }
        /* .container{
            position:absolute;
            left: -10%;
            top:10%;
            
        } */
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
            top: 35%;
            transform: translate(-50%, -50%);
            padding: 10px;
            color:white;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            font-size:12px;
            font-weight: bold;
            color:white;
        }
        .btn35{
            position: absolute;
            left: 6%;
            top: 44%;
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
        .heads{
            background-color: rgba(0,0,0,.5);
                color:white;
                font-family: Arial, Helvetica, sans-serif;
                font-size:12px;
            }
        }
        .note1{
            position: absolute;
            top: 90%;
            left:90%;
            background-color: rgba(0,0,0,.5);
            font-family: Arial;
            color:white;
            border:1px solid white;
        }
        </style>
</head>
<body>
<h1 class="box-form-head">Bill</h1>
<form action="confirm.php">
                        <input type="Submit" value="Confirm Purchase" class="btn34">
                    </form>
                    <form action="cancel.php">
                        <input type="submit" value="Cancel" class="btn35">
                    </form>
<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 10%;overflow:scroll; overflow-x:hidden; height:400px;">
				<div class="row">
                    
				</div>
				<table class="table table-bordered">
					<tr>
                        <th class="heads">ID</th>
						<th class="heads">Name</th>
                        <th class="heads">Cost</th>
					</tr>
					<tr class="bb">
                        <td class="textview"><?php echo $outputid;?></td>
						<td class="textview"><?php echo $outputname; ?></td>
                        <td class="textview"><?php echo $outputcost;?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
    <h1 class="box-form-head-cost">Total Cost: <?php echo $total_cost?> OMR</h1>
    <h2 class="box-form-head-cost1">Canceling will empty your cart</h2>
</body>
</html>