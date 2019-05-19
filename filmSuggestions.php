<?php require_once 'serverside/handleSliderInput.php';?>

<div class="row">
    <?php 
        /*This iterates through the array of five film suggestions, displaying an information card if a film has been sugggested.
         * If there are less than five films recommented in the array, a standard no content response will be displayed for missing films*/
        for ($suggestion=0; $suggestion<5; $suggestion++){
            echo '<div class="card">';
            
            if($fiveSuggestions[$suggestion]!=''){
                echo '<img src="'.$fiveSuggestions[$suggestion]->imagePath.'" alt="Suggestion" class="cardImage" >';
                echo '<h4>'.trimFilmTitle($fiveSuggestions[$suggestion]->title).'</h4>';
                echo '<p>'.$fiveSuggestions[$suggestion]->genre.'</p>';
                echo '<button class="readMore" data-toggle="modal" data-target="#myModal'.$suggestion.'">Read More</button>';
                echo '<div id="myModal'.$suggestion.'" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">'.$fiveSuggestions[$suggestion]->title.'</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <img src="'.$fiveSuggestions[$suggestion]->imagePath.'" alt="Suggestion" class="cardImage" >
                                    <br>
                                    <br>
                                    <p>'.$fiveSuggestions[$suggestion]->description.'</p>
                                </div>
                                
                                <div class="modal-footer">
                                    <div class="btn-group">
                                        <button class="btn-nolink" style="background-color: #382784;color: #FFFFFF;border: solid;">'.$fiveSuggestions[$suggestion]->year.'</button>
                                        <button class="btn-nolink" style="background-color: #382784;color: #FFFFFF;border: solid;">'.$fiveSuggestions[$suggestion]->genre.'</button>
                                        <button class="btn-nolink" style="background-color: #382784;color: #FFFFFF;border: solid;">'.$fiveSuggestions[$suggestion]->runningTimeMinutes.' minutes</button>
                                        <button class="btn-nolink" style="background-color: #382784;color: #FFFFFF;border: solid;"> Mood: '.$fiveSuggestions[$suggestion]->mood.'</button>
                                            
                                    </div>
                                </div>
                            </div>

                           </div>
                       </div>';
            }
            else{
                echo '<img src="images/webImages/noContent.jpg" alt="No content" class="cardImage">
                      <h4>No content</h4>
                      <p>-</p>
                      <a href="contentUpload.php"><button class="readMore">Upload More</button></a>';
            }
            echo '</div>';    
        }
    ?>
    
</div>