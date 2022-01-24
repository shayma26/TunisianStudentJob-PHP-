<?php 

    //Include constants.php file here
    include('config/constants.php');

    // 1. get the email of Profile to be deleted
    $email = $_SESSION['user'];
    $type = $_SESSION['type'];
        
    //2. Create SQL Query to Delete Profile
    if($type == 'student'){
        $sql = "DELETE FROM etudiant WHERE email_et=$email";
    }else{
        $sql = "DELETE FROM employeur WHERE email_em=$email";
    }

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        header('location:'.SITEURL);
    }
    else
    {
        //Failed to Delete Profile
        $_SESSION['delete'] = "<div class=\"alert alert-danger\" role=\"alert\">Failed to Delete account. Try Again Later.</div>";
        header('location:'.SITEURL.'profile.php');
    }

?>