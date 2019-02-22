<html>
<body>
    
        <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/webofart/include/header.php";
   include_once($path);
?>
    <div class="container ">
          
            <h1 class="text-center">Register</h1>
        <div class="row">
            <div class="col-md-2">
                &nbsp;
            </div>
            <div class="col-md-8">
                <form action="/webofart/user/signup.php" method="POST">
                    <table class="table table-striped text-center col-md-10"> 
                        <tr>
                            <td>
                                * Name
                            </td>
                            <td>
                                <input type="text" name="name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                * UserName
                            </td>   
                            <td>
                                <input type="text" name="username">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                * New Password
                            </td>
                            <td>
                                <input type="password" name="password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                * Reenter Password
                            </td>
                            <td>
                                <input type="password" name="repassword">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                * EMAIL
                            </td>
                            <td>
                                <input type="email" name="email">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                *Contact
                            </td>
                            <td>
                                <input type="text" name="contact">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                *Gender
                            </td>
                            <td>
                                    <input type="radio" name="gender" value="male">MALE
                                    <input type="radio" name="gender"value="female">FEMALE
                            </td>
                        </tr>
                        <tr>
                            <td>
                                *BIRTHDAY
                            </td>
                            <td>
                                <input type="date" name="dob">
                            </td>
                        </tr>
                    </table>

                                <div class="col-md-12"style="text-align:center">
                                    <input type="submit">
                                    <input type="reset">
                                </div>
                </form>
            </div>  
    </div>
         <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/webofart/include/footer.php";
 //  include_once($path);
?>
</body>
</html>
