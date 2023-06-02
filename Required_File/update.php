<?php
session_start();

$conc = $_POST['conc'];
$tank = $_POST['tank'];
$beds = $_POST['beds'] ;
$username = $_SESSION['username'];

$dbcon = mysqli_connect('localhost', 'root');
if($dbcon){
    echo "Connection success";
}else{
    echo "Connection to database failed";
}
mysqli_select_db($dbcon, 'covid');
$queryone = "update login set";

if(!empty($conc)){

 $queryone .= " oxygenconc = '$conc'";
}else if($conc == 0){
    $queryone .= " oxygenconc = '0'";
}
if(!empty($tank)){
    if(!empty($conc) || $conc == 0){
        $queryone .= ",";
        }   
         $queryone .= " oxygentanks='$tank'";

}else if($tank == 0){
    if(!empty($conc) || $conc == 0){
        $queryone .= ",";
        }  
    $queryone .= " oxygentanks = '0'";
}
if(!empty($beds)){
    if(!empty($conc) || !empty($tank) || $tank == 0 || $conc == 0){
        $queryone .= ",";
        }   
    $queryone .= " beds = '$beds'";
}
else if($beds == 0){
    if(!empty($conc) || !empty($tank) || $tank == 0 || $conc == 0){
        $queryone .= ",";
        }   
        $queryone .= " beds = '0'";

}
$queryone .= " where username = '$username'";
mysqli_query($dbcon, $queryone);
header('location:updatelay.php');
?>
