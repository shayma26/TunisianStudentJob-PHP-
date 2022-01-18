<?php include('components/header.php');
 
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Login</li>
            </ol>
            <h2>Login</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="services" class="services">
        <div class="container">

       
         
        <form class="row g-3" method="POST" action="login.php">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="pwd">
                </div>
               <br>
               <center>
                <div class="col-12">
                    <button type="submit" name="submit_login" class="btn btn-primary">Log in</button>
                </div></center>
               
            </form>
            <br>
            <center>  
        <div class="row">
            <p class="col-md-auto">Don't have an account? </p>
            <a class="col-md-auto" href="signup.php">Sign up</a>
        </div>
        </center>
        
        </div>
      
    </section><!-- End Sign in Form -->
      
    

   

</main><!-- End #main -->
<?php
  //include('config/db_connect.php');
  if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
  }
  ?>
<?php include('components/footer.php');?>