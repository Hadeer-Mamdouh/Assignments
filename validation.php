<?php


session_start();


$servername="localhost";
$dbuser="root";
$dbpassword="";
$dbname="rout-company";   // check your DB name

if(isset($_SESSION['mail'])){

$conn= new mysqli ($servername,$dbuser,$dbpassword,$dbname);


if($conn->connect_error)

die("not connect :".$conn->connect_error);
else
    



$employeeNumber=$_GET["employeeNumber"];

$lastName=$_GET["lastName"];

$firstName=$_GET["firstName"];

$extension=$_GET["extension"];

$email=$_GET["email"];

$officeCode=$_GET["officeCode"];

$reportsTo=$_GET["reportsTo"];

$jobTitle=$_GET["jobTitle"];

$password=$_GET["password"];

if(strlen($lastName)>50 || strlen($firstName)>50 || strlen($extension)>10 || strlen($email)>100
  || strlen($officeCode)>10 || strlen($jobTitle)>50){
    
    echo "too long string";
}
else if(is_numeric($reportsTo)==="false" || is_numeric($password)==="false"){
    
    echo "input must be number";
}

else if(is_string($lastName)==="false" || is_string($firstName)==="false" ||is_string($extension)==="false" || is_string($email)==="false" || is_string($officeCode)==="false" || is_string($jobTitle)==="false"  ){
    
    echo "input must be string";
}

else{
    
    $query="  

INSERT INTO `employees` (employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle,password)

VALUES ('$employeeNumber','$lastName','$firstName','$extension','$email','$officeCode','$reportsTo','$jobTitle','$password')
";
    $result=$conn->query($query);
}
}

else {
    
    	echo " Go <a href='login.php'>Login</a> <br/>";

}


?>