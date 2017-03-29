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
//FUNCTION TO DETERMINE A WINNER
function fight(a, b) {
	//declares some variables
	var around = 0; //# rounds rounds A wins
	var aknockdown = 0; //# of knockdowns A scores
	var bround = 0; //# of rounds B wins
	var bknockdown = 0; //# of knockdowns B scores
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
		aovr = aoff + adef;
		bovr = boff + bdef;
	}
	//this now sims each round and determines a winner
	for (var i = 0; i < 12; i++) {
		createRound(a, b);
		if (aovr > bovr) {
			around++;
			if (aovr - bovr > 37) {
				aknockdown++;
				b.chin - 3;
				b.defense - 3;
				console.log(a.name + ' dropped ' + b.name);
			} if (aovr - bovr > 45) {
				winnermethod = a.name + ' has knocked out' + b.name;
				winner = a.name;
				winnerimage = a.image;
				break;
			}
		} else {
			bround++;
			if (bovr - aovr > 37) {
				bknockdown++;
				a.chin - 3;
				b.chin - 3;
				console.log(b.name + ' dropped ' + a.name);
			} if (bovr - aovr > 45) {
				winnermethod = b.name + ' has knocked out ' + a.name;
				winner = b.name;
				winnerimage = b.image;
				break;
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
		winnerimage	= b.image;
		winnermethod = scores.toString();
	} else {
		winner = a.name;
		winnerimage = a.image;
		winnermethod = scores.toString();
	}
	console.log('winner ' + winner);
	console.log('winnerimage ' + winnerimage);
	console.log('winnermethod ' + winnermethod);
}

//determine a winner of round 1 - #1 vs #8
$("#round1fight1").on("click", function() {
	if (boxers) {
		generateAWinner(boxers[1], boxers[8]);
		$("#round2seed1image").attr("src", winnerimage);
		console.log('i should be going to the seed 1 position in round 2');
		document.getElementById("round2seed1name").innerHTML = winner;
		document.getElementById("round2seed1method").innerText = winnermethod;
		if (boxers[1]["name"] == winner) {
			round2seed1 = boxers[1];
		} else {
			round2seed1 = boxers[8];
		}
		winnermethod = [];
		scores = [];
		acard = 0;
		bcard = 0;
	}
	$("#round1fight1").addClass("is-disabled");
	checkResults();
})
//determine a winner of round 1 - #2 vs #7
$("#round1fight2").on("click", function() {
	if (boxers) {
		generateAWinner(boxers[2], boxers[7]);
		$("#round2seed3image").attr("src", winnerimage);
		console.log('i should be going to the seed 3 position in round 2');
		document.getElementById("round2seed3name").innerHTML = winner;
		document.getElementById("round2seed3method").innerText = winnermethod;
		if (boxers[2]["name"] == winner) {
			round2seed3 = boxers[2];
		} else {
			round2seed3 = boxers[7];
		}
		winnermethod = [];
		scores = [];
		acard = 0;
		bcard = 0;
	}
	$("#round1fight2").addClass("is-disabled");
	checkResults();
})
//determine a winner of round 1 - #3 vs #6
$("#round1fight3").on("click", function() {
	if (boxers) {
		generateAWinner(boxers[3], boxers[6]);
		$("#round2seed2image").attr("src", winnerimage);
		console.log('i should be going to the seed 2 position in round 2');
		document.getElementById("round2seed2name").innerHTML = winner;
		document.getElementById("round2seed2method").innerText = winnermethod;
		if (boxers[3]["name"] == winner) {
			round2seed2 = boxers[3];
		} else {
			round2seed2 = boxers[6];
		}
		winnermethod = [];
		scores = [];
		acard = 0;
		bcard = 0;
	}
	$("#round1fight3").addClass("is-disabled");
	checkResults();
})
//determine a winner of roudn 1 - #4 vs #5
$("#round1fight4").on("click", function() {
	if (boxers) {
		generateAWinner(boxers[4], boxers[5]);
		$("#round2seed4image").attr("src", winnerimage);
		console.log('i should be going to the seed 4 position in round 2');
		document.getElementById("round2seed4name").innerHTML = winner;
		document.getElementById("round2seed4method").innerText = winnermethod;
		if (boxers[4]["name"] == winner) {
			round2seed4 = boxers[4];
		} else {
			round2seed4 = boxers[5];
		}
		winnermethod = [];
		scores = [];
		acard = 0;
		bcard = 0;
	}
	$("#round1fight4").addClass("is-disabled");
	setTimeout(checkResults(), 2000);
})

//ROUND 2 BEGINS NOW
//first we must add the buttons
function checkResults() {
	//check that all results have been generated from round 1
	if ($("#round2seed1method").text().length > 0 && $("#round2seed2method").text().length > 0 && $("#round2seed3method").text().length > 0 && $("#round2seed4method").text().length > 0) {
		//tells the buttons to pop up
		$("#round2fight1").show("slow");
		$("#round2fight2").show("slow");
	}
}

$("#round2fight1").on("click", function() {
	generateAWinner(round2seed1, round2seed4);
	$("#round3seed1image").attr("src", winnerimage);
		document.getElementById("round3seed1name").innerHTML = winner;
		document.getElementById("round3seed1method").innerText = winnermethod;
		if (round2seed1["name"] == winner) {
			finalseed1 = round2seed1;
		} else {
			finalseed1 = round2seed1;
		}
		winnermethod = [];
		scores = [];
		acard = 0;
		bcard = 0;
})
$("#round2fight2").on("click", function() {
	generateAWinner(round2seed2, round2seed3);
	$("#round3seed2image").attr("src", winnerimage);
		document.getElementById("round3seed2name").innerHTML = winner;
		document.getElementById("round3seed2method").innerText = winnermethod;
		if (round2seed2["name"] == winner) {
			finalseed2 = round2seed2;
		} else {
			finalseed2 = round2seed3;
		}
		winnermethod = [];
		scores = [];
		acard = 0;
		bcard = 0;
})
