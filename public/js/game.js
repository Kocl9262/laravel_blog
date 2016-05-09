//Computer guesses number

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

$(document).ready(function() {
    $("#button").click(function() {
        var scrnb = $("input[name=checkListItem]").val();
        var guess = 0;
        var cumputerGuesses = [];
        var min = 1;
        var max = 100;
        var compGuess = -1;

        if (scrnb < 1 || scrnb > 100 || isNaN(scrnb)) {
            $(".list").append("<div class='item'>Enter number between 1 and 100</div>");


        } else {
            while (compGuess != -5) {
                compGuess = randomIntFromInterval(min, max);

                if (guess > 6) {
                    $(".list").append("<div class='item'>Computer didn't find your number in 7 tries</div>");
                    break;
                } else if (cumputerGuesses.indexOf(compGuess) == -1) {
                    if (compGuess > scrnb) {
                        max = compGuess;
                        cumputerGuesses.push(compGuess);
                        guess++;
                    } else if (compGuess < scrnb) {
                        min = compGuess;
                        cumputerGuesses.push(compGuess);
                        guess++;
                    } else {
                        cumputerGuesses.push(compGuess);
                        guess++;
                        console.log("Computer found your number in " + guess + " guesses.");
                        $(".list").append("<div class='item'>Computer found your number in " + guess + " guesses.</div>");
                        break;
                    }
                }
            }
            $(".list").append("<div class='item'>Computer guesses: " + cumputerGuesses + "</div>");
        }
    });
});

$(document).ready(function() {
    $("#button2").click(function() {
        $( ".list" ).empty();
    });
});
