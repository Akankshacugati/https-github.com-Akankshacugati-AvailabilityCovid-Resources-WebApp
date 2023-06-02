<?php 

session_start();
$dbcon = mysqli_connect('localhost', 'root');
mysqli_select_db($dbcon, 'covid');
?>

<!DOCTYPE html>
<html>
<head>
<title>COVID-19</title>
<link href="abc.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
   <h2>
    COVID 19 HOSPITAL RESOURCE AVAILABILITY
</h2>
    <div class="login">
        
        <p>LOGIN</p>
    <form action = "login.php" method = "POST">
        <p >
            
            <label>Hospital Username</label>
            <input type = "text" name = "hospital" placeholder="Enter name" required/>
        </p>
        <p>
            <label >Password</label>
            <input type = "password" name = "password" placeholder="Enter password" required/>
        </p>
        <div id = "errormessage"><?php echo $_SESSION['invalid']?></div>
        <a href= "register.html">Register</a>
    
        <button type="submit">Login</button>
    </form>
</div>

<div class = "search">
    <input type = "text" id = "search" onkeyup="searchfilter()" placeholder = "Search by City"/>
</div>
    <div class="infotable">
        <table id = "table" class = "sortable">
            <tr>

            <th>Name</th>
            <th>City</th>
            <th>State</th>
            <th>Street</th>
            <th>Pincode</th>
            <th >O2 Concentrators</th>
            <th>O2 Tanks</th>
            <th>Beds</th>
            <th>Phone number</th>
</tr>
  
        <?php
        $query = 'Select name, city, state, street, pincode, oxygenconc, oxygentanks, beds, phonenum from login where oxygenconc >0 or oxygentanks > 0 or beds > 0 order by oxygenconc desc';
        $result = mysqli_query($dbcon, $query);
        while($rows = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td class = "nametd"> <?php echo $rows['name'] ?></td>
            <td> <?php echo $rows['city']?></td>
            <td><?php echo $rows['state'] ?></td>
            <td><?php echo $rows['street'] ?></td>
            <td><?php echo $rows['pincode'] ?></td>
            <td><?php echo $rows['oxygenconc'] ?></td>
            <td><?php echo $rows['oxygentanks'] ?></td>
            <td><?php echo $rows['beds'] ?></td>
            <td><?php echo $rows['phonenum'] ?></td>

        </tr>

        <?php
        }
        ?>
              </table>
    </div>

</body>
</html>

<script>



    function searchfilter(){

    
    var city;
    city = document.getElementById('search');
    filter = city.value.toUpperCase();

    table = document.getElementById('table');
    tr = table.getElementsByTagName("tr");
    console.log(tr);
    for(i = 0; i<tr.length; i++){
        td = tr[i].getElementsByTagName("td")[1];
        console.log(td);
        if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }

    }
    }

</script>
