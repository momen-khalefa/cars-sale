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
    "طوارق أر لاين": []
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

	if(!empty($_POST['submit'])&& $_POST['submit']=='Save')
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
		
		$sql="update cars_details set type=? ,co=?,model=? ,registration=? ,mile=? ,fuel=? ,Engine_size=? ,Power=? ,Gearbox=? , Number_of_seats=? ,Color=?  where id=?";
		$result=$pdo->prepare($sql);
		try
		{
			$result->execute(array($stype,$sco,$smodel,$sregistration,$smile,$sfuel,$sEngine_size,$sPower,$sGearbox,$sNumber_of_seats,$sColor,$sID));
				echo "<div class='alert alert-success alert-dismissable'>";
				echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			 	echo "<strong>Success!</strong> Updated Successfully";
				echo "   <a href ='index.php'>Go back</a>";
				echo "</div>";
				

		}
		catch(Exception $e)
		{
			echo "<div class='alert alert-danger alert-dismissable'>";
			echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo "<strong>ERROR!</strong> {$e->getMessage()}</div>";
		}
		  
	}
	
	$sql="select * from cars_details where id=?";
	$result=$pdo->prepare($sql);
	$result->execute(array($_POST['sid']));
	$row=$result->fetch(PDO::FETCH_ASSOC);
	?>


<div >
 <form method="post" name="myform">
        
            <div class="form-group">
                <label class="control-label">Car ID:</label>
                <input readonly="readonly" type="text" name="sid" required id='sid' class="form-control" placeholder="student id" value="<?php echo $row['id'];?>">
            </div>
            <script>
                         $(function() {
                            var temp="<?php echo $row['type'];?>"; 
                            $("#type").val(temp);
                        });
                     </script>
            <label >مستورد / جديد</label>
                     
                     <select class="form-control" name="type" id="type" >
                          <option value="">الكل</option>
                          <option value="مستورد">مستورد</option>
                          <option value="جديد">جديد</option>
                     </select>

                     <script>
                         $(function() {
                            var temp="<?php echo $row['co'];?>"; 
                            $("#co").val(temp);
                        });
                     </script>
                     <label>:نوع المركبة </label>
                     
                     <select class="form-control" name="co" id="co" >
                          <option value="">الكل</option>
                     </select>
                
                    
                     <label>:الموديل</label>
                     
                     <select class="form-control" name="model" id="model" >
                          <option value="">الكل</option>
                          
                     </select>
                     <script>
                         $(function() {

                            var temp="<?php echo $row['model'];?>";
                            $('#model').append(new Option(temp, temp)); 
                            $("#model").val(temp);
                        });
                     </script>

                     <script>
                         $(function() {
                            var temp="<?php echo $row['registration'];?>"; 
                            $("#registration").val(temp);
                        });
                     </script>
                     <label>:السنة</label>
                     
                     <select class="form-control" name="registration" id="registration" >
                        <option value="">الكل</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                     </select>


                     <script>
                         $(function() {
                            var temp="<?php echo $row['fuel'];?>"; 
                            $("#fuel").val(temp);
                        });
                     </script>
                     <label>:نوع الوقود</label>
                     
                     <select class="form-control" name="fuel" id="fuel" >
                          <option value="">الكل</option>
                          <option value="بنزين">بنزين</option>
                          <option value="ديزل">ديزل</option>
                     </select>

                     <script>
                         $(function() {
                            var temp="<?php echo $row['Gearbox'];?>"; 
                            $("#Gearbox").val(temp);
                        });
                     </script>
                     <label>:ناقل الحركة</label>
                     
                     <select class="form-control" name="Gearbox" id="Gearbox" >
                          <option value="">الكل</option>
                          <option value="عادي">عادي</option>
                          <option value="اتوماتيك">اتوماتيك</option>
                     </select>
           
            <div class="form-group">
            <label class="control-label">:عدد الكيلوات</label>
            <input type="number" name="mile" class="form-control" value="<?php echo $row['mile'];?>">
            </div>

            <div class="form-group">
            <label class="control-label">:حجم المحرك</label>
            <input type="number" name="Engine_size" class="form-control" value="<?php echo $row['Engine_size'];?>">
            </div>
            
            <div class="form-group">
            <label class="control-label">:عدد الاحصنة او القوة</label>
            <input type="text" name="Power" class="form-control" value="<?php echo $row['Power'];?>">
            </div>
            
           

            <div class="form-group">
            <label class="control-label">: عدد المقاعد</label>
            <input type="number" name="Number_of_seats" class="form-control" value="<?php echo $row['Number_of_seats'];?>">
            </div>

            <div class="form-group">
            <label class="control-label">:لون السيارة</label>
            <input type="text" name="Color" class="form-control" value="<?php echo $row['Color'];?>">
            </div>
            
            <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn btn-success">
            </div>
        </form>
</div>
       



</body>
</html>