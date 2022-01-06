<?php 
	 //connect to database
    $conn = mysqli_connect('localhost','root','','php_project');

    //check connection
    if(!$conn){
        echo 'Connection error: ', mysqli_connect_error();
    }
 ?>