<?php include('components/header.php');
include('components/login-check.php');
    //TODO delete, settings
?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Profile</li>
      </ol>
      <h2>Profile</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <?php
  if(isset($_SESSION['type'])){
    $email=$_SESSION['user'];
    $type=$_SESSION['type'];
    if ($type == 'student') {
      $inforeq = "SELECT * from etudiant where email_et = '$email'";
      $resinfo = mysqli_query($conn, $inforeq);
      $row = mysqli_fetch_assoc($resinfo);
      $fullname = ucfirst($row['prenom_et'])." ".ucfirst($row['nom_et']);
      $description="Student at ".strtoupper($row['institut_et'])."<br>".$row['specialite_et']." <br>LEVEL: ".$row['niveau_et'];
      $phonenumber=$row['num_et'];
      $city=$row['ville_et'];
      $skills=explode(",",$row['competences_et']);
      if($row['genre_et']==0)
        {$profileimg='images/female_avatar.jpg';}
      else
        {$profileimg='images/male_avatar.jpg';}
    }
    else{
      $inforeq = "SELECT * from employeur where email_em = '$email'";
      $resinfo = mysqli_query($conn, $inforeq);
      $row = mysqli_fetch_assoc($resinfo);
      $fullname = $row['prenom_em']." ".$row['nom_em'];
      $phonenumber=$row['num_em'];
      $city=$row['ville_em'];
      $website=$row['site_web'];
      if($row['entreprise']=="")
        {$description="Employer";}
      else
        {$description="Works at ".$row['entreprise'];}
      if ($row['logo']=="")
        {$profileimg="images/office.png";}
      else
        {$profileimg="images/".$row['logo'];}
    }

  }
  ?>

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container">

      <div class="row">
        <!--d-flex justify-content-center-->
        <div class="col-lg-6 col-md-12" 
        style="display: block;
        margin-left: auto;
        margin-right: auto;">
        <div class="member" >
          <img src= "<?php echo $profileimg?>" alt="" width="250">
          <h4><?php echo $fullname ?></h4>
          <span><?php echo $description ?></span>
          <p>
            bio to add
          </p>
          <style type="text/css">
            .row{
              text-align: left;
            }
          </style>
          <div class="row">
            <div class="col-sm">
              <h6><b> E-mail :</b></h6>
            </div>
            <div class="col-sm">
              <?php echo $email; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <h6><b>Phone number : </b></h6>
            </div>
            <div class="col-sm">
              <?php echo $phonenumber; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">

              <h6><b>City : </b></h6>
            </div>
            <div class="col-sm">
              <?php echo $city; ?></div>
            </div>
            <?php if($type == 'student'){
              echo '
              <div class="row">
              <div class="col-sm">
              <h6><b>Skills : </b></h6>
              </div>
              <div class="col-sm">';
              foreach($skills as $skill){
                echo '<span class="badge rounded-pill bg-success" style="margin: 1px; width:100px;">'.$skill.'</span>';
              }
              echo '
              </div>
              </div>';
            }else{
              echo '
              <div class="row">
              <div class="col-sm">

              <h6><b>Website : </b></h6></div>
              <div class="col-sm">
              '.$website.'</div>
              </div>';
            } ?>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Team Section -->

</main><!-- End #main -->

<?php include('components/footer.php'); ?>