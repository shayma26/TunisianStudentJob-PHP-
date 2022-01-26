<?php include('components/header.php'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <h2><a href='announce.php'>Announcement</a></h2>
            <ol>
                <?php
                //include('config/db_connect.php');
                if (isset($_SESSION['type'])) {
                    if ($_SESSION['type'] == 'employer') {

                        echo "<li>Update Announcement</li>";
                        echo "<li><a href='employer-announces.php'>My Announcements</a></li>";
                    }
                }
                ?>

            </ol>


        </div>


        <?php
        if (isset($_POST['update']) && isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM  annonce WHERE id_an=$id";
            if ($res = mysqli_query($conn, $sql)) {
                $row = mysqli_fetch_assoc($res);
                $position = $row['poste'];
                $location = $row['localisation'];
                $start_date = $row['date_deb'];
                $end_date = $row['date_fin'];
                $salaire = $row['salaire'];
                $description = $row['description'];
                $skills = $row['competences'];
                $type = $row['type'];
            }
        }

        ?>
    </section><!-- End Breadcrumbs -->

    <section id="services" class="services">
        <div class="container">

            <form class="row g-3" method="POST" action="update-deleteAnnounce.php" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="inputposition4" class="form-label">Position</label>
                    <input type="text" class="form-control" id="inputposition4" name="position" value="<?php echo $position; ?>">
                </div>
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <label for="inputloc4" class="form-label">Location</label>
                    <input type="text" class="form-control" id="inputloc4" name="location" value="<?php echo $location; ?>">
                </div>
                <!-- type of job-->
                <div class="col-md-12">
                    <label for="types" class="col-form-label col-md-12">Type of the job</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="parttime" value="partTime" name="types">
                        <label class="form-check-label" for="partTime">Part Time Job</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="summer" value="summer" name="types">
                        <label class="form-check-label" for="summer">Summer job</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="internship" value="intership" name="types">
                        <label class="form-check-label" for="internship">Internship</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="graduate" value="graduate" name="types">
                        <label class="form-check-label" for="graduate">Graduate Job</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="weekend" value="weekend" name="types">
                        <label class="form-check-label" for="weekend">Weekend Job</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="evening" value="evening" name="types">
                        <label class="form-check-label" for="evening">Evening Job</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="home" value="home" name="types">
                        <label class="form-check-label" for="home">Work From Home</label>
                    </div>

                </div>
                <!--end type-->
                <div class="col-md-6">

                </div>

                <div class="col-md-6">
                    <label for="inputsal4" class="form-label">Salaire</label>
                    <input type="text" class="form-control" id="inputsal4" name="salaire" value="<?php echo $salaire; ?>">
                </div>




                <!-- skills -->
                <div class="col-md-12">
                    <label for="skills" class="col-form-label col-md-12">Skills</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="webprog" value="webprog" name="skills[]">
                        <label class="form-check-label" for="webprog">Web Programming</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="mobileprog" value="mobileprog" name="skills[]">
                        <label class="form-check-label" for="mobileprog">Mobile Programming</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="cooking" value="cooking" name="skills[]">
                        <label class="form-check-label" for="cooking">Cooking</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="babysitting" value="babysitting" name="skills[]">
                        <label class="form-check-label" for="babysitting">Baby sitting</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="teaching" value="teaching" name="skills[]">
                        <label class="form-check-label" for="teaching">Teaching</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="driving" value="driving" name="skills[]">
                        <label class="form-check-label" for="driving">Driving</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="nursing" value="nursing" name="skills[]">
                        <label class="form-check-label" for="nursing">Nursing</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="guiding" value="guiding" name="skills[]">
                        <label class="form-check-label" for="guiding">Guiding</label>
                    </div>
                </div>
                <!--end skills-->

                <div class="col-md-6">
                    <label for="inputDateS" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="inputDateS" name="start_date" value="<?php echo $start_date; ?>">
                </div>
                
                <div class="col-md-6">
                    <label for="inputDateE" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="inputDateE" name="end_date" value="<?php echo $end_date; ?>">
                </div>

                <div>
                    <label for="inputdesc" class="form-label">Desciption</label>
                    <textarea rows="5" cols="100" class="form-control" id="inputdesc" name="description" value="<?php echo $description; ?>"><?php echo $description; ?></textarea>
                </div>
                <!--Student select END-->


                <div class="col-6">
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </div>
            </form>

        </div>
    </section><!-- End Register Form -->


    <?php include('components/footer.php'); ?>