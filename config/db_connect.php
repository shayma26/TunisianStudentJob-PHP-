<?php 
session_start();
	 //connect to database
    $conn = mysqli_connect('localhost','root','');
$cn=mysqli_select_db($conn,'student_jobs');
    //check connect
  
    if(!$conn){
       
        echo 'Connection error: ', mysqli_connect_error();
    }
 ?>