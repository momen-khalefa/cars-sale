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

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2><em>ِAL-MONTAR</em> MOTORS</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">الرئيسية
                    <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="cars.php">السيارات</a></li>

                <li class="nav-item"><a class="nav-link" href="team.php">فريقنا</a></li>
               

                <li class="nav-item"><a class="nav-link" href="contact.php">للتواصل معنا</a></li>
                
                <li class="nav-item"><a class="nav-link" href="sign-in.php">تسجيل الدخول</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/2.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4><del></del> <strong class="text-primary"></strong></h4>
              <h2>شركة المنطار لتجارة السيارات</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
    require_once('database.php');
    $pdo=Database::connect();
    $sql="select * from cars_details where id=?";
	$result=$pdo->prepare($sql);
	$result->execute(array($_GET['sid']));
	$row=$result->fetch(PDO::FETCH_ASSOC);
    
    $sql2="select * from car_description where id=?";
	$result2=$pdo->prepare($sql2);
	$result2->execute(array($_GET['sid']));
	

    $sql3="select * from images where id=?";
	$result3=$pdo->prepare($sql3);
	$result3->execute(array($_GET['sid']));
    ?>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div>
              <img src="assets/images/new/<?php echo $row['image'] ;?>" alt="" class="img-fluid wc-image">
            </div>
            <br>
            <div class="row">
                <?php

               while ($row3=$result3->fetch(PDO::FETCH_ASSOC)){

                 echo "<div class=\"col-6\">";
                 echo "<div>";
                 echo "<img src=\"assets/images/new/{$row3['image']}\" alt=\"\" class=\"img-fluid\">";
                 echo "</div>";
                 echo  "<br>";
                 echo "</div>";
               }
              
               ?>
            </div>
          </div>

          <div class="col-md-6">
            <form action="#" method="post" class="form">
              <ul class="list-group list-group-flush">
               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['type'] ;?></span>

                         <strong class="pull-right">: نوع المركبة</strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['co'] ;?></span>

                         <strong class="pull-right">: الشركة</strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"> <?php echo $row['model'] ;?></span>

                         <strong class="pull-right">: الموديل</strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['registration'] ;?></span>

                         <strong class="pull-right">:ترخيص </strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['mile'] ;?></span>

                         <strong class="pull-right">: العداد </strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['fuel'] ;?></span>

                         <strong class="pull-right">: نوع الوقود</strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['Engine_size'] ;?></span>

                         <strong class="pull-right">: حجم المحرك</strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['Power'] ;?></span>

                         <strong class="pull-right">: القوة</strong>
                    </div>
               </li>


               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['Gearbox'] ;?></span>

                         <strong class="pull-right">: ناقل الحركة</strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['Number_of_seats'] ;?></span>

                         <strong class="pull-right">: عدد المقاعد</strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left"><?php echo $row['Color'] ;?></span>

                         <strong class="pull-right">: لون المركبة</strong>
                    </div>
               </li>
          
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="section-heading">
              <h2><br></h2>
            </div>

            <div class="pull-right">
             
        </div>
          </div>

          <div class="col-md-6">
            <div class="section-heading">
              <h2>: الاضافات</h2>
            </div>
            
            <div class="pull-right">
                <p>
                <?php 
                while($row2=$result2->fetch(PDO::FETCH_ASSOC)){
                    echo $row2['text'];
                    echo "<br>";

                }
                
                ?>
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="section-heading">
              <h2><br></h2>
            </div>

            <div class="pull-right">
             
        </div>
          </div>
          <div class="col-md-6 ">
            <div class="section-heading " >
              <h2>: للتواصل معنا </h2>
            </div>
            
            <div class="pull-right">
              <p>
                

                <br>

               

              <p>
                <span>: عامر البيطار</span>

                <br>
                
                <strong>
                  <a href="tel:0599118994">0599118994</a>
                </strong>
              </p>

              <p>
                <span>: زياد حمدان </span>

                <br>
                
                <strong>
                  <a href="tel:0599700542">0599700542</a>
                </strong>
              </p>

             
            </div>
          </div>
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
