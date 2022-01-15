    <?php

           //connect to database
    include('config/db_connect.php');

            //submit verification
    if(isset($_POST['submit']))
    {
            //check password confirmation
        $psd1=$_POST['password1'];
        $psd2=$_POST['password2'];
        if($psd1==$psd2){

           $fname=$_POST['fname'];
           $lname=$_POST['lname'];
           $gender=$_POST['gender'];
           $birthdate=$_POST['birthdate'];
           $address=$_POST['address'];
           $city=$_POST['city'];
           $zip=$_POST['zip'];
           $email=$_POST['email'];
           $phone=$_POST['phone'];
           $type=$_POST['type'];
           if($type=="student"){
            $university=$_POST['university'];
            $institute=$_POST['institute'];
            $speciality=$_POST['speciality'];
            $level=$_POST['level'];
            $skills = implode(",", $_POST['skills']);

               //create sql
            $sql = "INSERT INTO etudiant VALUES(null,'$lname','$fname','$gender','$email', '$psd1','$phone','$birthdate','$city','$address','$zip','$university','$institute','$speciality','$level','$skills')";

                //save to DB and check
            if(mysqli_query($conn, $sql)){
                echo 'User added';
            }else{
                echo 'query error: '.mysqli_error($conn);
            }
        } else{//type=employer
            $company=$_POST['company'];
            $website=$_POST['website'];
            $logo=$_FILES['logo']['name'];
                // image file directory
            $target = "images/".basename($logo);


               //create sql
            $sql = "INSERT INTO employeur VALUES(null,'$lname','$fname','$gender','$email', '$psd1','$phone','$birthdate','$city','$address','$zip','$company','$website','$logo')";

                //save to DB and check
            if(mysqli_query($conn, $sql)){
                //check image upload
                if (move_uploaded_file($_FILES['logo']['tmp_name'], $target)) {
                    echo "Image uploaded successfully";
                }else{
                    echo "Failed to upload image";
                }
                echo 'User added';
            }else{
                echo 'query error: '.mysqli_error($conn);
            }
        }
    }
    else{
        $_SESSION['pwd-not-match']="<div> Veuillez confirmer votre mot de passe </div>";
        header('location:'.'http://localhost/myProject');
    }
}
?>

<?php 
        //write query for all users
        $sql = 'SELECT * FROM etudiant ORDER BY prenom_et';//try timestamp

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

