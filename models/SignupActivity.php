<?php
class SignupActivity extends CI_Model {
 
    function __construct()
    {       
        parent::__construct();
    }

    function index(){

    $con=mysqli_connect("192.168.0.45","root","raspberry","db"); 
	mysqli_set_charset($con,"utf8");
  
	if (mysqli_connect_errno($con))  
	{  
   		echo "Failed to connect to MySQL: " . mysqli_connect_error();  
	} 

    $id = $_POST['id'];  
    $pw = $_POST['pw'];
    $encypted_pw=sha1($pw);  
    $result = mysqli_query($con,"insert into Person (id,pw) values ('$id','$encypted_pw')"); 
    }
     
}