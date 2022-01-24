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
      $bio=$row['bio_et'];
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
      $fullname = ucfirst($row['prenom_em'])." ".ucfirst($row['nom_em']);
      $phonenumber=$row['num_em'];
      $city=$row['ville_em'];
      $website=$row['site_web'];
      $bio=$row['bio_em'];
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
  if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    
  }
  ?>

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 col-md-12" 
        style="display: block;
        margin-left: auto;
        margin-right: auto;">
        <div class="member" >
          <img src= "<?php echo $profileimg?>" alt="" width="250">
          <h4><?php echo $fullname ?></h4>
          <span><?php echo $description ?></span>

          <?php 
          if(isset($_POST['submit'])){
            if(!ctype_space($_POST['bio'])){
              $bio=$_POST['bio'];
              if($type=="student"){
                $sql="UPDATE etudiant SET bio_et='$bio' WHERE email_et='$email'"; 
              }else{
                $sql="UPDATE employeur SET bio_em='$bio' WHERE email_em='$email'";
              }
              if (mysqli_query($conn, $sql)) {
              } else {
                echo 'update_query error: ' . mysqli_error($conn);
              }
            }  
          }
          ?>
          <script>
            function onlySpaces(str) {
             return str.trim().length === 0;
           }
           function change_bio() {
            if(document.getElementById("bio").value=="Say something about you..."){
              document.getElementById("bio").value="";
            }
            document.getElementById("bio").readOnly = false;
            document.getElementById("biocontainer").style.border = "0.5px solid #D6D6D8";
            document.getElementById("setBioButton").style.display='block';
          }
          function set_bio(){

            if(onlySpaces(document.getElementById("bio").value)){
              document.getElementById("bio").value = "Say something about you...";
            }
            document.getElementById("bio").readOnly = true;
            document.getElementById("biocontainer").style.border = "none";
            document.getElementById("setBioButton").style.display='none';
          }
        </script>
        <style type="text/css">
          #biocontainer{
            padding: 0px;
            margin: 20px;
          }
          textarea{
            border: none;
            resize: none;
            width: 400px;      
            font-size: 14px; 
            text-align: center;
          }
          textarea:focus{
            outline: none;
            font-size: 16px; 
          }
        </style>
        <form id="biocontainer" method="POST" action="">
          <?php if ($bio==null){
            echo '<textarea rows="2" id="bio" name="bio" onclick="change_bio()" maxlength="255" readonly>Say something about you...</textarea>';
          }else{
            echo '<textarea rows="2" id="bio" name="bio" onclick="change_bio()" maxlength="255" readonly>'.$bio.'</textarea>';
          }?>
          <center>
            <input id="setBioButton" type="submit" name="submit" value="Set bio" style="background-color: #999B9E; color: white; border: none; border-radius: 15px; padding: 7px;display:none;" onclick="set_bio()">
          </center>

        </form>
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
              echo '<span class="badge rounded-pill bg-success" style="margin: 2px; width:100px;">'.$skill.'</span>';
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
        <div class="row" style="margin: 30px;">
        <form class="col-sm">
        <button type="button" class="btn btn-danger" name="delete" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Account</button>
        </form>

        <form class="col-sm"  action="updateProfile.php" method="POST">
        <input type="submit" class="btn btn-primary" name="update" value="Update Account" >
        </form>
        </div>
        </div>

      </div>
<!--
    -->
    </div>
  </div>
</section><!-- End Team Section -->

</main><!-- End #main -->
<!-- deleteModal -->

<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete account</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete your account ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick='window.open("deleteProfile.php","_self")'>Yes</button>
      </div>
    </div>

  </div>
</div>
<?php include('components/footer.php'); ?>