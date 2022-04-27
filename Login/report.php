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
    global $outputquality;
    global $outputcost;
    global $outputcount;
    global $outputcontrib;
        $query = "SELECT * FROM books ";
        $result = mysqli_query($con,$query);
        $queryresult = mysqli_num_rows($result);

        
        if($queryresult > 0)
        {
            while($rows = mysqli_fetch_assoc($result))
            {
                $name = $rows['book_name'];
                $id = $rows['book_id'];
                $author = $rows['book_author'];
                $quality = $rows['book_quality'];
                $cost = $rows['book_cost'];
                $count = $rows['book_count'];
                $contrib = $rows['book_contributor_name'];
                $outputid .= '<div>'.$id.'</div>';
                $outputname .= '<div>'.$name.'</div>';
                $outputauthor .= '<div>'.$author.'</div>';
                $outputquality .= '<div>'.$quality.'</div>';
                $outputcost .= '<div>'.$cost.' <span>OMR<span></div>';
                $outputcount .= '<div>'.$count.'</div>';
                $outputcontrib .= '<div>'.$contrib.'</div>';
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
    <title>Report</title>
    <style>
         body{
            background-image:url("images/bg9.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;}
         .box-form-head {
            border: 1px solid;
            position: absolute;
            left: 50%;
            top: 3%;
            transform: translate(-50%, -50%);
            padding: 5px;
            font-family: Arial, Helvetica;
            font-size: 24px;
            color: white;
            background-color: rgba(0,0,0,.5);
         }
         span{
             font-size: 8px;
         }
         .textview{
                    color:white;
                    font-size:20px;
                    font-family: Arial, Helvetica, sans-serif;
                    border: thick double #32a1ce;
                    background-color: rgba(0,0,0,.5);
                    
                    }
                    .heads{
            background-color: rgba(0,0,0,.5);
                color:white;
                font-family: Arial, Helvetica, sans-serif;
                font-size:12px;
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
    </style>
</head>
<body>
<h1 class="box-form-head">Report</h1>
<form action="admin_index.php">
                        <input type="Submit" value="Go back" class="btn34">
                    </form>
<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 6%; overflow:scroll; overflow-x:hidden; height:400px;">
				
				<table class="table table-bordered">
					<tr>
                    <th class="heads">ID</th>
					<th class="heads">Name</th>	
					<th class="heads">Author</th>
                    <th class="heads">Quality</th>
					<th class="heads">Cost</th>	
					<th class="heads">Count</th>
                    <th class="heads">Contributor</th>
					</tr>
					<tr class="bb">
                        <td class="textview"><?php echo $outputid;?></td>
						<td class="textview"><?php echo $outputname; ?></td>
						<td class="textview"><?php echo $outputauthor;?></td>
                        <td class="textview"><?php echo $outputquality;?></td>
						<td class="textview"><?php echo $outputcost; ?></td>
						<td class="textview"><?php echo $outputcount;?></td>
                        <td class="textview"><?php echo $outputcontrib;?></td>

					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>