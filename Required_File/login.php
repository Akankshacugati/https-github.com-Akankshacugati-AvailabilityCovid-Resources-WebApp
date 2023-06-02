<?php
session_start();

$username = $_POST['hospital'];
$pass = $_POST['password'];

$dbcon = mysqli_connect('localhost', 'root');

if($dbcon){
    echo "Connection success";
}else{
    echo "Connection to database failed";
}
mysqli_select_db($dbcon, 'covid');


$query = "select * from login where username = '$username' && password = '$pass'";

$result = mysqli_query($dbcon, $query);

$num = mysqli_num_rows($result);
if($num == 1){
    header('location:updatelay.php');
    $_SESSION['username'] = $username;
    $_SESSION['invalid'] = "";
}else{
    $_SESSION['invalid'] = "Invalid Username or Password";
    header('location:index.php');
}
?>

