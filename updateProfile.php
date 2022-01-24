<?php
include('config/constants.php');
include('components/login-check.php');

if(isset($_POST['update']))
{
    $id=$_SESSION['id'];

    $type = $_SESSION['type'];
    $newfname = $_POST['fname'];
	$newlname = $_POST['lname'];
	$newemail = $_POST['email'];
	$newbirthdate=$_POST['birthdate'];
	$newaddress=$_POST['address'];
	$newcity=$_POST['city'];
	$newzip=$_POST['zip'];
    $newphone=$_POST['phone'];
	$newpsd=$_POST['password'];
				
    if($type=="student"){
        $newuniversity=$_POST['university'];
        $newinstitute=$_POST['institute'];
        $newspeciality=$_POST['speciality'];
        $newlevel=$_POST['level'];
        $oldskills=$_SESSION['oldskills'];
        if(isset($_POST['skills'])){
            $newskills=implode(",",$_POST['skills']);
        }else{
            $newskills=$oldskills;
        }
        

                // Create sql
                $sql = "UPDATE etudiant SET nom_et='$newlname',prenom_et='$newfname',email_et='$newemail', mdp_et='$newpsd',num_et='$newphone',dn_et='$newbirthdate',ville_et='$newcity',adr_et='$newaddress',code_postale_et='$newzip',universite_et='$newuniversity',institut_et='$newinstitute',specialite_et='$newspeciality',niveau_et='$newlevel',competences_et='$newskills' WHERE id_et='$id'";

                // Save to DB and check
                if(mysqli_query($conn, $sql)){
                    $_SESSION['updateSuccess'] = '<div class="alert alert-success" role="alert">User updated successfully</div>';
                    $_SESSION['user'] = $newemail;
                    $_SESSION['username'] = $newfname;
                    header('location: '.SITEURL.'profile.php');
                }else{
                    echo 'query errorrr: '.mysqli_error($conn);
                }
        } else{// type=employer

        // Check company if existed
            $newcompany=$_POST['company'];
            if($newcompany!=$oldcompany){

            $verifcompanyreq = "SELECT * FROM employeur WHERE entreprise='$newcompany'";

            $res = mysqli_query($conn, $verifcompanyreq);

            $count = mysqli_num_rows($res);

            if($count==1){
                $_SESSION['companyExist'] = "<div class=\"alert alert-danger\" role=\"alert\">Company name is already existed</div>";
                header('location:'.SITEURL.'profile.php');
            }
            }
                $newwebsite=$_POST['website'];
                $newlogo=$_FILES['logo']['name'];
            // image file directory
                $logoTarget = "images/".basename($logo);
                $logoType = strtolower(pathinfo($logo,PATHINFO_EXTENSION));

            // Allow only image file formats or empty
                if($logoType != "jpg" && $logoType != "png" && $logoType != "jpeg" && $logoType != "gif" && $_FILES['logo']['error']!=4 ) {
                 $_SESSION['imgError'] = "<div class=\"alert alert-danger\" role=\"alert\">Only image files are allowed".$logoType."</div>";
                 header('location:'.SITEURL.'signup.php');
             }else{
                // Insertion request
                $sql = "UPDATE employeur SET nom_em='$newlname',prenom_em='$newfname',email_em='$newemail', mdp_em='$newpsd',num_em='$newphone',dn_em='$newbirthdate',ville_em='$newcity',adr_em='$newaddress',code_postale_em='$newzip', entreprise='$newcompany',site_web='$newwebsite', logo='$newlogo' WHERE id_em='$id'";

                // Save to DB and check
                if(mysqli_query($conn, $sql)){
                    $_SESSION['updateSuccess'] = '<div class="alert alert-success" role="alert">User updated successfully</div>';
                    $_SESSION['user'] = $newemail;
                    $_SESSION['username'] = $newfname;
                    $_SESSION['type'] = 'employer';
                    header('location: '.SITEURL.'profile.php');
                }else{
                    echo 'query error: '.mysqli_error($conn);
                }
            }
        

    }			    
}
 ?>