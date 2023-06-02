<?php

session_start();
header('location:index.php');
$_SESSION['invalid'] = "";

$dbcon = mysqli_connect('localhost', 'root');
if($dbcon){
    echo "Connection success";
}else{
    echo "Connection to database failed";
}

mysqli_select_db($dbcon, 'covid');


$username = $_POST['user'];
$name = $_POST['name'];
$pass = $_POST['password'];
$city = $_POST['city'];
$state = $_POST['state'];
$street = $_POST['street'];
$pincode = $_POST['pincode'];
$phonenum = $_POST['phonenum'];

$query = "select * from login where username = '$username'";

$result = mysqli_query($dbcon, $query);

$num = mysqli_num_rows($result);
if($num >= 1){
    echo "User already registered";
}else{
    $queryone = "insert into login(username, password, name, city, state, street, pincode, phonenum) values ('$username', '$pass', '$name', '$city','$state', '$street', '$pincode', '$phonenum')";
    mysqli_query($dbcon, $queryone);
}
 
?>
