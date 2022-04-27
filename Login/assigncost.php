<?php
session_start();
    include("functions.php");
    include("connector.php");
    $_SESSION;
    $user_data = check_login_admin($con);
    global $rows;
    global $name;
    global $id;
    global $outputname;
    global $outputid;
    global $outputauthor;   
    global $cost;  
    global $outputcost;
    global $outputquality;
    $query = "SELECT  book_name, book_author,book_id,book_cost,book_quality FROM books";
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
                $quality = $rows['book_quality'];
                $outputname .= '<div>'.$name.'</div>';
                $outputid .= '<div>'.$id.'</div>';
                $outputauthor .= '<div>'.$author.'</div>';
                $outputquality .= '<div>'.$quality.'</div>';
                $outputcost .= '<div>'.$cost.' OMR</div>';
            }

        }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        $id = $_POST['id'];
       $cost = $_POST['cost'];
        if(!empty($id) && !empty($cost))
       {
        $query = "UPDATE books SET book_cost ='$cost' where book_id = '$id'";
        mysqli_query($con,$query);
        header("Refresh:0");
       }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Cost to a book</title>
    <style>
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
            left: 10%;
            top: 10%;
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
            left: 25%;
            top: 120%;
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
<h1 class="box-form-head">Assign Cost to a Book</h1>
<form action="admin_index.php">
                        <input type="Submit" value="Go back" class="btn34">
                    </form>
<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;overflow:scroll; overflow-x:hidden; height:400px;">
				<div class="row">
                    
				</div>
				<table class="table table-bordered">
					<tr>
						<th class="heads">Name</th>
						<th class="heads">ID</th>
						<th class="heads">Author</th>
                        <th class="heads">Quality</th>
                        <th class="heads">Cost</th>
					</tr>
					<tr class="bb">
						<td class="textview"><?php echo $outputname; ?></td>
						<td class="textview"><?php echo $outputid;?></td>
						<td class="textview"><?php echo $outputauthor;?></td>
                        <td class="textview"><?php echo $outputquality;?></td>
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
            <div class="me">New Cost</div>
            <input type="number" name="cost" placeholder="Cost">
            <input type="Submit" value="Assign Cost" class="btn2">
        </form>
    </div>
</body>
</html>