<?php include('components/header.php');
include('components/login-check.php');
?>
<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<ol>
				<li><a href="index.php">Home</a></li>
				<li>Profile</li>
			</ol>
			<h2>Update Profile</h2>

		</div>
	</section><!-- End Breadcrumbs -->

		<?php
		if (isset($_POST['goupdate'])) {
			$email = $_SESSION['user'];
			$type = $_SESSION['type'];
			if ($type == 'student') {
				$inforeq = "SELECT * from etudiant where email_et = '$email'";
				$resinfo = mysqli_query($conn, $inforeq);
				$row = mysqli_fetch_assoc($resinfo);
				$id= $row['id_et'];
				$fname = $row['prenom_et'];
				$lname = $row['nom_et'];
				$gender=$row['genre_et'];
				$birthdate=$row['dn_et'];
				$address=$row['adr_et'];
				$city=$row['ville_et'];
				$zip=$row['code_postale_et'];
				$phone=$row['num_et'];
				$university=$row['universite_et'];
				$institute=$row['institut_et'];
				$speciality=$row['specialite_et'];
				$level=$row['niveau_et'];
                $skills=explode(",",$row['competences_et']);
                $mdp=$row['mdp_et'];
            }
            else{
            	$inforeq = "SELECT * from employeur where email_em = '$email'";
            	$resinfo = mysqli_query($conn, $inforeq);
            	$row = mysqli_fetch_assoc($resinfo);
            	$id= $row['id_em'];
            	$fname = $row['prenom_em'];
            	$lname = $row['nom_em'];
            	$phone=$row['num_em'];
				$gender=$row['genre_em'];
				$birthdate=$row['dn_em'];
				$address=$row['adr_em'];
				$city=$row['ville_em'];
				$zip=$row['code_postale_em'];
				$website=$row['site_web'];
            	$company=$row['entreprise'];
            	$img=$row['logo'];
                $mdp=$row['mdp_em'];

            }
        }

        ?>

    <section id="services" class="services">
    	<div class="container">
    		<form class="row g-3" method="POST" action="updateProfile.php" id="update_form" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="inputfname" name="fname" minlength="3" required value="<?php echo $fname; ?>">
                </div>
                <div class="col-md-6">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputlname" name="lname" minlength="2" required value="<?php echo $lname; ?>">
                </div>

                <div class="col-md-6">
                    <label for="birthdate" class="form-label">Birth-date</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" min="1930-01-01" max="2010-01-01" value="<?php echo $birthdate; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="number" class="form-control" id="phone" name="phone" required pattern="[1-9]{8}" title="Please enter a valid phone number" value="<?php echo $phone; ?>">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $mdp; ?>" required>
                </div>
                <div class="col-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
                </div>

                <div class="col-md-4">
                    <label for="city" class="form-label">City</label>
                    <select id="city" class="form-select" name="city" required>
                        <script type="text/javascript">
                            var governorats = ['Ariana', 'Béja', 'Ben Arous', 'Bizerte', 'Gabès', 'Gafsa', 'Jendouba', 'Kairouan', 'Kasserine', 'Kebili', 'Kef', 'Mahdia', 'Manouba', 'Medenine', 'Monastir', 'Nabeul', 'Sfax', 'Sidi Bouzid', 'Siliana', 'Sousse', 'Tataouine', 'Tozeur', 'Tunis', 'Zaghouan'];
                            for (var i = 0; i < governorats.length; i++) {
                            	if(governorats[i]=="<?php echo $city; ?>")
                                document.write("<option value="+governorats[i]+" selected>"+governorats[i]+"</option>");
                                else
                                document.write("<option value="+governorats[i]+" selected>"+governorats[i]+"</option>");
                                	
                            }

                        </script>

                    </select>
                </div>
                <div class="col-md-2">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="number" class="form-control" id="zip" name="zip" min="1" value="<?php echo $zip; ?>" required>
                </div>
                <?php
                	if($type=='student'){
                		echo '
                			<div class="student">
                    <div class="col-md-6">
                        <label for="university" class="col-form-label col-md-6">University</label>
                        <select id="university" class="form-select" name="university">
                            <option value="'.$university.'" selected></option>
                            <option value="carthage">Carthage</option>
                            <option value="gabes">Gabès</option>
                            <option value="gafsa">Gafsa</option>
                            <option value="jendouba">Jendouba</option>
                            <option value="kairouan">Kairouan</option>
                            <option value="manouba">La Manouba</option>
                            <option value="monastir">Monastir</option>
                            <option value="sfax">Sfax</option>
                            <option value="sousse">Sousse</option>
                            <option value="tunis">Tunis</option>
                            <option value="manar">El Manar</option>
                            <option value="uvt">Université virtuelle de Tunis</option>
                            <option value="zitouna">Université Zitouna</option>
                            <option value="iset">Instituts supérieurs des études technologiques</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="institute" class="col-form-label col-md-6">Institute</label>
                        <select id="institute" class="form-select" name="institute" ><option disabled selected></option></select>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $("#university").change(function() {
                                    var val = $(this).val();
                                    if (val == "sousse") {
                                        $("#institute").html(
                                            "<option value=\'fsegs\'>Faculté des Sciences Economiques et de Gestion de Sousse</option><option value=\'fdsps\'>Faculté de Droit et des Sciences Politiques de Sousse</option><option value=\'fms\'>Faculté de Médecine Ibn El Jazzar de Sousse</option><option value=\'flshs\'>Faculté des Lettres et des Sciences Humaines de Sousse</option><option value=\'ihecs\'>Institut des Hautes Etudes Commerciales de Sousse</option><option value=\'isffs\'>Institut Supérieur de Finances et de Fiscalité de Sousse</option><option value=\'isbas\'>Institut Supérieur des Beaux Arts de Sousse</option><option value=\'isgs\'>Institut Supérieur de Gestion de Sousse</option><option value=\'isitchs\'>Institut Supérieur d\'Informatique et des Technologies de Communication de Hammam Sousse</option><option value=\'isms\'>Institut Supérieur de Musique de Sousse</option><option value=\'issatso\'>Institut Supérieur des Sciences Appliquées et de Technologie de Sousse</option><option value=\'istls\'>Institut Supérieur du Transport et de la Logistique de Sousse</option><option value=\'eniso\'>Ecole Nationale d’Ingénieurs de Sousse</option><option value=\'essths\'>Ecole Supérieure des Sciences et des technologies de Hammam Sousse</option><option value=\'isacm\'>Institut Supérieur Agronomique de Chott Mériem</option><option value=\'esstss\'>Ecole Supérieure des Sciences et Techniques de la Santé de Sousse</option><option value=\'issis\'>Institut Supérieur des Sciences infirmières de Sousse</option>"
                                            );
                                    } else if (val == "kairouan") {
                                        $("#institute").html(
                                            "<option value=\'flshk\'>Faculté des Lettres et des Sciences Humaines de Kairouan</option><option value=\'fst\'>Faculté des Sciences et Techniques de Sidi Bouzid</option><option value=\'isamk\'>Institut Supérieur des Arts et Métiers de Kairouan</option><option value=\'isigk\'>Institut Supérieur d\'Informatique et de Gestion de Kairouan</option><option value=\'isejpk\'>Institut Supérieur des Etudes Juridiques et Politiques de Kairouan</option><option value=\'issatk\'>Institut Supérieur des Sciences Appliquées et de Technologie de Kairouan</option>"
                                            );
                                    } else if (val == "monastir") {
                                        $("#institute").html(
                                            "<option value=\'fsm\'>Faculté des Sciences de Monastir</option><option value=\'fmm\'>Faculté de Médecine de Monastir</option><option value=\'fmdm\'>Faculté de Médecine Dentaire de Monastir</option><option value=\'fphm\'>Faculté de Pharmacie de Monastir</option><option value=\'fsegm\'>Faculté des Sciences Economiques et de Gestion de Mahdia</option><option value=\'enim\'>Ecole Nationale d\'Ingénieurs de Monastir</option><option value=\'ipeim\'>Institut Préparatoire aux Etudes d\'Ingénieurs de Monastir</option><option value=\'isbm\'>Institut Supérieur de Biotechnologie de Monastir</option><option value=\'isimm\'>Institut Supérieur d\'Informatique et de Mathématiques de Monastir</option>"
                                            );
                                    } else if (val == "tunis") {
                                        $("#institute").html(
                                            "<option value=\'fshst\'>Faculté des Sciences Humaines et Sociales de Tunis</option><option value=\'ens\'>Ecole Normale Supérieure</option><option value=\'essect\'>Ecole Supérieure des Sciences Economiques et Commerciales de Tunis</option><option value=\'ensit\'>École Nationale Supérieure d’Ingénieurs de Tunis</option><option value=\'ipeit\'>Institut Préparatoire aux Etudes d\'Ingénieurs de Tunis</option><option value=\'ipelsht\'>Institut Préparatoire aux Etudes Littéraires et de Sciences Humaines de Tunis</option>"
                                            );
                                    }
                                });
});
</script>
</div>
<div class="col-md-4">
    <label for="speciality" class="col-form-label col-md-4">Speciality</label>
    <select id="speciality" class="form-select" name="speciality" ><option disabled selected></option></select>
    <script type="text/javascript">


        $(document).ready(function() {
            $("#institute").change(function() {
                var val = $(this).val();
                if (val == "issatso") {
                    var specialities=["Cycle préparatoire integré","Formation ingénieur","Licence en Génie Mécanique","Licence en Génie Civil","Licence en Electromécanique","Licence en Génie Énergétique","Licence en Sciences de l Informatique","Licence en Ingénierie des Systèmes de l Informatique","Licence en EEA","Mastère Professionnel En Génie Mécanique","Mastère Professionnel En Energétique"];
                    var myList = "";
                    for (var i = 0; i < specialities.length; i++) {
                    myList += "<option value=\'"+specialities[i]+"\'>"+specialities[i]+"</option>";} 
                    document.getElementById("speciality").innerHTML = myList;
                    } else if (val == "eniso") {
                    $("#speciality").html(
                        "<option value=\'infoindus\'>Informatique industriel</option><option value=\'mecatronique\'>Mecatronique</option>"
                        );
                } else if (val == "fsm") {
                    $("#speciality").html(
                        "<option value=\'chimi\'>Licence en chimie</option><option value=\'maths\'>Maths Appliqués</option>"
                        );
                } else if (val == "enicar") {
                    $("#speciality").html(
                        "<option value="gl">Génie Logiciel</option>"
                        );
                }
            });
        });
    </script>
