<?php include "inc/header.php" ?>
<?php 
	$login = session::get("cuslog");
	if($login == true){
		header("Location:login.php");
	}
 ?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<?php 
    		if(isset($_POST['login'])){
    			$cusChk = $obj_customer->customerChklog($_POST);

    		}
    		if(isset($cusChk)){
    			echo $cusChk;
    		}
    		 ?>
        	<form action="" method="post">
            	<input type="text" name="email" placeholder="email" class="field">
                <input type="password" name="password" placeholder="Password" class="field">
                <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                <div class="buttons"><div><button name="login" class="grey">Sign In</button></div></div>
           </form>       
        </div>       
                 
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<?php 
    		if(isset($_POST['submit'])){
    			$cusInsert = $obj_customer->customerInsert($_POST);
			}
    		if(isset($cusInsert)){
    			echo $cusInsert;
    		}
    		 ?>
    		<form action=""method="post">
		   		<table>
	   				<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder = "Name" >
								</div>
								
								<div>
								   <input type="text" name="city" placeholder = "City" >
								</div>
								
								<div>
									<input type="text" name="zipCode" placeholder = "Zip-Code" >
								</div>
								<div>
									<input type="text" name="email" placeholder = "E-Mail">
								</div>
			    			</td>
			    			<td>
								<div>
									<input type="text" name="address" placeholder = "Address" >
								</div>
				    			<div>
									<input type="text" name="country" placeholder = "country" >
								</div>	        

					           	<div>
					          		<input type="text" name="phone" placeholder = "Phone" >
					          	</div>
						  		<div>
									<input type="text" name="password" placeholder = "Password">
								</div>
				    		</td>
		    			</tr> 
		    		</tbody>
				</table> 
			   <div class="search"><div><button class="grey" name = "submit">Create Account</button></div></div>
			    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
			    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php include "inc/footer.php" ?>
