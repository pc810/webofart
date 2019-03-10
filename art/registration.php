<html>
    <body>

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);
        ?>


        <div class="container ">

            <h1 class="text-center">Register Art</h1>
            <div class="row">
                <div class="col-md-2">
                    &nbsp;
                </div>
                <div class="col-md-8">
                    <form action="../art/registerart.php" method="POST" enctype="multipart/form-data">
                        <table class="table table-striped text-center col-md-10"> 
                            <tr>
                                <td>
                                    Art title
                                </td>
                                <td>
                                    <input type="text" name="art_title">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Art Medium
                                </td>
                                <td>
                                    <input type="text" name="art_medium">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Genre
                                </td>
                                <td>
                                    <select name="art_genre">
    <option value="nature">Nature</option>
    <option value="bodyart">Body Art</option>
    <option value="abstract">Abstract</option>
    <option value="history">History</option>
  </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Upload art
                                </td>
                                <td>
                                    <input type="file" name="art_loc">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Width
                                </td>
                                <td>
                                    <input type="text" name="art_width">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Height
                                </td>
                                <td>
                                    <input type="text" name="art_height">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    About
                                </td>
                                <td>
                                    <input type="text" name="art_about">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price
                                </td>
                                <td>
                                    <input type="text" name="art_price">                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Art created
                                </td>
                                <td>
                                    <input type="date" name="art_created_date">
                                </td>
                            </tr>
                            <tr>                     
                        </table>

                        <div class="col-md-12"style="text-align:center">
                            <input type="submit" value="submit">
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
