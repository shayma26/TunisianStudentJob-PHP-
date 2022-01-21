<?php

//connect to database
include('config/db_connect.php');

//submit verification
if (isset($_POST['delete']) && isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
    $sql="DELETE FROM  annonce WHERE id_an=$id";
    if ($res = mysqli_query($conn, $sql)) {
        echo' announce '.$id.'deleted successfully';
       header('location:http://localhost/myProject/employer-announces.php');
        unset($_SESSION['id']);
    }
    else {
        echo 'delete_query error: ' . mysqli_error($conn);
      }
}
if (isset($_POST['delete']) && isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
    $sql="DELETE FROM  annonce WHERE id_an=$id";
    if ($res = mysqli_query($conn, $sql)) {
        echo' announce '.$id.'deleted successfully';
       header('location:http://localhost/myProject/employer-announces.php');
        unset($_SESSION['id']);
    }
    else {
        echo 'delete_query error: ' . mysqli_error($conn);
      }
}

if(isset($_POST['submit']))
{   $id = $_SESSION['id'];
    $position = $_POST['position'];
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $salaire = $_POST['salaire'];
    $description = $_POST['description'];
    $skills = implode(",", $_POST['skills']);
    $type = $_POST['types'];
    $sql2="UPDATE annonce SET localisation='$location',poste='$position ',date_deb=' $start_date ',date_fin='$end_date',description='$description',salaire='$salaire',type='$type',competences='$skills',date_depot=CURRENT_TIMESTAMP() WHERE id_an=$id";
    if (mysqli_query($conn, $sql2)) {
        header('location:http://localhost/myProject/employer-announces.php');
    } else {
        echo 'update_query error: ' . mysqli_error($conn);
    }
}

?>