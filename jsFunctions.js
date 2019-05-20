//ajax to load movie recommendations
    function makeSuggestions() {
        //get slider values
        var happinessScore = document.getElementById("happinessRange").value;
        var awakenessScore = document.getElementById("awakenessRange").value;
        var scareabilityScore = document.getElementById("scareabilityRange").value;
        var laughabilityScore = document.getElementById("laughabilityRange").value;
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("suggestions").innerHTML = this.response;
            }
        };
        //fetch movie recommendations
        xhttp.open("POST", "serverside/handleSliderInput.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //This represents an URL encoded form.
        xhttp.send("happiness=" + happinessScore + "&awakeness=" + awakenessScore + "&scareability=" + scareabilityScore + "&laughability=" + laughabilityScore);
    }
    


