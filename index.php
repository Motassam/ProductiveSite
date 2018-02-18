<?php
	global $connection;
	$connection = mysqli_connect("localhost","root","","productivedb");
	
	mysqli_query($connection,"SET character_set_results = 'utf8'");
	mysqli_query($connection,"SET character_set_client = 'utf8'");
	mysqli_query($connection,"SET character_set_connection = 'utf8'");
	mysqli_query($connection,"SET character_set_database = 'utf8'");
	mysqli_query($connection,"SET character_set_server = 'utf8'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>موقع الاسر المنتجة السعودية</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-arabic.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
	<div class="warpper">
    <div class="container" style="padding: 0px;">
    <header id="header">
        <a href="index.php"><img src="imgs/new logo2.png" class="img-responsive" style="margin:0px auto"/></a>
    </header>
        <nav class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
            </div>
        
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li <?php if(!isset($_GET['page'])) echo ' class="active" '; ?>><a href="index.php">الرئيسية <span class="sr-only">(current)</span></a></li>
                <li><a href="#">المأكولات والمشروبات</a></li>
               	<li><a href="#">الحرف اليدوية والمجوهرات</a></li>
                <li><a href="#">الفنون</a></li>
                <li><a href="#">الخدمات وتنسيق الحفلات</a></li>
                <li  <?php if(isset($_GET['page']) and $_GET['page'] =='contact') echo ' class="active" '; ?>><a href="?page=contact">اتصل بنا</a></li>
              </ul>
              
              <ul class="nav navbar-nav navbar-right">
                <li><a id="nav-btn" href="?page=register" class="btn btn-default btn-xs" style="">انشاء حساب  <i class="fa fa-bookmark-o"></i></a></li>
                <li><a id="nav-btn" href="?page=login" class="btn btn-default btn-xs" >تسجيل دخول <i class="fa fa-user-circle"></i></a></li>
                <li><a id="nav-btn" href="?page=search" class="btn btn-default btn-xs" ><i class="fa fa-search"></i></a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          
    	</nav>
    
    <div class="clearfix"></div>
    
    
    <section id="content">
<?php
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "main";
	}
	
	
	switch($page) {
		case "main":
			include("main.php");
			break;
			
		case "register":
			include("register.php");
			break;
			
		case "login":
			include("login.php");
			break;
			
		case "search":
			include("search.php");
			break;
			
		case "contact":
			include("contactus.php");
			break;			
			
		case "add_new_instructor":
			include("add_new_instructor.php");
			break;
		
		case "view_dept_instructors":
			include("view_dept_instructors.php");
			break;
			
		case "view_all_instructors":
			include("view_all_instructors.php");
			break;
		
		case "add_new_student":
			include("add_new_student.php");
			break;
			
		case "view_all_students":
			include("view_all_students.php");
			break;	
			
		case "add_new_course":
			include("add_new_course.php");
			break;
			
		case "view_dept_courses":
			include("view_dept_courses.php");
			break;
			
		case "view_all_courses":
			include("view_all_courses.php");
			break;
			
	}
?>

    </section>
    
    <div class="footer">
    	<div class="row">
        	<div class="col-md-4">
              <div class="foot1">
                <h4>روابط مهمة</h4>
                <ul>
                  <li><a href="#">من نحن؟</a></li>
                  <li><a href="#">الاسئلة المتكررة</a></li>
                  <li><a href="#">خدمة العملاء</a></li>
                  <li><a href="#">السياسة والخصوصية</a></li>
                  </ul>
              </div>
            </div>
            <div class="col-md-4">
            	<img src="imgs/map.png" class="img-thumbnail" style="width: 100%; height:270px"/>
            </div>
            <div class="col-md-4 ">
            	<div class="foot1">
                <h4>تواصل معنا</h4>
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i> Profile Name</a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i> Profile Name</a></li>
                  <li><a href="#"><i class="fa fa-youtube"></i> Profile Name</a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i> Profile Name</a></li>
                </ul>
              </div>
            </div>
        </div>
    </div>
    
    </div> <!-- end container -->
   </div> <!-- end warpper --> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap-arabic.js"></script>
  </body>
</html>