</div>

<div class="col-md-4">
    <label for="level" class="col-form-label col-md-4">Level</label>
    <select id="level" class="form-select" name="level" ><option disabled selected></option> </select>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#speciality").change(function() {
                var val = $(this).val();
                if (val == "Cycle préparatoire integré") {
                    $("#level").html("<option value=\'1\'>1</option><option value=\'2\'>2</option>");} 
                    else {
                        $("#level").html(
                            "<option value=\'1\'>1</option><option value=\'2\'>2</option><option value=\'3\'>3</option>"
                            );
                    }
                });
        });
    </script>



</div>
<br>
<div class="col-md-12">
    <label for="skills" class="col-form-label col-md-12">Skills</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="webprog" value="webprog" name="skills[]">
        <label class="form-check-label" for="Web Programming">Web Programming</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="mobileprog" value="mobileprog" name="skills[]">
        <label class="form-check-label" for="Mobile Programming">Mobile Programming</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="cooking" value="cooking" name="skills[]">
        <label class="form-check-label" for="Cooking">Cooking</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="babysitting" value="babysitting" name="skills[]">
        <label class="form-check-label" for="Baby Sitting">Baby sitting</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="teaching" value="teaching" name="skills[]">
        <label class="form-check-label" for="Teaching">Teaching</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="driving" value="driving" name="skills[]">
        <label class="form-check-label" for="Driving">Driving</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nursing" value="nursing" name="skills[]">
        <label class="form-check-label" for="Nursing">Nursing</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="guiding" value="guiding" name="skills[]">
        <label class="form-check-label" for="Guiding">Guiding</label>
    </div>
