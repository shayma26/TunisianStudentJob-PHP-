<?php

//connect to database
include('config/db_connect.php');

//submit verification
if (isset($_POST['submit'])) {
    $position = $_POST['position'];
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $salaire = $_POST['salaire'];
    $description = $_POST['description'];
    $skills = implode(",", $_POST['skills']);
    $type = $_POST['types'];
    //récupérer l'email de l'utilisateur courant
    $email = $_SESSION['user'];
    //traitement de l'image
    $img = $_FILES['img']['name'];
    // image file directory
    $imgTarget = "images/" . basename($img);
    $imgType = strtolower(pathinfo($img, PATHINFO_EXTENSION));


    //trouve ID ,num de l'employeur en courant
    $sql = "SELECT id_em,num_em FROM employeur WHERE email_em='$email'";
    if ($res = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_assoc($res);
        $id = $row['id_em'];
        $num_contact = $row['num_em'];
    } else {
        echo 'search_query error: ' . mysqli_error($conn);
    }

    //verifier que le fichier est une image puis insérer
    if ($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif") {
        echo "Sorry, only image files are allowed.";
    } else {
        //create sql
        $sql2 = "INSERT INTO annonce VALUES(null,'$start_date','$end_date','$location',' $position', '$description','$type','$skills','$salaire','$id','$email','$num_contact','$img',CURRENT_TIMESTAMP()
            )";

        //save to DB and check
        if (mysqli_query($conn, $sql2)) {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $imgTarget)) {
                echo "Image uploaded successfully";
            } else {
                echo "Failed to upload image";
            }
            header('location:' . 'http://localhost/myProject');
        } else {
            echo 'insert_query error: ' . mysqli_error($conn);
        }
    }
}
