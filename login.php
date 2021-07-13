<?php 
 
include "dbconnection.php";
$sql=$conn->prepare("INSERT INTO User (username, password) VALUES (?, ?)"); 

 $sql -> bind_param("ss",$username,$password);
 //$username=$_POST['username'];
//
$sql ->execute();
$records=$sql->get_result();
return $records ->num_rows ===1;
var_dump($records);

$conn ->close();
 //return response();*/

?>



<html>
  <head>
    <title>Login</title>
  </head>

  <body style="background-color:lightblue">

    <form action="login.php" method="post">
     <br>
      <div align="center">
        <h1 style="color:Black"><u><b>Login</b></u></h1>
    <table>
    
      <label for="username">User Name: <span style="color:red;">*</span> </label>
      <input type="text" name="username">
        <span style="color:red;"></span>
        <br><br><br>
 
        <label for="password">Password: <span style="color:red;">*</span> </label>
       <input type="password" name="password" placeholder="password">
        <span style="color:red;"> </span>
        <br>

    </table>
<br>
<br>


 
    <button  type="submit" name="button" id = "button" class="btn btn-info" value = "button">ADD</button>
  
      </div>

</form>



  </body>

  </html>
