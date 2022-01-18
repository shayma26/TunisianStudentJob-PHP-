<?php include('components/header.php'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Announce</li>
            </ol>
            <h2>Add Announce</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="services" class="services">
        <div class="container">

            <form class="row g-3" method="POST" action="add-announce.php">
                <div class="col-md-6">
                <label for="inputpost4" class="form-label">Post</label>
                    <input type="text" class="form-control" id="inputpost4" name="post">
                </div>

                <div class="col-md-6">
                    <label for="inputloc4" class="form-label">Location</label>
                    <input type="text" class="form-control" id="inputloc4" name="location">
                </div>

                <div class="col-md-6">
                    <label for="inputDateS" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="inputDateS" name="start_date">
                </div>
                <div class="col-md-6">
                    <label for="inputDateE" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="inputDateE" name="end_date">
                </div>
              
                <div class="col-md-6">
                    <label for="inputsal4" class="form-label">Salaire</label>
                    <input type="text" class="form-control" id="inputsal4" name="salaire">
                </div>
                <div class="col-md-6">
                              <label for="image" class="form-label">Image for the post</label>
                              <input class="form-control" type="file" id="image" name="image">
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
                    <label for="inputdesc" class="form-label">Desciption</label>
                    <textarea rows="5" cols="33" class="form-control" id="inputdesc" name="desciption"></textarea>
                </div>
                <!--Student select END-->
               

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
    </section><!-- End Register Form -->
    <?php include('components/footer.php');?>