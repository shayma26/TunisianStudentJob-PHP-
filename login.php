<?php

include('config/constants.php');


//submit verification

//procss the value from the form
//check whether the submit button is clicked or not
if(isset($_POST['submit_login']))
{  
$email=mysqli_real_escape_string($conn, $_POST['email']);

$mdp = mysqli_real_escape_string($conn, $_POST['pwd']);
$req_et="select * from etudiant where email_et='$email' and mdp_et='$mdp'";
$req_em="select * from employeur where email_em='$email' and mdp_em='$mdp'";
$res1=mysqli_query($conn,$req_et);
$res2=mysqli_query($conn,$req_em);
$count1=mysqli_num_rows($res1);
$count2=mysqli_num_rows($res2);
if($count1==1)
{  //It's a student
    //User AVailable and Login Success
  //  $_SESSION['login'] = "<div class='alert alert-success' role='alert'>Login Successful.</div>";
    $_SESSION['user'] = $email; //TO check whether the user is logged in or not and logout will unset it
    $_SESSION['type'] = 'student';
    //REdirect to HOme Page/Dashboard
    header('location:'.'http://localhost/myProject/');

  

}
else if($count2==1)
{
      //It's an employer
       //User AVailable and Login Success
     //  $_SESSION['login'] = "<div class='alert alert-success' role='alert'>Login Successful.</div>";
       $_SESSION['user'] = $email; //TO check whether the user is logged in or not and logout will unset it
       $_SESSION['type'] = 'employer';
       //REdirect to HOme Page/Dashboard
       header('location:'.'http://localhost/myProject/');
}
else
           {
                 //User not Available and Login FAil
           $_SESSION['login'] = "<div class='alert alert-warning' role='alert'>Email or Password did not match.</div>";
           //REdirect to HOme Page/Dashboard
           header('location:'.'http://localhost/myProject/'.'signin.php');
           }
}

?>
