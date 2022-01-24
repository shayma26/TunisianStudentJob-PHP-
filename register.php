    <?php

    // Connect to database
    include('config/constants.php');

    // Submit verification
    if(isset($_POST['submit']))
    {
        // Check email if existed in students
        $email = $_POST['email'];
        $verifemailreq = "SELECT * FROM etudiant WHERE email_et='$email'";

        $res = mysqli_query($conn, $verifemailreq);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['emailExist'] = "<div class=\"alert alert-danger\" role=\"alert\">Please enter a valid e-mail</div>";
            header('location:'.SITEURL.'signup.php');
        }
        else{// Check email if existed in employers
         $verifemailreq="SELECT email_em FROM employeur WHERE email_em='$email'";
         $res = mysqli_query($conn, $verifemailreq);
         $count = mysqli_num_rows($res);

         if($count==1){
            $_SESSION['emailExist'] = "<div class=\"alert alert-danger\" role=\"alert\">Please enter a valid e-mail</div>";
            header('location:'.SITEURL.'signup.php');
        }else{
            // Check password confirmation
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
             $phone=$_POST['phone'];
             $type=$_POST['type'];

             if($type=="student"){
                $university=$_POST['university'];
                $institute=$_POST['institute'];
                $speciality=$_POST['speciality'];
                $level=$_POST['level'];
                $skills = implode(",", $_POST['skills']);

                // Create sql
                $sql = "INSERT INTO etudiant VALUES(null,'$lname','$fname','$gender','$email', '$psd1','$phone','$birthdate','$city','$address','$zip','$university','$institute','$speciality','$level','$skills',null)";

                // Save to DB and check
                if(mysqli_query($conn, $sql)){
                    $_SESSION['registerSuccess'] = '<div class="alert alert-success" role="alert">User registered successfully</div>';
                    $_SESSION['user'] = $email;
                    $_SESSION['username'] = $fname;
                    $_SESSION['type'] = 'student';
                    header('location: '.SITEURL);
                }else{
                    echo 'query error: '.mysqli_error($conn);
                }
        } else{// type=employer

        // Check company if existed
            $company=$_POST['company'];
            $verifcompanyreq = "SELECT * FROM employeur WHERE entreprise='$company'";

            $res = mysqli_query($conn, $verifcompanyreq);

            $count = mysqli_num_rows($res);

            if($count==1){
                $_SESSION['companyExist'] = "<div class=\"alert alert-danger\" role=\"alert\">Company name is already existed</div>";
                header('location:'.SITEURL.'signup.php');
            }
            else{
                $website=$_POST['website'];
                $logo=$_FILES['logo']['name'];
            // image file directory
                $logoTarget = "images/".basename($logo);
                $logoType = strtolower(pathinfo($logo,PATHINFO_EXTENSION));

            // Allow only image file formats or empty
                if($logoType != "jpg" && $logoType != "png" && $logoType != "jpeg" && $logoType != "gif" && $_FILES['logo']['error']!=4 ) {
                 $_SESSION['imgError'] = "<div class=\"alert alert-danger\" role=\"alert\">Only image files are allowed".$logoType."</div>";
                 header('location:'.SITEURL.'signup.php');
             }else{
                // Insertion request
                $sql = "INSERT INTO employeur VALUES(null,'$lname','$fname','$gender','$email', '$psd1','$phone','$birthdate','$city','$address','$zip','$company','$website','$logo',null)";

                // Save to DB and check
                if(mysqli_query($conn, $sql)){
                    if (move_uploaded_file($_FILES['logo']['tmp_name'], $logoTarget)) {
                echo "Image uploaded successfully";
            } else {
                echo "Failed to upload image";
            }
                    $_SESSION['registerSuccess'] = '<div class="alert alert-success" role="alert">User registered successfully</div>';
                    $_SESSION['user'] = $email;
                    $_SESSION['username'] = $fname;
                    $_SESSION['type'] = 'employer';
                    header('location: '.SITEURL);
                }else{
                    echo 'query error: '.mysqli_error($conn);
                }
            }
        }

    }
}
else{        
    $_SESSION['pwd-not-match']= "<div class=\"alert alert-danger\" role=\"alert\"> Veuillez confirmer votre mot de passe </div>";
    header('location:'.SITEURL.'signup.php');
}
}

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

        print_r($users);//conversion ml array lstring lel affichage
    ?>