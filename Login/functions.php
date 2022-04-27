<?php 

function check_login($con){

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $query = "SELECT * from userinformation where user_id = '$id' limit 1";
    $result = mysqli_query($con,$query);
    if ($result && mysqli_num_rows($result) > 0)
    {
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
    }
}

//redirection to the login/index page.
header("Location: login.php");
die;
}

function check_login_admin($con){

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $query = "SELECT * from admininfo where admin_id = '$id' limit 1";
        $result = mysqli_query($con,$query);
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    
    //redirection to the login/index page.
    header("Location: admin_login.php");
    die;
    }

function random_num($length) {
    
    $first = rand(1,$length);
    $second = rand(5,$length);
    $third = rand(6,100);
    $fourth = rand(7,600);
    $text = $first + $second + $fourth + $third;
    return $text;
}
?>