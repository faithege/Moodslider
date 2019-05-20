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
        
        <div class="container">
            <div class="wrap-box-1">
                <h3>How are you feeling today?</h3>

                <div class="slidecontainer">
                    <form action="serverside/handleSliderInput.php" method="post" id="userForm">
                        <div class="row" >
                            <p class="leftSliderLabel">Make me sad</p>
                            <input type="range" name="happiness" min="-2" max="2" value="0" id="happinessRange" onchange="makeSuggestions()" class="slider" >
                            <p class="rightSliderLabel">Make me happy</p>
                        </div>
                        <br>
                        <div class="row">
                            <p class="leftSliderLabel">I'm falling asleep</p>
                            <input type="range" name="awakeness" min="-2" max="2" value="0" id="awakenessRange" onchange="makeSuggestions()" class="slider">
                            <p class="rightSliderLabel">I'm wide awake</p>
                        </div>
                        <br>
                        <div class="row">
                            <p class="leftSliderLabel">Soothe me</p>
                            <input type="range" name="scareability" min="-2" max="2" value="0" id="scareabilityRange" onchange="makeSuggestions()" class="slider">
                            <p class="rightSliderLabel">Scare me</p>
                        </div>
                        <br>
                        <div class="row">
                            <p class="leftSliderLabel">Make me cry</p>
                            <input type="range" name="laughability" min="-2" max="2" value="0" id="laughabilityRange" onchange="makeSuggestions()" class="slider">
                            <p class="rightSliderLabel">Make me laugh</p>
                        </div>
                        
                    </form>
                </div>
                </div>
                <br>
                <br>
            <div class="wrap-box-2">
                <h3>Films suggested for you</h3>
                <div class="row" id="suggestions">
                    
<!--                Here there are five default cards, if there is a file loaded and the slider is moved, these will be replaced via the makeSuggestions JS function-->
                    <?php 
                    require_once 'serverside/phpFunctions.php';
                   
                    for ($defaultCard=0; $defaultCard<5; $defaultCard++){ 
                         createDefaultCard(); 
                    }
                    
                    ?>
                </div>
            </div>
        </div>
        
        <script src="jsFunctions.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
