<?php

       //connect to database
    include('config/db_connect.php');

        //submit verification

        //procss the value from the form
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //check password confirmation
        $mdp1=$_POST['mdp1'];
        $mdp2=$_POST['mdp2'];
        if($mdp1==mdp2){

           $nom=$_POST['nom'];
           $prenom=$_POST['prenom'];
           $genre=$_POST['genre'];
           $date_naiss=$_POST['date_naiss'];
           $pays=$_POST['pays'];
           $adresse=$_POST['adresse'];
           $code_postal=$_POST['code_postal'];
           $email=$_POST['email'];
           $num_tel=$_POST['num_tel'];
           $type=$_POST['type'];
           if($type=="etudiant"){
            $universite=$_POST['universite'];
            $institut=$_POST['institut'];
            $specialite=$_POST['specialite'];
            $niveau=$_POST['niveau'];
            $competence=$_POST['competences'];
           //create sql
            $sql = "INSERT INTO etudiant VALUES(null,'$nom','$prenom','$genre','$email', '$mdp','$num_tel','$date_naiss','$pays','$adresse','$code_postal','$universite','$institut','$specialite','$')";

            //save to DB and check
            if(mysqli_query($conn, $sql)){
                echo 'User added';
            }else{
                echo 'query error: '.mysqli_error($conn);
            }
        } else{
            $entreprise=$_POST['entreprise'];
            $pays=$_POST['pays'];
           //create sql
            $sql = "INSERT INTO users(nom, prenom, email, mot_passe) VALUES('$nom','$prenom','$email', '$mdp')";

            //save to DB and check
            if(mysqli_query($conn, $sql)){
                echo 'User added';
            }else{
                echo 'query error: '.mysqli_error($conn);
            }
        }
    }
    else{
        $_SESSION['pwd-not-match']="<div> Veuillez confirmer votre mot de passe </div>"
        header('location'.SITEURL.'/index.php');
    }
}
?>

<?php 
    //write query for all users
    $sql = 'SELECT * FROM users ORDER BY prenom';//try timestamp

    //make query and get result
    $result = mysqli_query($conn, $sql);//array of records

    //fetch the resulting rows as an array
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);//the second param means that this will return an associative array

    //free result from memory (a good practise not necessary)
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

    print_r($users);//conversion ml array lstring lel affichage
    ?>

