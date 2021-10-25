<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include 'includes/design.php';
if($_SESSION['username']==true)                                    //checks user's session is same or not
{
      
     $admin_name=$_SESSION['username'];
}else{
   header('location:../index.php');//after logout don't come back

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Save Password</title>
</head>
<body>
<?php echo "<h2 style=color:blue;>WELCOME: ". $admin_name."</h2>"; ?>


<!--==================***************** To Display the Save Password ******************================-->

<form action="" method="post">
<div class="tableContent">
<table class="SavedPasswordTable" id="SavedPasswordTable">
    <caption><h2>Saved Password</h2>
   <h3><b>Search:</b> <input type="text" id="myInput" onkeyup="mySearchFunction();" placeholder="Search">
    </h3></caption>
    <thead>
    <tr>
        <th>SL No.</th>
        <th>WebSite</th>
        <th>URL</th>
        <th>UserName</th>
        <th colspan=2>Password</th>
    </tr>
    </thead>    
    <tbody>


    
    <?php
                        include 'includes/config.php';
                        $query="select * from save_password where ADMIN='$admin_name'";
                        $result = mysqli_query($con,$query);
                    
  
        while($rows = mysqli_fetch_assoc($result))
            
            {
            ?>

    <tr>
        <td><script>
   var allTableData = document.getElementById("SavedPasswordTable");
   var totalNumbeOfRows = allTableData.rows.length;
   document.write(+totalNumbeOfRows-1);
</script></td>
        <!-- <?php echo $rows['ColumnName']; ?> -->
        <td><?php echo $rows['WEBSITE']; ?></td>
        <td><?php echo $rows['URL']; ?></td>
        <td><?php echo $rows['USERNAME']; ?></td>
        <td><input type="password" readonly class="PasswordWrapper" id="PasswordWrapper" 
         value="<?php echo $rows['PASSWORD']; ?>">
         <span class="eye"  id="eye" onclick="ToggleEye();" title="Hide/Show" >👁</span></td>
         <td><span title="More" class="MoreOption" ><ul>
            <li>...
                <ul>
                    <li><a href="includes/update.php?WEBSITE=<?php echo $rows['WEBSITE']; ?>" name="update">Update</a></li>
                    <li><a href="includes/delete.php?WEBSITE=<?php echo $rows['WEBSITE']; ?>" name="delete">Delete</a></li>
                    <li><a href="#" name="copy" >Copy</a></li>
                </ul>
            </li>
            </ul></span>
        </td>
    </tr>

    <?php
    }
     ?>

     
    </tbody>
   </table>
</div>
<!-- ====================******************* To Show//Hide the Passsword ***************================-->
<script>
    

var state=false;
var list, index;
list = document.getElementsByClassName("PasswordWrapper");
var passwordwrap=document.getElementsByClassName("PasswordWrapper")
const eye=document.getElementById("eye")


function ToggleEye(){
  if(state){  
    for (index = 0; index < list.length; ++index) {
list[index].setAttribute("type","password");
}
    eye.style.background='#b6b3b3';
    state=false;
  }else{           
    for (index = 0; index < list.length; ++index) {
list[index].setAttribute("type","text");
}
    eye.style.background='#413e3e';
     state=true;
  }
}
    </script>

</form>

<!-- ===================*************** To PopUp Box for Add Password in Table **********************===================== -->
    <form action="includes/SavePasswordToDataBase.php" method="post">
    <button type="button" title="ADD" class="addPasswordBtn" onclick="popupToggle();">+</button>    
    <div class="popup" id="popup">
        <div class="popupContent">
            <h2>ADD PASSWORD</h2>
            <div class="inputBox">
                <input type="text" name="website_name" id="website_name"  required>
                <label for="website_name">WebSite</label>
            </div>
            <div class="inputBox">
                <input type="text" name="website_url" id="website_url"  required>
                <label for="website_url">URL</label>
            </div>
            <div class="inputBox">
                <input type="text" name="website_username" id="website_username"  required>
                <label for="website_username">Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="website_password" id="website_password" required>
                <label for="website_password">Password</label>
            </div>
               
        </div>  
            <div class="SavePasswordButton">
                <button title="save" name="SavePasswordButton" type="submit">Save</button>
            </div>
            <div class="SavePasswordButton">
                <button title="reset" type="reset">Reset</button>
            </div>
               
                <button title="close" class="close" onclick="popupToggle();">✖</button>
    </div>
<script>
    function popupToggle(){
        const popup=document.getElementById('popup');
        popup.classList.toggle('active');
    }
</script>
<!-- ====================*********** To Search Password **********************=================================-->

<script>


function mySearchFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("SavedPasswordTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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
</form>
</body>
</html>