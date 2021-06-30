<?php 
include_once "../classes/loginclass.php";
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
	<div class="container">
		<section id="content">
			<?php 
			$obj_log = new login();
			if(isset($_POST['login'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$checklog = $obj_log->chklog($username,$password);
			}
			 ?>
			
			<form action="" method="post">
				<h1>Admin Login</h1>
				<span style="color:red;font-size: 20px;">
					<?php if(isset($checklog)){
						echo $checklog;
					} ?>
			    </span>
				<div>
					<input type="text" name="username" placeholder="Username" required="" name="username"/>
				</div>
				<div>
					<input type="password" name="password" placeholder="Password" required="" name="password"/>
				</div>
				<div>
					<input type="submit" name="login" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="#">Learn more & more</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>
</html>