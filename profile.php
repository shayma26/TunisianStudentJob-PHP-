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
          $fullname = $row['prenom_et']." ".$row['nom_et'];
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

          <div class="col-lg-4 col-md-6 d-flex justify-content-center" 
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
                table{
                  text-align: left;
                  table-layout: auto; 
                  overflow: scroll;
                  white-space: pre;
                }
              </style>
              <table>

                <tr>
                  <th>E-mail : </th>
                  <td><?php echo $email; ?></td>
                </tr>
                <tr>
                  <th>Phone number : </th>
                  <td><?php echo $phonenumber; ?></td>
                </tr>
                <tr>
                  <th>City : </th>
                  <td><?php echo $city; ?></td>
                </tr>
                <?php if($type == 'student'){
                  echo '
                  <tr style="">
                      <th>Skills : </th>';
                      foreach($skills as $skill){
                        echo '<td><span class="badge rounded-pill bg-info" style="margin: 1px">'.$skill.'</td></span>';
                      }
                      echo '</tr>';
                }else{
                  echo '
                     <tr>
                      <th>Website : </th>
                      <td>'.$website.'</td>
                    </tr>';
                  } ?>
              </table>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <?php include('components/footer.php'); ?>