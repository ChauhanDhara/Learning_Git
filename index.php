<?php 
ob_start();
session_start();

	include("connection.php");
	if(isset($_SESSION['admin_id']))
	{
		header("location:home.php");
	}
	if(isset($_REQUEST['login']))
	{
		$uname = $_REQUEST['userName'];
		$password = $_REQUEST['password'];
	
		$s = "select * from admin_master where user_name='$uname' and password='$password'";
		$e = mysqli_query($con,$s);
		$r = mysqli_fetch_array($e);
		
		$_SESSION['admin_id'] = $r['id'];
		//$_SESSION['admin_id']=true;
		//echo $r['user_name'];	
		//echo $_SESSION['admin_id'];
		$s_id = $_SESSION['admin_id'];
		if(isset($s_id))
		{
			header("location:home.php");
			exit();
		}
		
		else
		{
			?>
				<script type="text/javascript">
					alert("Username and Password not Matched..!!");
				</script>
		<?php 
				header("location:index.php");
				exit();
		}
		
	}
	
	

ob_flush();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type"  name="viewport" content="width=device-width, initial-scale=1; charset=utf-8" />
<title>Address Book Aplication</title>
<script src="jQuery/jquery-3.2.1.min.js" ></script>
<script src="jQuery/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">

</style>
</head>

<body class="body_i">
<div class="container">
<form method="post" class="form-design">
		<h2 class="heading">User Login</h2>
		<input type="text" name="userName" class="form-control" Placeholder="User Name" required/>
	
		<input type="password" name="password"  class="form-control" placeholder="Password" required/>
	
		<!--<div class="checkbox">
		  <label><input type="checkbox" name="remember"> Remember me</label>
		</div>-->
		<input type="submit" name="login" value="Login" class="btn btn-primary btn-lg btn-block"/>
</form>
</div>
</body>
</html>
