<html>
<head>
 
    <link rel="stylesheet" href="/webofart/css/bootstrap.css">
<body>
        <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/webofart/include/header.php";
   include_once($path);
?>
<h1 style="text-align:center">Register</h2>
<form action="/webofart/user/signup.php" method="POST">
    <div class="container">
        <table class="table table-striped" text-align:center"> 
          
            <tr><td><div class="col-sm-6 right">* Name
                    </div><div class="col-sm-6">
			<input type="text" name="name">
		</div> </td></tr>
        <tr><td><div class="col-sm-6">* UserName
                </div><div class="col-sm-6">	<input type="text" name="username">
		</div>
            </td></tr>
        <tr><td>
        	<div class="col-sm-6">* New Password
                </div><div class="col-sm-6"><input type="password" name="password">
                </div></td></tr>
        <tr><td>
		<div class="col-sm-6">* Reenter Password
                </div><div class="col-sm-6"><input type="password" name="repassword">
		</div></td></tr>
		<tr><td><div class="col-sm-6">* EMAIL
                        </div><div class="col-sm-6"><input type="email" name="email">
		</div></td></tr>
		<tr><td><div class="col-sm-6">*Contant
                        </div><div class="col-sm-6"> <input type="text" name="contact">
                        </div></td></tr>
	
	
        <tr><td><div class="col-sm-6"> *Gender</div><div class="col-sm-6">
			<input type="radio" name="gender" value="male">MALE
			
			<input type="radio" name="gender"value="female">FEMALE
		</div ></td></tr>
                <tr><td><div class="col-sm-6">
                    *BIRTHDAY
                        </div>  <div class="col-sm-6"> <input type="date" name="dob">
                 </div></td></tr>
                <tr><td>
					<div style="text-align:center">
						<input type="submit">
					   <input type="reset">
					</div>
                    </td></tr>                
        </table>
		</div>
            
    
</form>
         <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/webofart/include/footer.php";
   include_once($path);
?>
</body>
</head>
</html>
