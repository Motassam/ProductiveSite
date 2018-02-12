<h1 align="center"> الاتصال بنا <i class="fa fa-phone-square"></i></h1>

  <?php
if(isset($_POST['submit_btn'])) {
	
	$missing = array();
	
	
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		if(empty($_POST['email'])) 
		{
			$missing[] = 'نسيت ادخال البريد الالكرتوني';
		} else {
			$email = $_POST['email'];
			
		}
	} else {
		$missing[] = 'الرجاء ادخال بريد الكتروني صحيح';
	}

	
	if(empty($_POST['msg'])) {
		$missing[] = "نسيت ادخال الرسالة";
	} else {
		$msg= $_POST['msg'];
	}
	
	if(empty($missing))
	{
		
		$q = "INSERT INTO contacts VALUES(NULL,'$email','$msg',NOW())";
		
		$res = mysqli_query($connection,$q);	

		if($res) {
			
			echo '<p></p><div class="alert alert-success" role="alert" style="text-align:center;font-weight:bold">تم ارسال الرسالة بنجاح</div>';	
			echo '<meta http-equiv="refresh" content="2;url=index.php" />';	
			exit();
		} else {
			echo 'err';
		}
	} elseif(!empty($missing)) {
		foreach($missing as $err) {
			echo '<div class="alert alert-danger" role="alert" style="width:400px;margin:20px auto">';
			echo $err;
			echo '</div>';
		}
		
	}
}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table style="width:50%;margin:20px auto;background:#FFF" border="0" class="table table-bordered">
    
    <tr class="active">
      <th colspan="2"><h3>اكتب الرسالة</h3></th>
    </tr>
    <tr>
      <th>ادخل البريد الالكتروني</th>
      <td align="left"><input type="email" name="email" id="email" class="form-control"></td>
    </tr>
    <tr>
      <th nowrap="nowrap">الرسالة</th>
      <td align="left"><textarea name="msg" rows="6" class="form-control" id="msg"></textarea></td>
    </tr>
    <tr class="active">
      <td>&nbsp;</td>
      <td align="left"><input type="submit" name="submit_btn" id="button" value="ارسال" class="send-btn btn btn-sm btn-success"></td>
    </tr>
  </table>
</form>

