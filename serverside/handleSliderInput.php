<?php
    require_once 'phpFunctions.php';

    //echo validateScore($_POST['awakeness']); - post request is coming through, but data not being used, dislaying 5 defaults
        
    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
            $happinessScore = validateScore($_POST['happiness']);
            $awakenessScore = validateScore($_POST['awakeness']);
            $scareabilityScore = validateScore($_POST['scareability']);
            $laughabilityScore = validateScore($_POST['laughability']);
        }
//        else{
//            $happinessScore = '';
//            $awakenessScore = '';
//            $scareabilityScore = '';
//            $laughabilityScore = '';
//        }
        #The else statement was needed because before the AJAX change, film Suggestions was a separate file called into index, and was responsible for handling the five suggestions
        #therefore if there was no slider movement, the film suggestions was still called by index which was still calling handleslider input therefore if scores werent defined output couldnt be shown
        #NOW output handle sliderinput only called upon if slider moved and post request sent, default is coded in index page
        
    } catch (Exception $e){
        header("Location: errorPage.php");  
    }

    
    $xmlUploadPath='../xmlUploadedFile/uploadedContent.XML';

    if (file_exists($xmlUploadPath)){

        $xmlFilms=simplexml_load_file($xmlUploadPath);

        $filmsFilteredByScores= filterByScores($xmlFilms,$happinessScore,$awakenessScore,$scareabilityScore,$laughabilityScore);
        shuffle($filmsFilteredByScores);//Matching films put in a random order for the user each time the slider is moved

//        We want 5 films to display on the webpage, for each of the first 5 films in the filtered array, an information card is shown
//        If there are less than 5 films that match the user's criteria, default cards are generated for the empty slots
        
        for ($film=0; $film<5; $film++){
            if(isset($filmsFilteredByScores[$film])){
            
                    createSuggestionCard($film
                                        ,$filmsFilteredByScores[$film]->imagePath
                                        ,trimFilmTitle($filmsFilteredByScores[$film]->title)
                                        ,$filmsFilteredByScores[$film]->genre);

                    createSuggestionModal($film
                                        ,$filmsFilteredByScores[$film]->imagePath
                                        ,trimFilmTitle($filmsFilteredByScores[$film]->title)
                                        ,$filmsFilteredByScores[$film]->genre
                                        ,$filmsFilteredByScores[$film]->description
                                        ,$filmsFilteredByScores[$film]->year
                                        ,$filmsFilteredByScores[$film]->runningTimeMinutes
                                        ,$filmsFilteredByScores[$film]->mood);
                }
                else{
                    createDefaultCard();
                }
        }
        
        
    } //Whilst the index page has five default cards as standard if no content uploaded,
    // if the user moves the sliders these disappear, this else statement is needed to retain them when sliders moved but no file exists
        
    else {
        for ($defaultCard=0; $defaultCard<5; $defaultCard++){
            createDefaultCard();
        }
    }