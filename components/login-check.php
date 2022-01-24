<?php 

    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        //User is not logged in
        //REdirect to login page with message
        $_SESSION['no-login-message'] = "<div class=\"alert alert-danger\" role=\"alert\">Please login to access.</div>";
        //REdirect to Login Page
        header('location:'.SITEURL);
    }

?>