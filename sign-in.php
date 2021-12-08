<html>
<head>
 
<link rel="stylesheet" href="CSS/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>AL-MONTAR MOTORS</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    </head>
    
<?php
    session_start();
     $conn = mysqli_connect("localhost","root","","cars");

     if(!$conn)
     {
     die("Connection failed: ".mysqli_connect_error());
     }
    $Error="";
    
    
    if(isset($_POST["Submit"]))
    {
        $username = $_POST['username'];
        $password = $_POST['upassword'];
        $_SESSION['username']=$username;
        $_SESSION['Password']=$password;
        
        if(isset($_POST["remember"]))
        {  
         include_once("cookies.php");
        }
       
        $hashedpassword = sha1($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn,$sql);
            
        if($row = mysqli_fetch_array($result))
        {
            $_SESSION["user"]=$row;
            $_SESSION['loggedIn'] = true;

            header("Location:index.php");
        }
        else
        {
        	$Error = "Email or password incorrect";
        }

        $conn->close();
       
    }
    if(!isset($_COOKIE['Username1']))
    {
        $_COOKIE['Username']=" ";
        
    }
   if(!isset($_COOKIE['Password1']))
    {
        $_COOKIE['Password']="";
        
    }
    
    
    ?>
    
    <!-- jaison class front -->
    <script src="js/wow.min.js"></script>
    <script>
              new WOW().init();
        
    </script>
    
<body>
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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">الرئيسية
                    <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="cars.php">السيارات</a></li>

                <li class="nav-item"><a class="nav-link" href="team.php">فريقنا</a></li>
               

                <li class="nav-item"><a class="nav-link" href="contact.php">للتواصل معنا</a></li>
                
                <li class="nav-item active"><a class="nav-link" href="sign-in.php">تسجيل الدخول</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
<br>
<br>
<br>
<br>

<form action="" method="post">
  <div class="imgcontainer wow fadeIn">
    
      <div class="line"></div>
  </div>
  <div class="container">
      <h2 class="title wow flipInX" data-wow-delay="0.5s">Sign In</h2>
      <?php echo "<h4 style='color: red'>".$Error."</h4>"; ?>
    <label for="uname"><b>Email</b></label><br>
    <input type="text" class="form-control" placeholder="Enter Username" value="<?php echo $_COOKIE['Username'] ?>" id="uname" name="username" required><br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password" class="form-control" placeholder="Enter Password" value="<?php echo $_COOKIE['Password'] ?>" id="pass" name="upassword" required><br>
        
    <button class="btn mybtn" name="Submit" type="submit">Login</button><br>
    <label>
      <input type="checkbox" checked="checked" class="form-check-label" name="remember"> Remember me
    </label>
      
  </div>

</form>
    <script>
      document.getElementById("uname").focus();
        
    </script>
    
</body>
</html>