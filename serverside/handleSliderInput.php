<?php
    require_once 'serverside/phpFunctions.php';

    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
            $happinessScore = validateScore($_POST['happiness']);
            $awakenessScore = validateScore($_POST['awakeness']);
            $scareabilityScore = validateScore($_POST['scareability']);
            $laughabilityScore = validateScore($_POST['laughability']);
        }
        else{
            $happinessScore = '';
            $awakenessScore = '';
            $scareabilityScore = '';
            $laughabilityScore = '';
        }
    } catch (Exception $e){
        header("Location: errorPage.php");  
    }

    
    $xmlUploadPath='xmlUploadedFile/uploadedContent.XML';
        

    if (file_exists($xmlUploadPath)){

        $xmlFilms=simplexml_load_file($xmlUploadPath);

        $filmsFilteredByScores= filterByScores($xmlFilms,$happinessScore,$awakenessScore,$scareabilityScore,$laughabilityScore);
        shuffle($filmsFilteredByScores);

        $fiveSuggestions=[];

        /*An array of five films is required for the webpage, if there are less that five films that meet the user's criteria, 
        * an empty string is added to the array, and is handled (Sorry no content) by the webpage*/

        for ($suggestion=0; $suggestion<5; $suggestion++){
            if(isset($filmsFilteredByScores[$suggestion])){
                $fiveSuggestions[]=$filmsFilteredByScores[$suggestion];
            }
            else {
                $fiveSuggestions[]='';
            }
        }
    }
    else {
        $fiveSuggestions=['','','','',''];
    }
    
       






