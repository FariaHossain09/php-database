<!DOCTYPE html>
<html>
<head>
<title>Login page</title>
</head>
<body>
<h1>Login Page</h1>



<?php

$username="";
$password="";
$usernameErr=$passwordErr="";
$flag=false;
$done=false;



$successfulMessage = "";
$errorMessage = "";

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


/*if($_SERVER['REQUEST_METHOD']==="POST")
    {   echo "<br>";
            
            //$username = "faria";
            //$password = "123";

            

        if(empty($username))
        {
            $usernameErr="Field can not be empty!";
            $flag=true;
        }

        if(empty($password))
        {
            $passwordErr="Field can not be empty!";
            $flag=true;
        }
       if($username === $_POST['username'] && $password === $_POST['password'])
       {
          $arr1[] = array("username"=>$username,"password"=>$password);
          $result = write(json_encode($arr1) . "\n");
          $done=true;
        header("Location: welcome.php");
        }
    else {
              $errorMessage = "Login failed!";

         }*/
         





function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
}



function write($content) {
$fileName = "data.txt";
//$resource = fopen($password, "password");
//$fw = fwrite($resource, $content);
//fclose($resource);
//return $fw;
}



?>


    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <fieldset>
    <legend>Please Enter Your Information:</legend>
    <label for="username">User Name:</label>
    <input type="text" id="username" name="username">
    <spam style="color:red"><?php echo $usernameErr;?></spam>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <spam style="color:red"><?php echo $passwordErr;?></spam>
    </fieldset>
    <br><br>
    <input type="submit" name="submit" value="Login">
     
    
       
       
    

       
    </form>


    <span style="color: green;"><?php echo $successfulMessage; ?></span>
    <span style="color: red;"><?php echo $errorMessage; ?></span>



    <br>



<?php
$readData = read();
$arr1 = explode("\n", $readData);



echo "<ol>";
for($i = 0; $i < count($arr1) - 1; $i++) {
$decode = json_decode($arr1[$i]);
echo "<li>" . $decode->username . " - " . $decode->password . "</li>";
}
echo "</ol>";



function read() {
$fileName = "data.txt";
$fileSize = filesize($fileName);
$fr = "";
if($fileSize > 0) {
$resource = fopen($fileName, "r");
$fr = fread($resource, $fileSize);
fclose($resource);
return $fr;
}
}

?>

</body>
</html>