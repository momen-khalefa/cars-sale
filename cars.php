<?php 
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

    <script>
var subjectObject = {
  "هونداي": {
    "توسان": [],
    "كونا": [],
    "سانتافيه": []    
  },
  "كيا": {
    "سبورتاج": [],
    "سورانتو": []
  }
  ,
  "فولكس فاجن": {
    "بولو": [],
    "جولف": []
  }
  ,
  "لاند روفر": {
    "رنج روفر": []
  }
}
window.onload = function() {
  var subjectSel = document.getElementById("co");
  var topicSel = document.getElementById("model");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    topicSel.length = 1;
    //display correct values
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
 
}
</script>
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
              <h4>شركة المنطار لتجارة السيارات</h4>
              <h2>السيارات</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products" >
      <div class="container" >
        <div class="row">
          <div class="col-md-3">
             <div class="contact-form" >
                <form action="#" mehtod="get" >
                     <label>مستورد / جديد</label>
                     
                     <select class="form-control" name="type" id="type">
                          <option value="">الكل</option>
                          <option value="مستورد">مستورد</option>
                          <option value="جديد">جديد</option>
                     </select>

                     <label>:نوع المركبة </label>
                     
                     <select class="form-control" name="co" id="co" >
                          <option value="">الكل</option>
                     </select>
                
                     <label>:الموديل</label>
                     
                     <select class="form-control" name="model" id="model">
                          <option value="">الكل</option>
                          
                     </select>

                     <label>:السنة</label>
                     
                     <select class="form-control" name="registration" id="registration">
                        <option value="">الكل</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                     </select>


                     <label>:نوع الوقود</label>
                     
                     <select class="form-control" name="fuel" id="fuel">
                          <option value="">الكل</option>
                          <option value="بنزين">بنزين</option>
                          <option value="ديزل">ديزل</option>
                     </select>

                     <label>:ناقل الحركة</label>
                     
                     <select class="form-control" name="gearbox" id="gearbox">
                          <option value="">الكل</option>
                          <option value="عادي">عادي</option>
                          <option value="اتوماتيك">اتوماتيك</option>
                     </select>

                     <button type="submit" class="filled-button btn-block">البحث الان</button>
                </form>
             </div>
          </div>

          <?php 
        
		$noOfPages = 0;
	function add_items($currentPage){
			$allowedItems = 4;
			$startingIndex = $currentPage * $allowedItems;
			$noImagePath = "assets/images/new/no-image.png";
			$end =  $startingIndex + 4;
			$noOfItems = count($_SESSION['allRecords']);
			$itemsLeft = $noOfItems - $startingIndex;
			if($itemsLeft < 4)
				$end = $startingIndex + $itemsLeft;
			$noOfPages = ceil($noOfItems / 4.0);

            echo "<div class=\"col-md-9\">";
            echo "<div class=\"row\">";


			$GLOBALS['noOfPages'] = $noOfPages;
			for($i = $startingIndex;$i < $end; $i++)
			{
				$path = "assets/images/new/img_".$_SESSION['allRecords'][$i]['id'].".jpg";
				$files = glob($path, GLOB_BRACE);
                echo "<div class=\"col-md-6\">";
                echo "<div class=\"product-item\" >";
					if(empty($files))
					{
                        echo "<a  href=\"car-details.html\"><img src=\"assets/images/new/".$noImagePath.".jpg\" alt=\"\" ></a> ";
						//printf('<a href="ProductPage.php?q=%s">',$_SESSION['allRecords'][$i]['id']);
					}
					else
					{
                        echo "<a  href=\"car-details.php?sid=".$_SESSION['allRecords'][$i]['id']."\"><img src=\"assets/images/new/".$_SESSION['allRecords'][$i]['image']."\" alt=\"\" ></a> ";


					}
				echo "<div class=\"down-content\">";
                echo " <a href=\"car-details.html\"><h4>".$_SESSION['allRecords'][$i]['co']."  ".$_SESSION['allRecords'][$i]['model']."</h4></a>";
                echo "<h6><small><del> $0</del></small> $00</h6>";
                echo "<p>".$_SESSION['allRecords'][$i]['Power']." &nbsp;/&nbsp; ".$_SESSION['allRecords'][$i]['fuel']." &nbsp;/&nbsp; ".$_SESSION['allRecords'][$i]['registration']." &nbsp;/&nbsp;".$_SESSION['allRecords'][$i]['type']."</p>";
                echo "<small>     ";
                echo "<strong title=\"Author\"><i class=\"fa fa-dashboard\"></i> ".$_SESSION['allRecords'][$i]['mile']."km</strong> &nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<strong title=\"Author\"><i class=\"fa fa-cube\"></i> ".$_SESSION['allRecords'][$i]['Engine_size']."cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<strong title=\"Views\"><i class=\"fa fa-cog\"></i> ".$_SESSION['allRecords'][$i]['Gearbox']."</strong>";
                echo "                </small>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
				
				

			}
			
		  	print '</div>';}
		$query = "";
		if(!empty($_GET['ProductName'])){

			
			$query = $_GET['ProductName'];
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "cars";

			
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				error_log(mysqli_connect_error(),3,"../errors/db-errors.log");
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql="select * from cars_details where id like '%$query%' OR id like '%$query' OR id like '$query%'";
			
			$currentPage = 0;
			$result = $conn->query($sql);

			$allRecords = $result->fetch_all(MYSQLI_ASSOC);
			$_SESSION['allRecords'] = $allRecords;
			add_items($currentPage);
			
		}
		else
		{
			$currentPage = 0;
		}
        if(!empty($_GET['type']) || !empty($_GET['model'])  || !empty($_GET['co']) || !empty($_GET['registration']) ||   !empty($_GET['fuel']) ||  !empty($_GET['gearbox'])){
            
            $stype=$_GET['type'];
            $smodel=$_GET['model'];
            $sco=$_GET['co'];
            $sregistration=$_GET['registration'];
            $sfuel=$_GET['fuel'];
            $sgearbox=$_GET['gearbox'];

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "cars";
            $statment="select * from cars_details where ";
            $y=0;

            if(!empty($stype)){
                $statment=$statment."type like '$stype' ";
                $y++;
            }
            if(!empty($sco)){
                if($y==0){
                $statment=$statment."co like '$sco' ";
                }
                else{
                    $statment=$statment." and co like '$sco' ";
                }
                $y++;
            }
            if(!empty($smodel)){
                if($y==0){
                $statment=$statment."model like '$smodel' ";
                }
                else{
                    $statment=$statment." and model like '$smodel' ";
                }
                $y++;
            }
            if(!empty($sregistration)){
                if($y==0){
                $statment=$statment."registration like '$sregistration' ";
                }
                else{
                    $statment=$statment." and registration like '$sregistration' ";
                }
                $y++;
            }
            if(!empty($sfuel)){
                if($y==0){
                $statment=$statment."fuel like '$sfuel' ";
                }
                else{
                    $statment=$statment." and fuel like '$sfuel' ";
                }
                $y++;
            }
            if(!empty($sgearbox)){
                if($y==0){
                $statment=$statment."Gearbox like '$sgearbox' ";
                }
                else{
                    $statment=$statment." and Gearbox like '$sgearbox' ";
                }
                $y++;
            }

			
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				error_log(mysqli_connect_error(),3,"../errors/db-errors.log");
			  die("Connection failed: " . $conn->connect_error);
			}

            
			$currentPage = 0;
			$result = $conn->query($statment);

			$allRecords = $result->fetch_all(MYSQLI_ASSOC);
			$_SESSION['allRecords'] = $allRecords;
			add_items($currentPage);
			
		}
        
		if(!empty($_GET['no'])){
		
            
			$query = "";
			$currentPage = (int)$_GET['no'];

			$noImagePath = "assets/images/new/no-image.png";

			add_items($currentPage);

		
		
		}

		if(empty($_GET['pn']) && empty($_GET['ProductName']) && $currentPage == 0 && empty($_GET['no']) && !(!empty($_GET['type']) || !empty($_GET['model'])  || !empty($_GET['co']) || !empty($_GET['registration']) ||   !empty($_GET['fuel']) ||  !empty($_GET['gearbox'])))
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "cars";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql="select * from cars_details";

			$currentPage = 0;
			$result = $conn->query($sql);

			$allRecords = $result->fetch_all(MYSQLI_ASSOC);
			$_SESSION['allRecords'] = $allRecords;
			add_items($currentPage);
		}

	 ?>



