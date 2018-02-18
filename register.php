<?php
if(isset($_POST['createBtn']))
{
	$missing_input = array();
	
	if(!empty($_POST['fn']))
		$fn=$_POST['fn'];
	else
		$missing_input[] = 'نسيت ادخال الاسم الاول';
	
	if(!empty($_POST['ln']))
		$ln=$_POST['ln'];
	else
		$missing_input[] = 'نسيت ادخال اسم العائلة ';
		
	if(!empty($_POST['nationality']))
		$nationality=$_POST['nationality'];
	else
		$missing_input[] = 'نسيت ادخال الجنسية ';
	
	if(empty($_POST['email'])) {
		$missing_input[] = "نسيت ادخال البريد الالكتروني";
	} else {
		$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$missing_input[] = " البريد الالكتروني المدخل خطأ";
		} else {
			$email = $_POST['email'];
		}
	}	
	
	if(!empty($_POST['mobile']))
		$mobile=$_POST['mobile'];
	else
		$missing_input[] = 'نسيت ادخال رقم الهاتف';
		
	if(!empty($_POST['address']))
		$address=$_POST['address'];
	else
		$missing_input[] = 'نسيت ادخال العنوان';
	
	if(!empty($_POST['username']))
		$username=$_POST['username'];
	else
		$missing_input[] = 'نسيت ادخال اسم المستخدم';
		
	if(!empty($_POST['password']))
		$password=$_POST['password'];
	else
		$missing_input[] = 'نسيت ادخال كلمة المرور';
	
	
	$type=$_POST['type'];

	if(empty($missing_input))
	{
		
		if($type == 1) {
			$sql="INSERT INTO productive_family VALUES(NULL,'$fn','$nationality','$email','$mobile','$address',0,'$username','$password',NOW(),10000)";
		} elseif($type == 2) {
			$sql="INSERT INTO customer VALUES(NULL,'$fn','$nationality','$email','$mobile','$address',0,'$username','$password',NOW(),10000)";
		}
		
		//echo $sql . "<br>";
		$result2= mysqli_query($connection,$sql);
		if($result2) {
			echo "<div class='alert alert-success' style='max-width:500px; margin: 4px auto'>";
				echo '<h4 align="center">تم تسجيل الحساب بنجاح</h4>';
			echo "</div>";
			if($result2) {
				echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?page=login"/>';
				exit;
			}
		}
			
	} else {
		foreach($missing_input as $e) {
			echo "<div class='alert alert-danger' style='max-width:500px; margin: 4px auto'>";
				echo $e;
			echo "</div>";
		}
	}
} 
?>


<form action="" method="post">
      <table class="table table-bordered" style="width:700px;background:#FFF;margin:20px auto" dir="rtl">
         <tr class="active">
          <th colspan="2"><h2 align="center">تسجيل حساب جديد</h2></th>
        </tr>
        <tr>
          <th>نوع الحساب</th>
          <td>
          
            <table width="200">
              <tr>
                <td><label>
                  <input name="type" type="radio" id="type_0" value="1" checked="checked" />
                  حساب اسرة منتجة</label></td>
              </tr>
              <tr>
                <td><label>
                  <input type="radio" name="type" value="2" id="type_1" />
                  حساب زبون</label></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <th>الاسم الاول</th>
          <td><input type="text" class="form-control" name="fn" id="fn" placeholder="ادخل الاسم الاول"></td>
        </tr>
        <tr>
          <th>اسم العائلة</th>
          <td><input type="text" class="form-control" name="ln" id="ln" placeholder="ادخل اسم العائلة"></td>
        </tr>
        <tr>
          <th>الاسم الاول</th>
          <td><input type="text" class="form-control" name="nationality" id="nationality" placeholder="ادخل الجنسية"></td>
        </tr>
        <tr>
          <th>رقم الهاتف</th>
          <td><input name="mobile" type="text" class="form-control" id="mobile" maxlength="10" placeholder="ادخل رقم الهاتف"></td>
        </tr>
        <tr>
          <th>عنوان</th>
          <td><input type="text" class="form-control" name="address" id="address" placeholder="ادخل العنوان"></td>
        </tr>
        <tr>
          <th>البريد الالكتروني</th>
          <td><input type="email" class="form-control" name="email" id="email" placeholder="ادخل البريد الالكتروني"></td>
        </tr>
        
        <tr>
          <th>اسم المستخدم</th>
          <td><input type="text" class="form-control" name="username" id="username" placeholder="ادخل اسم المستخدم"></td>
        </tr>
        <tr>
          <th>كلمة المرور</th>
          <td><input type="password" class="form-control" name="password" id="password" placeholder="ادخل كلمة المرور"></td>
        </tr>
        
        <tr class="active">
          <td>&nbsp;</td>
          <td align="right"><button type="submit" name="createBtn" class="send-btn btn btn-default btn-sm" style="float:left"> <strong>انشاء حساب جديد</strong></button></td>
        </tr>
      </table>
    </form>
