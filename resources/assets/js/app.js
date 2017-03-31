/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

//DECLARE ALL THE VARIABLES 
var winner = ''; //obviously the winner after function is run
var winnerimage = ''; //images winner
var winnermethod = ''; //stores the score cards or whatever other results
var acard = 0; //a-sides scorecard victories, used to determine who wins
var bcard = 0; //b-sides scorecard victories, used to determine who wins
var scores = []; //scores will be stored in an array
var aknockdown = 0; //# of knockdowns A scores
var bknockdown = 0; //# of knockdowns B scores
var aknockout = 0; //determines if there is a KO
var bknockout = 0; //determines if there is a KO
var round = 1;
//FUNCTION TO DETERMINE A WINNER
function fight(a, b) {
    //declares some variables
    var around = 0; //# rounds rounds A wins
    var bround = 0; //# of rounds B wins
    //generate the random factor that will influence each fight
    var ran = function() {
            return (Math.random() * 25) + 10;
        }
        //function to generate stats newly each round
    function createRound(a, b) {
        aoff = (((a.power + a.speed + a.offense) * (a.stamina / 100)) / 2) * ran() / 100;
        boff = (((b.power + b.speed + b.offense) * (b.stamina / 100)) / 2) * ran() / 100;
        adef = ((a.defense * ran()) + a.chin) / 100;
        bdef = ((b.defense * ran()) + b.chin) / 100;
        aovr = Math.round(aoff + adef);
        bovr = Math.round(boff + bdef);
    }
    //this now sims each round and determines a winner
    for (var i = 1; i <= 12; i++) {
        createRound(a, b);
        if (aovr >= bovr) {
            around++;
            if ((aovr - bovr > 19) && (b.chin < 63) && (a.power > 63)) {
                aknockout++;
                round = i;
            }
            if ((aovr - bovr > 17) && (a.power > 61) && (b.chin < 64)) {
                aknockdown++;
                b.chin - 3;
                b.defense - 3;
            }
        } else {
            bround++;
            if ((bovr - aovr > 19) && (a.chin < 63) && (b.power > 63)) {
                bknockout++;
                round = i;
            }
            if ((bovr - aovr > 17) && (b.power > 61) && (a.chin < 64)) {
                bknockdown++;
                a.chin - 3;
                a.defense - 3;
            }
        }
    }
    //determines a winner
    if ((120 - bround - bknockdown) > (120 - around - aknockdown)) {
        acard++;
    } else if ((120 - bround - bknockdown) < (120 - around - aknockdown)) {
        bcard++;
    } else if ((120 - bround - bknockdown) === (120 - around - aknockdown)) {
        acard++;
    }
    //push the scorecards to a variable so they can be put in the div
    scores.push((120 - bround - bknockdown) + '-' + (120 - around - aknockdown));
}

function resetVariables() {
    winnermethod = [];
    scores = [];
    acard = 0;
    bcard = 0;
    aknockout = 0;
    bknockout = 0;
    aknockdown = 0;
    bknockdown = 0;
    round = 1;
}
//the function which actually determines the winner
function generateAWinner(a, b) {
    for (var i = 0; i < 3; i++) {
        fight(a, b);
    }
    if (acard > bcard) {
        winner = a.name;
        winnerimage = a.image;
        winnermethod = scores.toString();
    } else if (bcard > acard) {
        winner = b.name;
        winnerimage = b.image;
        winnermethod = scores.toString();
    } else {
        winner = a.name;
        winnerimage = a.image;
        winnermethod = scores.toString();
    }
}

//determine a winner of round 1 - #1 vs #8
$("#round1fight1").on("click", function() {
        if (boxers) {
            generateAWinner(boxers[1], boxers[8]);
            if (aknockout >= 1) {
                $("#round2seed1image").attr("src", boxers[1].image);
                document.getElementById("round2seed1name").innerText = boxers[1].name;
                document.getElementById("round2seed1method").innerText = boxers[1].name + ' knocked out ' + boxers[8].name + ' in round ' + round;
            } else if (bknockout >= 1) {
                $("#round2seed1image").attr("src", boxers[8].image);
                document.getElementById("round2seed1name").innerText = boxers[8].name;
                document.getElementById("round2seed1method").innerText = boxers[8].name + ' knocked out ' + boxers[1].name + ' in round ' + round;
            } else {
                $("#round2seed1image").attr("src", winnerimage);
                document.getElementById("round2seed1name").innerHTML = winner;
                document.getElementById("round2seed1method").innerText = winnermethod;
            }
        }
        if (boxers[1]["name"] == winner) {
            round2seed1 = boxers[1];
        } else {
            round2seed1 = boxers[8];
        }
        winnermethod = [];
        scores = [];
        acard = 0;
        bcard = 0;
        aknockout = 0;
        bknockout = 0;
        aknockdown = 0;
        bknockdown = 0;
        round = 1;
        $("#round1fight1").addClass("hiddenElement");
        checkResults();
    })
    //determine a winner of round 1 - #2 vs #7
