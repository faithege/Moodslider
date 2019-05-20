<?php


    function createDefaultCard(){
        echo '<div class="card">
              <img src="images/webImages/noContent.jpg" alt="No content" class="cardImage">
              <h4>No content</h4>
              <p>-</p>
              <a href="contentUpload.php"><button class="readMore">Upload More</button></a>
              </div>';
    }
    
    
    function createSuggestionCard($arrayPosition,$imagePath, $title,$genre){
        echo '<div class="card">';
        echo '<img src="'.$imagePath.'" alt="Suggestion" class="cardImage" >';
        echo '<h4>'.$title.'</h4>';
        echo '<p>'.$genre.'</p>';
        echo '<button class="readMore" data-toggle="modal" data-target="#myModal'.$arrayPosition.'">Read More</button>';
        echo '</div>';

    }
    
    function createSuggestionModal($arrayPosition,$imagePath, $title,$genre,$description,$year,$runningTime,$mood){
         echo '<div id="myModal'.$arrayPosition.'" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <div class="modal-header">
                            <h4 class="modal-title">'.$title.'</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <div class="modal-body">
                            <img src="'.$imagePath.'" alt="Suggestion" class="cardImage" >
                            <br>
                            <br>
                            <p>'.$description.'</p>
                        </div>
                                
                        <div class="modal-footer">
                            <div class="btn-group">
                                <button class="btn-nolink" style="background-color: #382784;color: #FFFFFF;border: solid;">'.$year.'</button>
                                <button class="btn-nolink" style="background-color: #382784;color: #FFFFFF;border: solid;">'.$genre.'</button>
                                <button class="btn-nolink" style="background-color: #382784;color: #FFFFFF;border: solid;">'.$runningTime.' minutes</button>
                                <button class="btn-nolink" style="background-color: #382784;color: #FFFFFF;border: solid;"> Mood: '.$mood.'</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }

    
    function fileTransfer($oldLocation,$newLocation,$successAction){
        if (!move_uploaded_file($oldLocation, $newLocation)){
            throw new Exception("Unfortunately there's been an error with transferring your file to our system");
        }

        else{
            echo $successAction;
        }

        if (file_exists($oldLocation)){
            unlink($oldLocation);
        }
    }

    
    function fileUpload($uploadKey,$allowedFiles){
        if (empty ($_FILES[$uploadKey]['name'])){
            throw new Exception("You forgot to add a file");
        }

        if (!in_array($_FILES[$uploadKey]['type'], $allowedFiles)){
            throw new Exception("We only accept XML files I'm afraid");
        }

        if ($_FILES[$uploadKey]['error']== (1||2)){
            throw new Exception("Your file is too big for us to handle, awkward! Please choose a file under 100KB.");
        }

        if ($_FILES[$uploadKey]['error']>2){
            throw new Exception("Unfortunately there's been an error with the uploading process");
        }
    }


    function filterByMood($content,$userMood){
        $contentFilteredByMood=[];

        foreach ($content->children() as $item){
            if ($item->mood == $userMood){
                $contentFilteredByMood[]=$item;
            }
        }
        return $contentFilteredByMood;
    }
    
    
    function filterByScores($content,$userHappiness, $userAwakeness, $userScareability, $userLaughability){
        $contentFilteredByScores=[];

        foreach ($content->children() as $item){
            if ($item->happinessScore== $userHappiness
                && $item->awakenessScore== $userAwakeness
                && $item->scareabilityScore== $userScareability
                && $item->laughabilityScore== $userLaughability){
                
                $contentFilteredByScores[]=$item;
            }
        }
        return $contentFilteredByScores;
    }
    
        
    function trimFilmTitle($title){
        if (strlen($title) < 20){ 
            return $title;
            }   
        else {
            return substr($title,0,18).'...';
        }
    }

    
    function validateScore($unvalidatedScore){
        $validatedScore = filter_var($unvalidatedScore, FILTER_VALIDATE_INT);

	if ($validatedScore === false) {
		throw new Exception('Invalid slider input');
	}
        else {
            return $validatedScore;
        }
    }
    
    