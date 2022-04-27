<?php 
session_start();
    include("connector.php");
    include("functions.php");
    $_SESSION;
    $user_data = check_login_admin($con);
    $count = 0;
    global $rows;
    global $name;
    global $id;
    global $outputname;
    global $outputid;
    global $outputauthor;
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $searchquery = $_POST['searchquery'];
        
        $query = "SELECT * FROM books WHERE book_name like '%$searchquery%' or book_author like '%$searchquery%'";
        $result = mysqli_query($con,$query);
        $queryresult = mysqli_num_rows($result);

        
        if($queryresult > 0)
        {
            while($rows = mysqli_fetch_assoc($result))
            {
                $name = $rows['book_name'];
                $id = $rows['book_id'];
                $author = $rows['book_author'];
                $outputname .= '<div>'.$name.'</div>';
                $outputid .= '<div>'.$id.'</div>';
                $outputauthor .= '<div>'.$author.'</div>';
            }

        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Search for books</title>
    <style>
        body{
            background-image:url("images/bg7.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;}
            .textview{
                    color:white;
                    font-size:24px;
                    font-family: Arial, Helvetica, sans-serif;
                    background-color: rgba(0,0,0,.5);
                    
            }
            .bb{
                border:2px solid white;
            }
            .heads{
                color:white;
                font-family: Arial, Helvetica, sans-serif;
                font-size:12px;
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
        .col-md-6{
            position: absolute;
            top: 10%;
            left: 20%;
        }
        .col-md-6 button{
            position: absolute;
            left: 100%;
        }
        .container{
            margin-top: 50px;
        }
    </style>
</head>
<body>
<form action="admin_index.php">
        <input type="Submit" value="Go back" class="btn34">
</form>
<div class="row">
	<form action="" method="POST"> 
		<div class="col-md-6">
	        <input type="text" name="searchquery" class='form-control' placeholder="Search By Name or Author" value="" > 
        </div>
        <div class="col-md-6 text-left">
			<button class="btn">Search</button>
		</div>
	</form>
</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%; overflow:scroll; overflow-x:hidden; height:300px;">
				
				<table class="table table-bordered">
					<tr>
						<th class="heads">Name</th>
						<th class="heads">ID</th>
						<th class="heads">Author</th>
					</tr>
					<tr class="bb">
						<td class="textview"><?php echo $outputname; ?></td>
						<td class="textview"><?php echo $outputid;?></td>
						<td class="textview"><?php echo $outputauthor;?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>