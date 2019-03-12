     <!-- CORRECTIONS TO BE NOTED BY TEAM MEMBERS -->
     <!-- FORMAT THE OUT PROPERLY. -->
     <!-- FORMAT THE SLIDER PROPERLY IF NOT POSSIBLE REMOVE IT FROM THE DROPDOWN MENU. -->
     <!-- PERSIST THE CHECKBOX AND SLIDER VALUES. -->
<html>
<head>
<?php 
    try{

     $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=webofart','root','');
     //$dbhandler = new PDO('mysql:host=localhost;dbname=webofart','root','root');
     $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //   echo 'successfully connected';
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/webofart/include/header.php";
   include_once($path);
?>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
 </head>
<body>    
<br>    
        <div class="container">
            <div class="container-fluid">
            <div width='25%'>
                <div class="btn-group">
                    <button class="btn btn-outline-primary dropdown-toggle badge-pill " data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                        Medium
                    </button>
                    <div class="dropdown-menu round border-info ">
                        <li>
                        
                            &nbsp&nbsp<input type="checkbox" class="common_selector Medium" value="oil"/> Oil                       
                        </li>
                        <li>
                            &nbsp&nbsp<input type="checkbox" class="common_selector Medium" value="Water-Color"/> Water-Color
                        </li>
                        <li>
                            &nbsp&nbsp<input type="checkbox" class="common_selector Medium" value="Acrylic"/> Acrylic                        
                        </li>
                        <li>
                            &nbsp&nbsp<input type="checkbox" class="common_selector Medium" value="Pastels"/> Pastels
                        </li>
                    </div>
                </div>
                <br>
                <br>
                <div class="btn-group">

                <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                        Artist
                    </button>
                    <div class="dropdown-menu round border-info ">
                        <?php

                    $query = "SELECT DISTINCT(username) FROM art WHERE  art_status = 'available'";
                    $statement = $dbhandler->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                        <li>
                       &nbsp&nbsp<input type ="checkbox" class="common_selector User" value="<?php echo $row['username']; ?>"/>&nbsp<?php echo $row['username']; ?>
                        </li>
                        <?php
                    }
                    ?>
                    </div>
                </div>
                <br>
                <br>
                <div class="btn-group">
                <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                        Art Title
                    </button>
                    <div class="dropdown-menu round border-info">
                        <?php

                    $query = "SELECT DISTINCT(art_title) FROM art WHERE  art_status = 'available'";
                    $statement = $dbhandler->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                        <li>
                       &nbsp&nbsp<input type ="checkbox" class="common_selector Art_Title" value="<?php echo $row['art_title']; ?>"/>&nbsp<?php echo $row['art_title']; ?>
                        </li>
                        <?php
                    }
                    ?>
                    </div>
                </div>
                <br>
                <br>
                <div class="btn-group">

                <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                        Price
                    </button>
                    <div class="dropdown-menu round border-info ">
                    <!-- </div> -->
                    <div>    
                        <input type="hidden" id="hidden_minimum_price" value="0" />
                        <input type="hidden" id="hidden_maximum_price" value="9900000" />
                        <p id="price_show">&nbsp&nbsp15000 - 9900000</p>
                        <div id="price_range"></div>
                    </div>    
                    </div>
                </div>
                <br>
                <br>
                <div class="btn-group">

                <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                        Width
                    </button>
                    <div class="dropdown-menu round border-info ">
                         <input type="hidden" id="hidden_minimum_width" value="0" />
                    <input type="hidden" id="hidden_maximum_width" value="15000" />
                    <p id="width_show">&nbsp&nbsp100 - 20000</p>
                    <div id="width_range"></div>
                 </div>    
                <div class="list-group">
                    </div>
                </div>
                <br>
                <br>
                <div class="btn-group">

                <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                        Height
                    </button><br>
                    <div class="dropdown-menu round border-info ">
                        <input type="hidden" id="hidden_minimum_height" value="0" />
                    <input type="hidden" id="hidden_maximum_height" value="15000" />
                    <p id="height_show">&nbsp&nbsp100 - 20000</p>
                    <div id="height_range"></div>
                 </div>   
                </div>
               
            </div>

            </div> 
            <div id="hidden_form_container" >
               
            </div>
            <br/>
                <?php
                if(isset($_GET["action"]) && $_GET["action"]=="fetch_data"){
                        $_GET["action"]="";
        //echo $_GET["action"];
        //  echo $_GET["Medium"];
            $query="SELECT * FROM art WHERE art_status='available'";

            if(isset($_GET["Medium"]) && !empty($_GET["Medium"])){
                $M_filter ='"'. implode('","', explode(',', $_GET["Medium"])) .'"';
                $query.= " AND art_medium IN(".$M_filter.")";
            }
            if(isset($_GET["username"]) && !empty($_GET["username"])){
                $U_filter = '"'. implode('","', explode(',', $_GET["username"])) .'"';
                $query.= " AND username IN(".$U_filter.")";
            }
            if(isset($_GET["Art_Title"]) && !empty($_GET["Art_Title"])){
                $AT_filter ='"'. implode('","', explode(',', $_GET["Art_Title"])) .'"';
                $query.= " AND art_title IN(".$AT_filter.")";
            }
            if(isset($_GET["max_p"]) && !empty($_GET["max_p"]) && !empty($_GET["min_p"]) && isset($_GET["min_p"])){
                $maxp_filter=(float)$_GET["max_p"];
                $minp_filter=(float)$_GET["min_p"];
                // echo $maxp_filter;
                $query.= " AND art_price BETWEEN ".$minp_filter." AND ".$maxp_filter."";
            }
            if(isset($_GET["max_w"]) && !empty($_GET["max_w"]) && !empty($_GET["min_w"]) && isset($_GET["min_w"])){
                $maxw_filter=(float)$_GET["max_w"];
                $minw_filter=(float)$_GET["min_w"];
                $query.= " AND art_width BETWEEN ".$minw_filter." AND ".$maxw_filter."";
            }
            if(isset($_GET["max_h"]) && !empty($_GET["max_h"]) && !empty($_GET["min_h"]) && isset($_GET["min_h"])){
                $maxh_filter=(float)$_GET["max_h"];
                $minh_filter=(float)$_GET["min_h"];
                $query.= " AND art_height BETWEEN ".$minh_filter." AND ".$maxh_filter."";
            }
            //echo $query;
            $statement = $dbhandler->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $total_r = $statement->rowCount();
            $out ="";
            if($total_r>0){
                foreach($result as $row){

                    $out .= '
                        <div class="col-sm-4 col-lg-4 col-md-3">
    <div style="border:1px solid #ccc; border-radius:5px; padding:20px; margin-bottom:20px; height:600px;">
      <p align="center"><strong><a href="#">'. $row['art_title'] .'</a></strong></p>
     <img class="card-img-top" src = "/webofart/image/userart/'.$row['art_loc'].'"><br/><br/>
     <h4 style="text-align:center;" class="text-danger" > Rs. '. $row['art_price'] .'</h4>
     <p> Description : '. $row['art_about'].' <br />
        Medium : '. $row['art_medium'] .' <br />
        Dimensions : '.$row['art_width'].' cm x '.$row['art_height'].' cm <br/> </p>
    </div></div>';
                }
            }
            else{
                $out ='NO DATA FOUND';  
            }
            echo $out;
            }
               ?>  
        </div>

        <?php
            }
            catch(PDOException $e)
                              {
                                    echo $e->getMessage();
                                               die();
                        }
        ?>
        <!-- CREATE SLIDER AN MAKE ALL THE VALUE PERSISTANT -->
