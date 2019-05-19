<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="styles.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Moodslider</title>
    </head>
    <body>
        <div id="header">
            <h1>Moodslider</h1>
        </div>
        
        <?php require 'NavBar.html';?>
        
        <div class="container"  >
            <div class="wrap-box-1">
                <h3>Add films to the Moodslider</h3>
                <br>
                <br>
                <br>
                
                <div class="row" >
                    <form action="serverside/handleUploadedXML.php" method="post" enctype="multipart/form-data" class="uploadForm">
                            
                        <div class="custom-file"> 
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
                            <input type="file" name="uploadedXML"/>
                            <input type="submit" value="Upload"/>
                        </div>                      
                    </form>
                    
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