$("#round1fight2").on("click", function() {
        if (boxers) {
            generateAWinner(boxers[2], boxers[7]);
            if (aknockout >= 1) {
                $("#round2seed2image").attr("src", boxers[2].image);
                document.getElementById("round2seed2name").innerText = boxers[2].name;
                document.getElementById("round2seed2method").innerText = boxers[2].name + ' knocked out ' + boxers[7].name + ' in round ' + round;
            } else if (bknockout >= 1) {
                $("#round2seed2image").attr("src", boxers[7].image);
                document.getElementById("round2seed2name").innerText = boxers[7].name;
                document.getElementById("round2seed2method").innerText = boxers[7].name + ' knocked out ' + boxers[2].name + ' in round ' + round;
            } else {
                $("#round2seed2image").attr("src", winnerimage);
                document.getElementById("round2seed2name").innerHTML = winner;
                document.getElementById("round2seed2method").innerText = winnermethod;
            }
        }
        if (boxers[2]["name"] == winner) {
            round2seed2 = boxers[2];
        } else {
            round2seed2 = boxers[7];
        }
        winnermethod = [];
        scores = [];
        acard = 0;
        bcard = 0;
        aknockout = 0;
        bknockout = 0;
        aknockdown = 0;
        bknockdown = 0;
        round = 1;
        $("#round1fight2").addClass("hiddenElement");
        checkResults();
    })
    //determine a winner of round 1 - #3 vs #6
$("#round1fight3").on("click", function() {
    if (boxers) {
        generateAWinner(boxers[3], boxers[6]);
        if (aknockout >= 1) {
            $("#round2seed3image").attr("src", boxers[3].image);
            document.getElementById("round2seed3name").innerText = boxers[3].name;
            document.getElementById("round2seed3method").innerText = boxers[3].name + ' knocked out ' + boxers[6].name + ' in round ' + round;
        } else if (bknockout >= 1) {
            $("#round2seed3image").attr("src", boxers[6].image);
            document.getElementById("round2seed3name").innerText = boxers[6].name;
            document.getElementById("round2seed3method").innerText = boxers[6].name + ' knocked out ' + boxers[3].name + ' in round ' + round;
        } else {
            $("#round2seed3image").attr("src", winnerimage);
            document.getElementById("round2seed3name").innerHTML = winner;
            document.getElementById("round2seed3method").innerText = winnermethod;
        }
    }
    if (boxers[3]["name"] == winner) {
        round2seed3 = boxers[3];
    } else {
        round2seed3 = boxers[6];
    }
    winnermethod = [];
    scores = [];
    acard = 0;
    bcard = 0;
    aknockout = 0;
    bknockout = 0;
    aknockdown = 0;
    bknockdown = 0;
    round = 1;
    $("#round1fight3").addClass("hiddenElement");
    checkResults();
})

//determine a winner of roudn 1 - #4 vs #5
$("#round1fight4").on("click", function() {
    if (boxers) {
        generateAWinner(boxers[4], boxers[5]);
        if (aknockout >= 1) {
            $("#round2seed4image").attr("src", boxers[4].image);
            document.getElementById("round2seed4name").innerText = boxers[4].name;
            document.getElementById("round2seed4method").innerText = boxers[4].name + ' knocked out ' + boxers[5].name + ' in round ' + round;
        } else if (bknockout >= 1) {
            $("#round2seed4image").attr("src", boxers[5].image);
            document.getElementById("round2seed4name").innerText = boxers[5].name;
            document.getElementById("round2seed4method").innerText = boxers[5].name + ' knocked out ' + boxers[4].name + ' in round ' + round;
        } else {
            $("#round2seed4image").attr("src", winnerimage);
            document.getElementById("round2seed4name").innerHTML = winner;
            document.getElementById("round2seed4method").innerText = winnermethod;
        }
    }
    if (boxers[4]["name"] == winner) {
        round2seed4 = boxers[4];
    } else {
        round2seed4 = boxers[5];
    }
    winnermethod = [];
    scores = [];
    acard = 0;
    bcard = 0;
    aknockout = 0;
    bknockout = 0;
    aknockdown = 0;
    bknockdown = 0;
    round = 1;
    $("#round1fight4").addClass("hiddenElement");
    checkResults();
})

