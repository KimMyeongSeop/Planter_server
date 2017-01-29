<?php
class Login extends CI_Model {
 
    function __construct()
    {       
        parent::__construct();
    }

    function index(){

    $con=mysqli_connect("192.168.0.45","root","raspberry","db"); 
	mysqli_set_charset($con,"utf8");
    $mysqli = new mysqli("192.168.0.45", "root", "raspberry", "db");
  
	if (mysqli_connect_errno($con))  
	{  
   		echo "Failed to connect to MySQL: " . mysqli_connect_error();  
	} 

    $id = $_POST['id'];  
    $pw = $_POST['pw'];
    //$id="qweqwe";
    //$pw="110";
    $encypted_pw=sha1($pw);

    $q="SELECT * FROM Person WHERE id='$id'";
    $result = $mysqli->query($q);

    $success="1";
    $pw_fail="2";
    $no_id="3";

    if($result->num_rows==1){
        //해당 ID의 회원이 존재할 경우
        //암호가 맞는지를 확인
        $row=$result->fetch_array(MYSQLI_ASSOC);

        if($row['pw'] == $encypted_pw){
            //올바른 정보
            echo json_encode($success);
        }
        else{
            //암호가 틀렸음
            echo "암호가 일치하지 않습니다.";
        }
    }
    else {
        //없거나 비정상
        echo "id가 존재하지 않음";
    }
     
}
}