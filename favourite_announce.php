<?php

//connect to database
include('config/db_connect.php');

//submit verification
if (isset($_POST['fav'])) {
    $id_an=$_SESSION['id_an'];
 $email=$_SESSION['user'];
    $sql = "SELECT id_et FROM etudiant WHERE email_et='$email'";
    if ($res = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_assoc($res);
        $id_et = $row['id_et'];
    } else {
        echo 'search_query error: ooops' . mysqli_error($conn);
    }

    $sql2 = "INSERT INTO favoris VALUES($id_et,$id_an,null)";
    $sql3="UPDATE annonce SET nombre_vues=nombre_vues+1 WHERE id_an=$id_an";
    if ($res2 = mysqli_query($conn, $sql2)) {
      {  if ($res3 = mysqli_query($conn, $sql3))
        header('location:'.'http://localhost/myProject/announce.php');}
    } else {
        echo 'insert_query error:ooops ' . mysqli_error($conn);
    }

    } 
    

