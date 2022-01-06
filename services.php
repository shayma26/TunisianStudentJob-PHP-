<?php include('components/header.php'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Register</li>
            </ol>
            <h2>Register</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="services" class="services">
        <div class="container">

            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputFname4" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="inputfname4" name="fname">
                </div>
                <div class="col-md-6">
                    <label for="inputLname4" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputlname4" name="lname">
                </div>

                <div class="form-check-inline">
                    <legend class="col-form-label col-md-4">Gender</legend>
                    <div class="col-md-4">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="female">
                            <label class="form-check-label" for="gender1">
                                Female
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="male">
                            <label class="form-check-label" for="gender2">
                                Male
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="inputDate4" class="form-label">Birth-date</label>
                    <input type="date" class="form-control" id="inputDate4">
                </div>

                <div class="col-md-6">
                    <label for="inputnumb" class="form-label">Phone number</label>
                    <input type="text" class="form-control" id="inputnumb" placeholder="+216 00 000 000">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" class="form-select">
                        <option value="tunisie">Tunisia</option>
                        <option value="algerie">Algeria</option>
                        <option value="marroc">Morroco</option>
                        <option value="libye">Libye</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="form-check-inline">
                    <legend class="col-form-label col-md-4">Are you</legend>
                    <div class="col-md-4">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="student" value="student">
                            <label class="form-check-label" for="student">
                                Student
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="employer" value="employer">
                            <label class="form-check-label" for="employer">
                                Employer
                            </label>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                $(document).ready(function() {
                    $('input[type="radio"]').click(function() {
                        var inputValue = $(this).attr("value");
                        var targetBox = $("." + inputValue);
                        $(".select").not(targetBox).hide();
                        $(targetBox).show();
                    });
                });
                </script>
                <div class="student select">
                    <div class="col-md-6">
                        <label for="inputUniversity" class="col-form-label col-md-6">University</label>
                        <select id="inputUniversity" class="form-select">
                            <option value="sousse">Sousse</option>
                            <option value="kairouan">Kairouan</option>
                            <option value="monastir">Monastir</option>
                            <option value="carthage">Carthage</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="inputInstitute" class="col-form-label col-md-6">Institute</label>
                        <select id="inputInstitute" class="form-select"></select>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $("#inputUniversity").change(function() {
                                var val = $(this).val();
                                if (val == "sousse") {
                                    $("#inputInstitute").html(
                                        "<option value='issat'>ISSAT</option><option value='eniso'>ENISO</option>"
                                    );
                                } else if (val == "kairouan") {
                                    $("#inputInstitute").html(
                                        "<option value='issatk'>ISSATK</option><option value='isig'>ISIG</option>"
                                    );
                                } else if (val == "monastir") {
                                    $("#inputInstitute").html(
                                        "<option value='fsm'>FSM</option><option value='enim'>ENIM</option>"
                                    );
                                } else if (val == "carthage") {
                                    $("#inputInstitute").html(
                                        "<option value='fseg'>FSEG</option><option value='enicar'>ENICAR</option>"
                                    );
                                }
                            });
                        });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <label for="inputSpec" class="col-form-label col-md-4">Speciality</label>
                        <select id="inputSpec" class="form-select"></select>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $("#inputInstitute").change(function() {
                                var val = $(this).val();
                                if (val == "issat") {
                                    $("#inputSpec").html(
                                        "<option value='prepa'>Preparatoire Integré</option><option value='gl'>Génie Logiciel</option>"
                                    );
                                } else if (val == "eniso") {
                                    $("#inputSpec").html(
                                        "<option value='infoindus'>Informatique industriel</option><option value='mecatronique'>Mecatronique</option>"
                                    );
                                } else if (val == "fsm") {
                                    $("#inputSpec").html(
                                        "<option value='chimi'>Licence en chimie</option><option value='maths'>Maths Appliqués</option>"
                                    );
                                } else if (val == "enicar") {
                                    $("#inputSpec").html(
                                        "<option value='gl'>Génie Logiciel</option>"
                                    );
                                }
                            });
                        });
                        </script>
                    </div>

                    <div class="col-md-4">
                        <label for="inputLevel" class="col-form-label col-md-4">Level</label>
                        <select id="inputLevel" class="form-select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                    <label for="inputLevel" class="col-form-label col-md-12">Skills</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="progweb" name="skills[]">
                        <label class="form-check-label" for="inlineCheckbox1">Programmation Web</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="cuisinier" name="skills[]">
                        <label class="form-check-label" for="inlineCheckbox2">Cuisinier</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="jardinage" name="skills[]">
                        <label class="form-check-label" for="inlineCheckbox3">Jardinage</label>
                    </div>
                      </div>


                </div>
                <!--Student select END-->


                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>

        </div>
    </section><!-- End Register Form -->

    <!-- ======= Our Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container">

            <div class="section-title">
                <h2>Our Skills</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/img/skills-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt direna
                        past reda
                    </p>

                    <div class="skills-content">

                        <div class="progress">
                            <span class="skill">HTML <i class="val">100%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">CSS <i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">JavaScript <i class="val">75%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">Photoshop <i class="val">55%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Our Skills Section -->

</main><!-- End #main -->

<?php include('components/footer.php'); ?>