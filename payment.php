<?php include "inc/header.php" ?>
<?php 
	$login = session::get("cuslog");
	if($login == false){
		header("Location:login.php");
	}
 ?>
 <style>
 	.content_top{
 		width:600px;
 		margin:auto;
 	}
 	.h{font-size: 28px; padding: 0px 15px; margin: auto; color: slateblue;margin-bottom: 20px;border-bottom: 3px solid #ddd;font-family: cursive;text-align: center;}
 	.bun{
 		    background: orangered; font-size: 30px; padding: 5px 35px;border: gold;border-radius: 10px; margin-top: 50px; margin-left: 100px;text-align: center;margin-bottom:50px;
 	}
 	.buf{
 		background: greenyellow;font-size: 30px;padding: 5px 35px; border: gold; border-radius: 10px;margin-top: 50px; margin-left: 90px; text-align: center;margin-bottom:50px;
 	}
 	.buf a{
 		color:black;
 	}
 </style>

<div class="main">
    <div class="content">
    	<div class="content_top">
    		<h1 class="h">Choose a payment option</h1>

    		<button class="bun">Online</button>
    		<button class="buf"><a href="payoffline.php">Offline</a></button>
    	</div>
	   </div>
 </div>

 <?php include "inc/footer.php" ?>