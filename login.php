<?php 
if(isset($_POST['loginBtn']))
{
	$missing_input = array();
	
	
	if(empty($_POST['username']))
		$missing_input[] = 'ادخل اسم المستخدم';
	else
		$username=$_POST['username'];
		
	if(!empty($_POST['password']))
		$password= $_POST['password'];
	else
		$missing_input[] = 'ادخل كلمة المرور';
		
	if(empty($missing_input))
	{
		$sql="SELECT * FROM customer WHERE username='$username' and password='$password' LIMIT 1";
		$result = mysqli_query($connection,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_BOTH);
		$count = mysqli_num_rows($result);
		if($count==1)
		{
			session_start();
			$_SESSION['customer_id'] = $row['customer_id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['fullname'] = $row['firstname'] . ' ' . $row['lastname'];
			 
			 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=customer/view_products.php">';    
			 exit;
			
		} else if($count==0) {
			$missing_input[] = 'انت غير مخول لك الدخول الى الحساب';
			ShowErrors($missing_input);
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
      <table class="table table-bordered" style="width:450px;background:#FFF;margin:20px auto" dir="rtl">
         <tr class="active">
          <th colspan="2"><h2 align="center">تسجيل دخول</h2></th>
        </tr>
        <tr>
           <th>نوع الحساب</th>
           <td><table width="200">
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
          <th>اسم المستخدم</th>
          <td><input type="text" class="form-control" name="username" id="username" placeholder="ادخل اسم المستخدم"></td>
        </tr>
        <tr>
          <th>كلمة المرور</th>
          <td><input type="password" class="form-control" name="password" id="password" placeholder="ادخل كلمة المرور"></td>
        </tr>
        
        <tr class="active">
          <td>&nbsp;</td>
          <td align="right"><button type="submit" name="loginBtn" class="send-btn  btn btn-default btn-sm pull-right"> <strong>دخول</strong></button></td>
        </tr>
      </table>
    </form>

