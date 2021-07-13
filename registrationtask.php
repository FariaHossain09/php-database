<!DOCTYPE html>
<html>
<head>
<title>PHP File IO</title>
</head>
<body>
<h1>PHP File IO</h1>



<?php
include "dbinsert.php";

 
/*include "dbconnection.php";
$sql=$conn->prepare("INSERT INTO User (username, password) VALUES (?, ?)"); 

 $sql -> bind_param("ss",$username,$password);
 $username=$_POST['username'];
$password=$_POST['password'];

$response = $sql ->execute();
var_dump($response);

$conn ->close();
 //return response();*/








$fname=$lname=$gender=$birthday=$re=$email=$username=$password=$paddress=$ppaddress=$phone="";
$fnameErr=$lnameErr=$genderErr=$birthdayErr=$reErr=$emailErr=$usernameErr=$passwordErr="";
$flag=false;


$successfulMessage = "";
$errorMessage = "";
 //$valid=true;


 if(isset($_POST["submit"]))  
    {   echo "<br>";
            $fname=$_POST['fname'];
            $lname=$_POST['lname']; 
            $gender=$_POST['gender'];
            $birthday=$_POST['birthday'];
            $re=$_POST['re']; 
            $email=$_POST['email'];
            $paddress=$_POST['paddress'];
            $ppaddress=$_POST['ppaddress'];
            $phone=$_POST['phone'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            
       if(empty($fname))
        {
            $fnameErr="Field can not be empty!";
            $flag=true;
        }

        if(empty($lname))
        {
            $lnameErr="Field can not be empty!";
            $flag=true;
        }

        if(empty($gender))
        {
            $genderErr="Field can not be empty!";
            $flag=true;
        }

        if(empty($birthday))
        {
        	$birthdayErr="Field can not be empty!";
        	$flag=true;
        }

        if(empty($re))
        {
        	$reErr="Field can not be empty!";
        	$flag=true;
        }

        if(empty($email))
        {
        	$emailErr="Email is not validated!";
        	$flag=true;
        }

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


if(!$flag) {

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    $re=$_POST['re'];
    $paddress=$_POST['paddress'];
    $ppaddress=$_POST['ppaddress'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
 
$result = register($fname,$lname,$gender,$birthday,$re,$paddress,$ppaddress,$phone,$email,$username,$password);
if($result) {
$successfulMessage = "Successfully Saved!";
}
else {
$errorMessage = "Error while saving!";
}
}
}




function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
}



function write($content) {
$fileName = "data.txt";
$resource = fopen($fileName, "a");
$fw = fwrite($resource, $content);
fclose($resource);
return $fw;
}



?>



<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
		<form>
		<fieldset>
        <legend>Basic Information:</legend>
        <label for="fname">First name:</label>
		<input type="text" name="fname" id="fname" value ="<?php echo $fname;?>" > 
		<spam style="color:red"><?php echo $fnameErr;?></spam>
		
		<br><br>
		<label for="lname">Last name:</label>
		<input type="text" name="lname" id="lname" value ="<?php echo $lname;?>" > 
		<spam style="color:red"><?php echo $lnameErr;?></spam>
         <br> <br>
		<label for="gender">Gender:</label>
		<spam style="color:red"><?php echo $genderErr;?></spam>
        <br>
        <input type="radio" id="male" name="gender" value="male">
		<label for="male">Male</label>
		<br>
		<input type="radio" id="female" name="gender" value="female">
		<label for="female">Female</label>
		<br>
		<input type="radio" id="other" name="gender" value="other">
		<label for="other">Other</label>
		<br><br>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday">
        <spam style="color:red"><?php echo $birthdayErr;?></spam>
        <br><br>
        <label for="re">Religion:</label>
        <select name="re" id="re">
        <option value="select">Select</option>
        <option value="Islam">Islam</option>
        <option value="Hindu">Hindu</option>
        <option value="Christian">Christian</option> 
        </select> <spam style="color:red"><?php echo $reErr;?></spam>
        </fieldset>
        <br><br>


    <fieldset>
    <legend>Contact Information:</legend>
    <label for="paddress">Present Address:</label>
    <input type="text" id="paddress" name="paddress"><br><br>
    <label for="ppaddress">Premanent address:</label>
    <input type="text" id="ppaddress" name="ppaddress"><br><br>

    <label for="phone">phone:</label>
    <input type="tel" id="phone" name="phone">
    <br><br>
    <label for="email">Enter your email:</label>
    <input type="email" id="email" name="email">
    <spam style="color:red"><?php echo $emailErr;?></spam>
    <br><br>
    <label for="a">Personal website link:</label>
    <a href="https://github.com/FariaHossainBorna/registration-form/">Visit github.com!</a>
    </fieldset>
    <br><br>
          

     <fieldset>
    <legend>Account Information:</legend>
    <label for="username">User Name:</label>
    <input type="text" id="username" name="username">
    <spam style="color:red"><?php echo $usernameErr;?></spam>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <spam style="color:red"><?php echo $passwordErr;?></spam>
    </fieldset>
    <br><br>


		<input type="submit" name="submit" value="Submit">
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
echo "<li>" . $decode->fname . " - " . $decode->lname . " - " . $decode->gender . " - " . $decode->birthday . " - " . $decode->re . " - " . $decode->paddress . " - " . $decode->ppaddress." - ". $decode->phone . " - " . $decode->email . " - " . $decode->username . " - " . $decode->password . "</li>";
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