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
    global $outputemail;
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $searchquery = $_POST['searchquery'];
        
        $query = "SELECT * FROM userinformation WHERE user_name like '%$searchquery%'";
        $result = mysqli_query($con,$query);
        $queryresult = mysqli_num_rows($result);

        
        if($queryresult > 0)
        {
            while($rows = mysqli_fetch_assoc($result))
            {
                $name = $rows['user_name'];
                $id = $rows['user_id'];
                $email = $rows['user_email'];
                $outputname .= '<div>'.$name.'</div>';
                $outputid .= '<div>'.$id.'</div>';
                $outputemail .= '<div>'.$email.'</div>';
            }

        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Users</title>
    <style>
        body{
            background-image:url("images/bg7.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;}
            .textview
            {
                color:white;
                background-color: rgba(0,0,0,.5);
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
            margin-top: 40px;
            
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
						<input type="text" name="searchquery" class='form-control' placeholder="Search By Name" value="" > 
                    </div>
					<div class="col-md-6 text-left">
						<button class="btn">Search</button>
					</div>
    </form>
				</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;overflow:scroll; overflow-x:hidden; height:400px; ">
				
				<table class="table table-bordered">
					<tr>
						<th class="heads">Name</th>
						<th class="heads">ID</th>
						<th class="heads">Email</th>
					</tr>
					<tr>
						<td class="textview"><?php echo $outputname; ?></td>
						<td class="textview"><?php echo $outputid;?></td>
						<td class="textview"><?php echo $outputemail;?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>