<?php 
print'<nav aria-label="">';
  print'<ul class="pages">';

    
    if($currentPage != 0){
    	print'<li class="">';
      printf('<a class="" href="cars.php?no=%d " tabindex="-1"><<</a>'
      	, $currentPage - 1);
    print'</li>';}
    for($i = 0;$i < $noOfPages; $i++){
    	if($currentPage != $i){
   	    	printf('<li class=""><a class="" href="cars.php?no=%d ">%d</a></li>'
   	    		,$i, $i+1);
   	    	
   		}
   		else{
   			print'<li class="active">';
      		printf('<a class="" href="cars.php?no=%d ">%d <span class="sr-only">(current)</span></a>', $i , $i+1);
    		print'</li>';
   		}


    }

  if($currentPage < $noOfPages-1)
  {
    print'<li class="">';
      printf('<a class="" href="cars.php?no=%d & pn=%s">>> </a>',$currentPage + 1,$query );
    print'</li>';
	}
  print'</ul>';
print'</nav>';
?>
<!--
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-6">
                <div class="product-item">
                  <a href="car-details.html"><img src="assets/images/product-1-370x270.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="car-details.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>

                    <h6><small><del> $11199.00</del></small> $11179.00</h6>

                    <p>190 hp &nbsp;/&nbsp; Petrol &nbsp;/&nbsp; 2008 &nbsp;/&nbsp; Used vehicle</p>

                    <small>
                      <strong title="Author"><i class="fa fa-dashboard"></i> 130 000km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> 1800cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> Manual</strong>
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="product-item">
                  <a href="car-details.html"><img src="assets/images/product-2-370x270.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="car-details.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>

                    <h6><small><del> $11199.00</del></small> $11179.00</h6>

                    <p>190 hp &nbsp;/&nbsp; Petrol &nbsp;/&nbsp; 2008 &nbsp;/&nbsp; Used vehicle</p>

                    <small>
                      <strong title="Author"><i class="fa fa-dashboard"></i> 130 000km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> 1800cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> Manual</strong>
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="product-item">
                  <a href="car-details.html"><img src="assets/images/product-3-370x270.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="car-details.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>

                    <h6><small><del> $11199.00</del></small> $11179.00</h6>

                    <p>190 hp &nbsp;/&nbsp; Petrol &nbsp;/&nbsp; 2008 &nbsp;/&nbsp; Used vehicle</p>

                    <small>
                      <strong title="Author"><i class="fa fa-dashboard"></i> 130 000km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> 1800cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> Manual</strong>
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="product-item">
                  <a href="car-details.html"><img src="assets/images/product-4-370x270.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="car-details.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>

                    <h6><small><del> $11199.00</del></small> $11179.00</h6>

                    <p>190 hp &nbsp;/&nbsp; Petrol &nbsp;/&nbsp; 2008 &nbsp;/&nbsp; Used vehicle</p>

                    <small>
                      <strong title="Author"><i class="fa fa-dashboard"></i> 130 000km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> 1800cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> Manual</strong>
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="product-item">
                  <a href="car-details.html"><img src="assets/images/product-5-370x270.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="car-details.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>

                    <h6><small><del> $11199.00</del></small> $11179.00</h6>

                    <p>190 hp &nbsp;/&nbsp; Petrol &nbsp;/&nbsp; 2008 &nbsp;/&nbsp; Used vehicle</p>

                    <small>
                      <strong title="Author"><i class="fa fa-dashboard"></i> 130 000km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> 1800cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> Manual</strong>
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="product-item">
                  <a href="car-details.html"><img src="assets/images/product-6-370x270.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="car-details.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>

                    <h6><small><del> $11199.00</del></small> $11179.00</h6>

                    <p>190 hp &nbsp;/&nbsp; Petrol &nbsp;/&nbsp; 2008 &nbsp;/&nbsp; Used vehicle</p>

                    <small>
                      <strong title="Author"><i class="fa fa-dashboard"></i> 130 000km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> 1800cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> Manual</strong>
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <ul class="pages">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
-->
    

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