</div>


</div><!--Student select END-->

                		';
                	}else{
                		echo '
                			<div class="employer">
    <div class="col-md-6">
        <label for="company" class="form-label">Company name</label>
        <input type="text" class="form-control" id="company" name="company" value="'.$company.'" >
    </div>
    <div class="col-md-6">
        <label for="website" class="form-label">Web Site</label>
        <input type="text" class="form-control" id="website" name="website" value="'.$website.'" >
    </div>

    <div class="col-md-6">
      <label for="logo" class="form-label">Your company logo</label>
      <input class="form-control" type="file" id="logo" name="logo" accept="image/*" value="'.$img.'">
  </div>

</div><!--Employer select END-->

                		';
                	}
                 ?>
                

<div class="col-12">
    <button type="submit" class="btn btn-primary" name="update">Update</button>

    <!--Make one skill at least checked-->
    <script type="text/javascript">
        if (document.getElementById('student').checked) {
            var script = document.createElement('script');

            script.src = "checkbox.js";

            document.head.appendChild(script)
        }
    </script>
</div>
</form>

    	</div>
    </section><!-- End Register Form -->
<?php
if(isset($_POST['update']))
{   $newfname = $_POST['fname'];
				$newlname = $_POST['lname'];
				$newemail = $_POST['email'];
				$newbirthdate=$_POST['birthdate'];
				$newaddress=$_POST['address'];
				$newcity=$_POST['city'];
				$newzip=$_POST['zip'];
				$newphone=$_POST['phone'];
				
        if($type=="student"){
                $newuniversity=$_POST['university'];
                $newinstitute=$_POST['institute'];
                $newspeciality=$_POST['speciality'];
                $newlevel=$_POST['level'];
                $newskills = implode(",", $_POST['skills']);

                // Create sql
                $sql = "UPDATE etudiant SET nom_et='$newlname',prenom_et='$newfname',email_et='$newemail', mdp_et='$newpsd',num_et='$newphone',dn='$newbirthdate',ville_et='$newcity',adr_et='$newaddress',code_postale_et='$newzip',universite_et='$newuniversity',institut_et='$newinstitute',specialite_et='$newspeciality',niveau_et='$newlevel',competences_et='$newskills' WHERE id_et='$id_et')";

                // Save to DB and check
                if(mysqli_query($conn, $sql)){
                    $_SESSION['updateSuccess'] = '<div class="alert alert-success" role="alert">User apdated successfully</div>';
                    $_SESSION['user'] = $email;
                    $_SESSION['username'] = $fname;
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

			    $sql="UPDATE etudiant SET localisation='$location',poste='$position ',date_deb=' $start_date ',date_fin='$end_date',description='$description',salaire='$salaire',type='$type',competences='$skills',date_depot=CURRENT_TIMESTAMP() WHERE id_an=$id";
    			if (mysqli_query($conn, $sql2)) {
      			  header('location:http://localhost/myProject/employer-announces.php');
    			} else {
        		echo 'update_query error: ' . mysqli_error($conn);
    			}
}
 ?>

    <?php include('components/footer.php'); ?>