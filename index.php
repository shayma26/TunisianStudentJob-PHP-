
<?php
        include('components/header.php');
        if(isset($_SESSION['registerSuccess'])){
        echo $_SESSION['registerSuccess'];
        unset($_SESSION['registerSuccess']);
    }
        if(isset($_SESSION['no-login-message'])){
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }

    ?>
  <!-- ======= Hero Section ======= -->
 
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background:no-repeat center/100% url(assets/img/about.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Tunisian Student Job</span></h2>
                <h3 class="animate__animated animate__fadeInUp">The first platform for tunisian students and employees</h3>
                <a href="about.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-2.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown">Register <span> Now</span></h2>
                <p class="animate__animated animate__fadeInUp">Are you looking for a job? We have a range of jobs perfect for you. Register with Tunisian StudentJob and start your job search today!</p>
                <a href="signup.php" class="btn-get-started animate__animated animate__fadeInUp">Register</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Are you an <span>employer?</span></h2>
                <p class="animate__animated animate__fadeInUp">Our focus is on connecting students to your business quickly and effectively. Place an announce on Tunisian StudentJob today and find your perfect candidate!</p>
                <a href="signup.php" class="btn-get-started animate__animated animate__fadeInUp">Place an announce</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts" style="margin-top: 150px;">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-briefcase"></i>
              <span data-purecounter-start="0" data-purecounter-end="223" data-purecounter-duration="1.25" class="purecounter"></span>
              <p><strong>Vacancies</strong> for students, graduates and young professionals</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1.25" class="purecounter"></span>
              <p><strong>Companies</strong> chose our platform to seek for enthusiastic students</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="463" data-purecounter-duration="1.25" class="purecounter"></span>
              <p><strong>University Students</strong> are joined in our platform</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="978" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hard Workers Candidates</strong> in our Database</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Summer Jobs</a></h4>
              <p>Why not make the most of your summer and use it to make some money or gain some experience?</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Part Time Jobs</a></h4>
              <p>part time job while pursuing your education</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Weekend Jobs</a></h4>
              <p>Are you looking to balance your work with studies?</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Evening Jobs</a></h4>
              <p>Evening jobs are a great way to make some extra cash while you're studying.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Internships</a></h4>
              <p>Get the experience you need so that you don’t have to go to university for the job you want.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Work From Home</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <section id="skills" class="skills">
    <div class="container">

        <div class="section-title">
            <h2>Our Skills</h2>
            
        </div>

        <div class="row">
            <div class="col-lg-6">
                <img src="assets/img/skills-img.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
                <h3>Popular Student Jobs</h3>
                <p class="fst-italic">
Take a quick look at the popular student jobs below and who knows? You may find your next job!                </p>

                <div class="skills-content">

                    <div class="progress">
                        <span class="skill">Programming <i class="val">100%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                            aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Teaching <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                            aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Baby Sitting <i class="val">75%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                            aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Guiding <i class="val">55%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                            aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

  </main><!-- End #main -->

  
    <?php
        include('components/footer.php');
    ?>