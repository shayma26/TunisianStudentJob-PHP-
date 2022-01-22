<?php 
include('components/header.php'); 
include('components/login-check.php');
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <h2>Announce</h2>
      <ol>
        <?php
        //include('config/db_connect.php');
        if (isset($_SESSION['type'])) {
          if ($_SESSION['type'] == 'employer') {

            echo "<li><a href='form-announce.php'>Add Announce</a></li>";
            echo "<li><a href='employer-announces.php'>My Announces</a></li>";
          } else if ($_SESSION['type'] == 'student') {
            echo "<li><a href='favourite-announces.php'>My Favourite Announces</a></li>";
          }
        }
        ?>
      </ol>
    </div>
  </section><!-- End Breadcrumbs -->

  <?php
  if (isset($_GET['summer'])) {
    $search = 'summer';
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce WHERE type LIKE '%$search%'";
  } else if (isset($_GET['partTime'])) {
    $search = 'partTime';
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce WHERE type LIKE '%$search%'";
  } else if (isset($_GET['weekend'])) {
    $search = 'weekend';
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce WHERE type LIKE '%$search%'";
  } else if (isset($_GET['evening'])) {
    $search = 'evening';
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce WHERE type LIKE '%$search%'";
  } else if (isset($_GET['home'])) {
    $search = 'home';
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce WHERE type LIKE '%$search%'";
  } else if (isset($_GET['internship'])) {
    $search = 'internship';
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce WHERE type LIKE '%$search%'";
  } else if (isset($_GET['graduate'])) {
    $search = 'graduate';
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce WHERE type LIKE '%$search%'";
  } else if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce WHERE localisation LIKE '%$search%' OR competences LIKE '%$search%'OR poste LIKE '%$search%' OR description LIKE '%$search%' OR entreprise LIKE '%$search%' OR type LIKE '%$search%'";
  } else {
    $sql = "SELECT id_an,poste,localisation,date_deb,date_fin,salaire,date_depot,email_contact,num_contact,image,type,competences,description,entreprise,nombre_vues FROM annonce";
  }
  if ($res = mysqli_query($conn, $sql)) {
    echo ' <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

    <div class="row">

    <div class="col-lg-8 entries">';
    while ($row = mysqli_fetch_assoc($res)) {
      $id_an = $row['id_an'];
      $_SESSION['id_an'] = $id_an;
      $position = $row['poste'];
      $localisation = $row['localisation'];
      $date_deb = $row['date_deb'];
      $date_fin = $row['date_fin'];
      $salaire = $row['salaire'];
      $date_depot = $row['date_depot'];
      $email_contact = $row['email_contact'];
      $num_contact = $row['num_contact'];
      $image = $row['image'];
      $type = $row['type'];
      $competences = $row['competences'];
      $description = $row['description'];
      $entreprise = $row['entreprise'];
      $nb = $row['nombre_vues'];
      echo '
      <article class="entry">

      <div class="entry-img">
      <img src="images/' . $image . '" alt="" class="img-fluid">
      </div>

      <h2 class="entry-title">' . $position . '</h2>

      <div class="entry-meta">
      <ul>';
      if ($entreprise != null) {
        echo '
        <li class="d-flex align-items-center"><i class="bi bi-building"></i>' . $entreprise . '</li>';
      }
      echo ' <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01">' . $date_depot . '</time></li>';
      if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'student') {
          echo ' <form action="favourite_announce.php" method="POST">
          <button type="submit" name="fav" class="btn"><i class="bi bi-heart  "></i></button>
          </form>
          <li class="d-flex align-items-center"><i class="bi bi-people"></i>'.$nb.' Students are intersted</li>';

        }
      }
      echo '



      </ul>
      </div>


      <div class="entry-content">
      <h6>' . $description . '
      </h6>
      <div class="container toggle-text">
      <div class="row">
      <div class="col-sm">
      <h5> date debut:</h5>
      </div>
      <div class="col-sm">
      ' . $date_deb . '
      </div>

      </div>
      <div class="row">
      <div class="col-sm">
      <h5> date fin:</h5>
      </div>
      <div class="col-sm">
      ' . $date_fin . '
      </div>

      </div>
      <div class="row">
      <div class="col-sm">
      <h5> localisation:</h5>
      </div>
      <div class="col-sm">
      ' . $localisation . '
      </div>
      </div>
      <div class="row">
      <div class="col-sm">
      <h5> salaire</h5>
      </div>
      <div class="col-sm">
      ' . $salaire . 'DT
      </div>
      </div>
      <div class="row">
      <div class="col-sm">
      <h5> email:</h5>
      </div>
      <div class="col-sm">
      ' . $email_contact . '
      </div>
      </div>
      <div class="row">
      <div class="col-sm">
      <h5> numero:</h5>
      </div>
      <div class="col-sm">
      ' . $num_contact . '
      </div>
      </div>
      <div class="row">
      <div class="col-sm">
      <h5> type:</h5>
      </div>
      <div class="col-sm">
      ' . $type . '
      </div>
      </div>
      <div class="row">
      <div class="col-sm">
      <h5> competences:</h5>
      </div>
      <div class="col-sm">
      ' . $competences . '
      </div>
      </div>
      </div>


      <div class="read-more toggle-text-button">Read More
      </div>
      </div>

      </article><!-- End blog entry -->';
    }
    echo '
    <script type="text/javascript">
    $(document).on("click", ".toggle-text-button", function() {

   // Check if text is more or less
     if ($(this).text() == "Read More") {

     // Change link text
       $(this).text("Read Less");

     // Travel up DOM tree to parent, then find any children with CLASS .toggle-text and slide down
       $(this).parent().children(".toggle-text").slideDown();

       } else {


     // Change link text
         $(this).text("Read More");

     // Travel up DOM tree to parent, then find any children with CLASS .toggle-text and slide up 
         $(this).parent().children(".toggle-text").slideUp();

       }

       });
       </script>
       </div><!-- End blog entries list -->

       <div class="col-lg-4">

       <div class="sidebar">

       <h3 class="sidebar-title">Search</h3>
       <div class="sidebar-item search-form">
       <form action="" method="POST">
       <input type="text" name="search">
       <button type="submit" name="submit"><i class="bi bi-search"></i></button>
       </form>
       </div><!-- End sidebar search formn-->

       <h3 class="sidebar-title">Types</h3>
       <div class="sidebar-item categories">
       <ul>
       <li><form  action="" method="GET">
       <input type="submit"  name="summer"  class="text-muted btn btn-light" value="Summer Job">
       </form></li>
       <li> <form  action="" method="GET">
       <input type="submit"  name="partTime"  class="text-muted btn btn-light" value="Part Time">
       </form></li>
       <li>   <form  action="" method="GET">
       <input type="submit"  name="weekend"  class="text-muted btn btn-light" value="Weekend Job ">
       </form></li>
       <li>  <form  action="" method="GET">
       <input type="submit"  name="evening"  class="text-muted btn btn-light" value="Evening Job">
       </form></li>
       <li> <form  action="" method="GET">
       <input type="submit"  name="home"  class="text-muted btn btn-light" value="Work From Home">
       </form></li>
       <form  action="" method="GET">
       <input type="submit"  name="internship"  class="text-muted btn btn-light" value="Internship">
       </form></li>
       <li> <form  action="" method="GET">
       <input type="submit"  name="graduate"  class="text-muted btn btn-light" value="Graduate Job">
       </form></li>
       </ul>
       </div><!-- End sidebar categories-->


       </div><!-- End sidebar -->

       </div><!-- End blog sidebar -->

       </div>

       </div>
       </section><!-- End Blog Section -->';
     } else {
      echo '<center><h3>No Announcements yet</h3></center>';
    }
    ?>
    <?php include('components/footer.php'); ?>