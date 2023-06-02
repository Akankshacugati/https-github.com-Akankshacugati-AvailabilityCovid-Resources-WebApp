<?php
session_start();
$username = $_SESSION['username'];
$query = "Select oxygenconc, oxygentanks, beds from login where username = '$username'";
$dbcon = mysqli_connect('localhost', 'root');


mysqli_select_db($dbcon, 'covid');

$result = mysqli_query($dbcon, $query);
$rows = mysqli_fetch_array($result);

 ?>


<!DOCTYPE html>
<html>
<head>
<title>COVID-19</title>
<link href="update.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <h2>
        COVID 19 HOSPITAL RESOURCE AVAILABILITY
    </h2>
    <div class = "currentinfo">
    <p class ="we" >Welcome </p><p class ="userna"> <?php echo $_SESSION['username']?> </p><br><br><p class = "yo">O2 Tanks =<?php echo $rows['oxygentanks'] ?> <br>
        O2 Concentrators =<?php echo $rows['oxygenconc'] ?><br>
        Beds =<?php echo $rows['beds'] ?></p>     <form action = "signout.php" method = "POST">
    <button id = "corner" type = "submit">SIGNOUT</button>
</form>  </div>
   
            
    <div class = "update">
     

    
    <form action = "update.php" method = "POST">
        <h1>UPDATE</h1>

        <p>
            <label>Oxygen Concentrators</label>
            <input type = "number" name = "conc"  placeholder="Enter number" />
        </p>
        <p>
            <label>Oxygen Tanks</label>

            <input type = "number" name = "tank" placeholder="Enter number" />
        </p>
        <p>
            <label>Beds</label>

            <input type = "text" name = "beds" placeholder="Enter beds" />
        </p>
        <button type="submit">Update</button>
        
    </form>

   
</div>

</body>
</html>