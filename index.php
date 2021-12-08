<?php 
require_once('database.php');
$pdo=Database::connect();
$sql="select * from cars_details";
$result=$pdo->prepare($sql);
$result->execute();
    session_start();
        
        
        
       
    ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>AL-MONTAR MOTORS</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2><em>ِAL-MONTAR</em> MOTORS</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">الرئيسية
                    <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="cars.php">السيارات</a></li>

                <li class="nav-item"><a class="nav-link" href="team.php">فريقنا</a></li>
               

                <li class="nav-item"><a class="nav-link" href="contact.php">للتواصل معنا</a></li>
                
                <li class="nav-item"><a class="nav-link" href="sign-in.php">تسجيل الدخول</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
      <!-- Banner Starts Here -->
      <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Find your car today!</h4>
            <h2>شركة المنطار لتجارة السيارات</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Find your car today!</h4>
            <h2>شركة المنطار لتجارة السيارات</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Find your car today!</h4>
            <h2>شركة المنطار لتجارة السيارات</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 >أحدث الموديلات</h2>
              <a href="cars.html"><i class="fa fa-angle-left"></i>عرض المزيد</a>
              </div>
          </div>
<?php
 while ($row=$result->fetch(PDO::FETCH_ASSOC))
 {
     echo "<div class=\"col-lg-4 col-md-6\">";
     echo "<div class=\"product-item\" >";
     echo "<a  href=\"car-details.html\"><img src=\"assets/images/new/{$row['image']}\" alt=\"\" ></a> ";
     echo "<div class=\"down-content\">";
     echo " <a href=\"car-details.html\"><h4>{$row['co']}  {$row['model']}</h4></a>";
     echo "<h6><small><del> $0</del></small> $00</h6>";
     echo "<p>{$row['Power']} &nbsp;/&nbsp; {$row['fuel']} &nbsp;/&nbsp; {$row['registration']} &nbsp;/&nbsp; {$row['type']}</p>";
     echo "<small>     ";
     echo "<strong title=\"Author\"><i class=\"fa fa-dashboard\"></i> {$row['mile']}km</strong> &nbsp;&nbsp;&nbsp;&nbsp;";
     echo "<strong title=\"Author\"><i class=\"fa fa-cube\"></i> {$row['Engine_size']}cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;";
     echo "<strong title=\"Views\"><i class=\"fa fa-cog\"></i> {$row['Gearbox']}</strong>";
     echo "                </small>";
     echo "</div>";
     echo "</div>";
     echo "</div>";

 }


    ?>


          </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
  <?php 
include 'footer.php'
?>
</html>