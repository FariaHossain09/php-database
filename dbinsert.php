<?php

include 'dbconnection.php';
//$conn=connect();

/*$sql = $conn->prepare("INSERT INTO User (username, password) VALUES (?, ?)"); // prepare and bind
$sql->bind_param("ss", $username, $password);
// set parameters and execute

$username = "abc";
$password = "111";
$response=$sql->execute();
var_dump($response);
$conn->close();*/

function register ( $fname,$lname,$gender,$birthday,$re,$paddress,$ppaddress,$phone,$email,$username,$password)
{
    $conn=connect();
$sql=$conn->prepare("INSERT INTO Users (fname,lname,gender,birthday,re,paddress,ppaddress,phone,email,username, password) VALUES (?, ?,?,?,?,?,?,?,?,?,?)"); 

 $sql -> bind_param("sssssssssss",$fname,$lname,$gender,$birthday,$re,$paddress,$ppaddress,$phone,$email,$username,$password);


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


$response = $sql ->execute();
var_dump($response);

$conn ->close();
 //return response();
}




?>






