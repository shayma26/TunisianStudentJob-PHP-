<?php

//connect to database
include('config/db_connect.php');

/*******delete employer announce****** */
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

/*******update employer announce****** */
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
/*******delete student announce from favourites****** */
if (isset($_POST['delete_fav']) && isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
    $id_et=$_SESSION['id_et'];
    $sql="DELETE FROM  favoris WHERE id_an=$id AND id_et=$id_et";
    $sql3="UPDATE annonce SET nombre_vues=nombre_vues-1 WHERE id_an=$id";
    
    if ($res = mysqli_query($conn, $sql)) {
        if ($res3 = mysqli_query($conn, $sql3))
       {// echo' announce '.$id.'deleted successfully';
       header('location:http://localhost/myProject/favourite-announces.php');
        unset($_SESSION['id']);}
    }
    else {
        echo 'delete_query error: ' . mysqli_error($conn);
      }
}


?>