<script type="text/javascript">
$(document).ready(function(){
    function filter_data()
    {
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var minimum_width = $('#hidden_minimum_width').val();
        var maximum_width = $('#hidden_maximum_width').val();
        var minimum_height = $('#hidden_minimum_height').val();
        var maximum_height = $('#hidden_maximum_height').val();
        var Medium = get_filter('Medium');
        var username = get_filter('User');
        var Art_Title = get_filter('Art_Title');
        theForm = document.createElement('form');
  theForm.action = 'search.php';
  theForm.method = 'get';
  newInput1 = document.createElement('input');
  newInput1.type = 'hidden';
  newInput1.name = 'action';
  newInput1.value = action;
  newInput2 = document.createElement('input');
  newInput2.type = 'hidden';
  newInput2.name = 'Medium';
  newInput2.value = Medium;
  newInput3= document.createElement('input');
  newInput3.type = 'hidden';
  newInput3.name = 'username';
  newInput3.value = username;
  newInput4 = document.createElement('input');
  newInput4.type = 'hidden';
  newInput4.name = 'Art_Title';
  newInput4.value = Art_Title;
  newInput5 = document.createElement('input');
  newInput5.type = 'hidden';
  newInput5.name = 'max_p';
  newInput5.value = maximum_price;
  newInput6 = document.createElement('input');
  newInput6.type = 'hidden';
  newInput6.name = 'min_p';
  newInput6.value = minimum_price;
  newInput7 = document.createElement('input');
  newInput7.type = 'hidden';
  newInput7.name = 'max_h';
  newInput7.value = maximum_height;
  newInput8 = document.createElement('input');
  newInput8.type = 'hidden';
  newInput8.name = 'min_h';
  newInput8.value = minimum_height;
  newInput10 = document.createElement('input');
  newInput10.type = 'hidden';
  newInput10.name = 'max_w';
  newInput10.value = maximum_width;
  newInput9 = document.createElement('input');
  newInput9.type = 'hidden';
  newInput9.name = 'min_w';
  newInput9.value = minimum_width;
  // Now put everything together...
  theForm.appendChild(newInput1);
  theForm.appendChild(newInput2);
  theForm.appendChild(newInput3);
  theForm.appendChild(newInput4);
  theForm.appendChild(newInput5);
  theForm.appendChild(newInput6);
  theForm.appendChild(newInput7);
  theForm.appendChild(newInput8);
  theForm.appendChild(newInput9);
  theForm.appendChild(newInput10);
   document.getElementById('hidden_form_container').appendChild(theForm);
  // ...and submit it
  theForm.submit();

      }
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:15000,
        max:9900000,
        values:[15000, 9900000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
    $('#width_range').slider({
        range:true,
        min:100,
        max:20000,
        values:[100, 20000],
        step:50,
        stop:function(event, ui)
        {
            $('#width_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_width').val(ui.values[0]);
            $('#hidden_maximum_width').val(ui.values[1]);
            filter_data();
        }
    });
    $('#height_range').slider({
        range:true,
        min:100,
        max:20000,
        values:[100, 20000],
        step:50,
        stop:function(event, ui)
        {
            $('#height_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_height').val(ui.values[0]);
            $('#hidden_maximum_height').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>  
</body>
</html>