//ROUND 2 BEGINS NOW
//first we must add the buttons
function checkResults() {
    //check that all results have been generated from round 1
    if ($("#round2seed1method").text().length > 0 && $("#round2seed2method").text().length > 0 && $("#round2seed3method").text().length > 0 && $("#round2seed4method").text().length > 0) {
        //tells the buttons to pop up
        $("#round2fight1").removeClass("hiddenElement");
        $("#round2fight2").removeClass("hiddenElement");
    }
}

function checkForFinal() {
    if ($("#round3seed1method").text().length > 0 && $("#round3seed2method").text().length > 0) {
        $("#finalmatch").removeClass("hiddenElement");
    }
}
// 1 v 8 winner = round2seed1
// 2 v 7 winner = round2seed2
// 3 v 6 winner = round2seed3
// 4 v 5 winner = round2seed4
// therefore, round2seed1 vs round2seed4
// and round2seed2 vs round2seed3 to determine the final
$("#round2fight1").on("click", function() {
    generateAWinner(round2seed1, round2seed4);
    if (aknockout >= 1) {
        $("#round3seed1image").attr("src", round2seed1.image);
        document.getElementById("round3seed1name").innerText = round2seed1.name;
        document.getElementById("round3seed1method").innerText = round3seed1.name + ' knocked out ' + round2seed4.name + ' in round ' + round;
    } else if (bknockout >= 1) {
        $("#round3seed1image").attr("src", round2seed4.image);
        document.getElementById("round3seed1name").innerText = round2seed4.name;
        document.getElementById("round3seed1method").innerText = round2seed4.name + ' knocked out ' + round2seed1.name + ' in round ' + round;
    } else {
        $("#round3seed1image").attr("src", winnerimage);
        document.getElementById("round3seed1name").innerHTML = winner;
        document.getElementById("round3seed1method").innerText = winnermethod;
        if (round2seed1["name"] == winner) {
            finalseed1 = round2seed1;
        } else {
            finalseed1 = round2seed4;
        }
    }
    winnermethod = [];
    scores = [];
    acard = 0;
    bcard = 0;
    aknockdown = 0;
    bknockdown = 0;
    checkForFinal();
    $("#round2fight1").addClass("hiddenElement");
})
$("#round2fight2").on("click", function() {
    generateAWinner(round2seed2, round2seed3);
    if (aknockout >= 1) {
        $("#round3seed2image").attr("src", round2seed2.image);
        document.getElementById("round3seed2name").innerText = round2seed2.name;
        document.getElementById("round3seed2method").innerText = round2seed2.name + ' knocked out ' + round2seed3.name + ' in round ' + round;
    } else if (bknockout >= 1) {
        $("#round3seed2image").attr("src", round2seed3.image);
        document.getElementById("round3seed2name").innerText = round2seed3.name;
        document.getElementById("round3seed2method").innerText = round2seed3.name + ' knocked out ' + round2seed2.name + ' in round ' + round;
    } else {
        $("#round3seed2image").attr("src", winnerimage);
        document.getElementById("round3seed2name").innerHTML = winner;
        document.getElementById("round3seed2method").innerText = winnermethod;
        if (round2seed2["name"] == winner) {
            finalseed2 = round2seed2;
        } else {
            finalseed2 = round2seed3;
        }
    }
    winnermethod = [];
    scores = [];
    acard = 0;
    bcard = 0;
    aknockdown = 0;
    bknockdown = 0;
    checkForFinal();
    $("#round2fight2").addClass("hiddenElement");
})
$("#finalmatch").on("click", function() {
    generateAWinner(finalseed1, finalseed2);
    if (aknockout >= 1) {
        $("#winnerimage").attr("src", finalseed1.image);
        document.getElementById("winnername").innerText = finalseed1.name;
        document.getElementById("winnermethod").innerText = finalseed1.name + ' knocked out ' + finalseed2.name + ' in round ' + round;
    } else if (bknockout >= 1) {
        $("#winnerimage").attr("src", finalseed2.image);
        document.getElementById("winnername").innerText = finalseed2.name;
        document.getElementById("winnermethod").innerText = finalseed2.name + ' knocked out ' + finalseed1.name + ' in round ' + round;
    } else {
        $("#winnerimage").attr("src", winnerimage);
        document.getElementById("winnername").innerHTML = winner;
        document.getElementById("winnermethod").innerText = winnermethod;
        if (finalseed1["name"] == winner) {
            thewinner = finalseed1;
        } else {
            thewinner = finalseed2;
        }
    }
    winnermethod = [];
    scores = [];
    acard = 0;
    bcard = 0;
    aknockdown = 0;
    bknockdown = 0;
    $("#finalmatch").addClass("hiddenElement");
})
