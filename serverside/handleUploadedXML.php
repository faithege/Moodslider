<?php
    
    require_once 'phpFunctions.php';
    
    const UPLOAD_KEY = 'uploadedXML';
    const ALLOWED_FILETYPES = ['application/xml','text/xml'];
    
    $temporaryFileLocation = $_FILES[UPLOAD_KEY]['tmp_name'];
    $destinationFileLocation = '../xmlUploadedFile/uploadedContent.XML';
    $successRedirect = '<script type="text/javascript">alert("File uploaded successfully to our system\nNow let the Moodslider know how you feel!");window.location.href = "../index.php";</script>';
    
    try{
        fileUpload(UPLOAD_KEY,ALLOWED_FILETYPES);
        fileTransfer($temporaryFileLocation, $destinationFileLocation, $successRedirect);
    } catch (Exception $e){
        header("Location: ../errorPage.php");  
    }
   

