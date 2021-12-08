<?php 
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

                <li class="nav-item "><a class="nav-link" href="cars.php">السيارات</a></li>

                <li class="nav-item"><a class="nav-link" href="team.php">فريقنا</a></li>
               

                <li class="nav-item active"><a class="nav-link" href="contact.php">للتواصل معنا</a></li>
                
                <li class="nav-item"><a class="nav-link" href="sign-in.php">تسجيل الدخول</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    

    <!-- Page Content -->
    <div class="page-heading contact-heading header-text" style="background-image: url(assets/images/1.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>شركة المنطار لتجارة السيارات</h4>
              <h2>للتواصل معنا </h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>موقعنا على الخريطة</h2>
            </div>
          </div>
          <div class="col-md-8">
=
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.933520265369!2d35.0470844239194!3d32.319222431318686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDE5JzExLjUiTiAzNcKwMDInNDEuNCJF!5e0!3m2!1sar!2s!4v1623763828831!5m2!1sar!2s" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content" style="text-align: right;" >
              <h4>:معلومات عن متكبنا </h4>
              <p>الاولى في فلسطين شركة المنطار لتجاره السيارات
الفرع الثاني بحلته الجديده طولكرم شارع نابلس مفرق عرابه<br><br> للاستفسار
<br>0599118994 عامر البيطار
<br>0599700542 زياد حمدان
</p>
              <ul class="social-icons">
                <li><a href="https://www.facebook.com/mentar.co/"><i class="fa fa-facebook"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    require_once('database.php');
	
	function test_input($data)
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	    }
	
	$pdo=Database::connect();

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		
		$sName=test_input($_POST['name']);
		$sEmail=test_input($_POST['email']);
		$sSubjects=test_input($_POST['subject']);
		$sMessage=test_input($_POST['message']);
		
		$sql="insert into cus_mas (name,email,subject,message) values (?,?,?,?)";
		$result=$pdo->prepare($sql);
		try
		{
			$result->execute(array($sName,$sEmail,$sSubjects,$sMessage));
				echo "<div class='alert alert-success alert-dismissable'>";
				echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			 	echo "تم ارسال الرسالة بنجاح سوف نقوم بالتواصل معك قريبا</div>";

		}
		catch(Exception $e)
		{
			echo "<div class='alert alert-danger alert-dismissable'>";
			echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo "<strong>ERROR!</strong> {$e->getMessage()}</div>";
		}
		  
	}
	?>

    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>أرسل لنا رسالة </h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="الاسم الكامل" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="عنوان البريد الالكتروني" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="subject" type="text" class="form-control" id="subject" placeholder="الموضوع" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="أكتب لنا رسالتك" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">أرسل الرسالة</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <img src="assets/images/team_01.jpg" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;">قسم المبيعات</h5>
          </div>
        </div>
      </div>
    </div>


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2021 AL-MONTAR motors <br> made by : <a href="https://www.facebook.com/momen.khalefa.16/">Momen Khalefa</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
  
</html>
