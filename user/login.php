<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
        <meta charset="UTF-8">
        <title></title>
        <style>
        .yo
        {
            color: white;
            font-family: 'Major Mono Display', monospace; 
            font-size: 100px;
            text-align:center ;
        }
           body
            {
                background-repeat: no-repeat;
/*                background-image: url('../image/1.jpg');*/
background-image: url('../image/2.jpg');
            }
        </style>
    </head>
    <body>
        
     <?php 
     
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/header.php";
            include_once($path);       
        ?>
        
        <div class="container">
            <span><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span>
            <h1 class="yo">LOGIN PAGE</h1> 
            <form action="/webofart/validate/validateuser.php" method="POST">
            
            
             <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-4">          
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="password" class="form-control" id="name" name="password" placeholder="password">
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            <div class="row" style="text-align: center">
                <div class="col-md-12">
                <button type="submit" class="btn btn-success">Sign in</button>
                </div>
                </div>
        </form>
    </span>
            </div>
              
  

 
     <?php 
         $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/webofart/include/lessfooter.php";
  // include_once($path);
     ?>
    
    </body>
</html>
