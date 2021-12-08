<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    
<title>Untitled Document</title>
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
<div class="container">
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
		
		$stype=test_input($_POST['type']);
		$sco=test_input($_POST['co']);
		$smodel=test_input($_POST['model']);
		$sregistration=test_input($_POST['registration']);
        $smile=test_input($_POST['mile']);
		$sfuel=test_input($_POST['fuel']);
		$sEngine_size=test_input($_POST['Engine_size']);
		$sPower=test_input($_POST['Power']);
		$sGearbox=test_input($_POST['Gearbox']);
        $sNumber_of_seats=test_input($_POST['Number_of_seats']);
		$sColor=test_input($_POST['Color']);

        $Get_image_name = $_FILES['image0']['name'];
  	
        // image Path
       $image_Path = "assets/images/new/".basename($Get_image_name);
       move_uploaded_file($_FILES['image'.$i]['tmp_name'], $image_Path);
		
		$sql="insert into  cars_details (type,co,model,registration,mile,fuel,Engine_size,Power,Gearbox,Number_of_seats,Color,image) values (?,?,?,?,?,?,?,?,?,?,?,?)";
		$result=$pdo->prepare($sql);
		try
		{
			$result->execute(array($stype,$sco,$smodel,$sregistration,$smile,$sfuel,$sEngine_size,$sPower,$sGearbox,$sNumber_of_seats,$sColor,$Get_image_name));
            $sql="SELECT MAX(id) as id FROM cars_details";
            $result=$pdo->prepare($sql);
            $result->execute();
            $row=$result->fetch(PDO::FETCH_ASSOC);
            $sid= $row['id'];

            $conn = mysqli_connect("localhost", "root", "", "cars");
            for($i=1;$i<5;$i++){
                if(!empty($_FILES['image'.$i]['name'])){

                    	// Get name of images
                      	$Get_image_name = $_FILES['image'.$i]['name'];
  	
                     	// image Path
                    	$image_Path = "assets/images/new/".basename($Get_image_name);

  	                    $sql = "INSERT INTO images (id,image) VALUES ('$sid','$Get_image_name')";
  	
                     	// Run SQL query
                  	  mysqli_query($conn, $sql);
                    move_uploaded_file($_FILES['image'.$i]['tmp_name'], $image_Path);
                }
            }
				echo "<div class='alert alert-success alert-dismissable'>";
				echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			 	echo "<strong>Success!</strong> Added One Record</div>";

		}
		catch(Exception $e)
		{
			echo "<div class='alert alert-danger alert-dismissable'>";
			echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo "<strong>ERROR!</strong> {$e->getMessage()}</div>";
		}
		  
	}
    
	
	$sql="select * from cars_details";
	$result=$pdo->prepare($sql);
	$result->execute();
	?>


<div styel="text-align: rigth ;">
 <form method="post" name="myform" enctype="multipart/form-data" >
 

                    <label >مستورد / جديد</label>
                     
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
                     
                     <select class="form-control" name="Gearbox" id="Gearbox">
                          <option value="">الكل</option>
                          <option value="عادي">عادي</option>
                          <option value="اتوماتيك">اتوماتيك</option>
                     </select>
            
            <div class="form-group">
            <label class="control-label">:عدد الكيلوات</label>
            <input type="number" name="mile" class="form-control">
            </div>

            <div class="form-group">
            <label class="control-label">:حجم المحرك</label>
            <input type="number" name="Engine_size" class="form-control">
            </div>
            
            <div class="form-group">
            <label class="control-label">:عدد الاحصنة او القوة</label>
            <input type="number" name="Power" class="form-control">
            </div>
            
           

            <div class="form-group">
            <label class="control-label">: عدد المقاعد</label>
            <input type="number" name="Number_of_seats" class="form-control">
            </div>

            <div class="form-group">
            <label class="control-label">:لون السيارة</label>
            <input type="text" name="Color" class="form-control">
            </div>

            <label class="control-label">:الصورة الرئيسية</label>
            <input type="file" name="image0"> 
            <br> 	
            <label class="control-label">:الصور الثانوية</label>
            <input type="file" name="image1">  	
            <input type="file" name="image2">  	
            <input type="file" name="image3">  	
            <input type="file" name="image4"> 
            <br> 	

            <div class="form-group">
            <input type="submit" value="Save" class="btn btn-success">
            </div>
        </form>
</div>
        
<div>
<table cellspacing="0" class="table table-hover" >
    <tr>
    <th>type</th>
    <th>co</th>
    <th>model</th>
    <th>registration</th>
    <th>mile</th>
    <th> fuel</th>
    <th>Engine_size</th>
    <th>Power</th>
    <th>Gearbox</th>
    <th>Number_of_seats</th>
    <th>Color</th>
    </tr>
	<?php
	 	  while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{
				echo "<tr>";
				echo "<td>{$row['type']}</td>";
				echo "<td>{$row['co']}</td>";
				echo "<td>{$row['model']}</td>";
				echo "<td>{$row['registration']}</td>";
                echo "<td>{$row['mile']}</td>";
				echo "<td>{$row['fuel']}</td>";
				echo "<td>{$row['Engine_size']}</td>";
				echo "<td>{$row['Power']}</td>";
                echo "<td>{$row['Gearbox']}</td>";
				echo "<td>{$row['Number_of_seats']}</td>";
				echo "<td>{$row['Color']}</td>";
				echo "<td><form method='post'>";
				echo "<input type='hidden' value='{$row['id']}' name='sid'/>";
				echo "<input type='submit' value='Edit' formaction='sedit.php' class='btn btn-warnning'>";
				echo "</form></td>";
				echo "</tr>";
				
		}		
	?> 
</table>
</div>



</body>
</html>