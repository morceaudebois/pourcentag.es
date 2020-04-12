id = name => document.getElementById(name);
cl = name => document.getElementsByClassName(name);

let inputs = document.querySelectorAll(".input");
let allowed = ["0","1", "2", "3", "4", "5", "6", "7", "8", "9", ",", "."];


// Pour remplacer les virgules par des points
function comReplace(value) {
	return value.replace(",", ".");
}

// Pour savoir combien y a de décimales
Number.prototype.countDecimals = function () {
    if(Math.floor(this.valueOf()) === this.valueOf()) return 0;
    return this.toString().split(".")[1].length || 0; 
}







// Indication d'erreur quand mauvaise touche
function error(input) {
	event.preventDefault();
	input.classList.add("error");
	setTimeout(() => { input.classList.remove("error"); }, 150);
}

function filterCalc(input) {

	// filtre les inputs
	input.addEventListener('keypress', function(e) {
		if (!allowed.includes(e.key)) {
			error(input);
		//truc compliqué pour empêcher d'avoir plusieurs virgules
		} else if ((input.innerText.indexOf('.') > -1 || input.innerText.indexOf(',') > -1) && (e.key === "." || e.key === ",")) {
			error(input);
		}
	});

	// à chaque entrée de texte
	input.addEventListener('input', function(e) {

		// indique si les inputs sont pleins/vides
		if (input.innerText.length > 0) {
			input.classList.add("full");
		} else {
			input.classList.remove("full");
		}

		// lance les calculs
		calculSoldes();
		calculQuantite()
	});
}

inputs.forEach(filterCalc);

function reset(toReset) {
	// removes previous result
	toReset.innerText = "\u00A0";
	toReset.classList.remove("valid");
}



function calculSoldes() {
	// prend les valeurs et remplace , par .
	let pourcent = comReplace(id("pourcent").innerText);
	let total = comReplace(id("total").innerText);

	let reduced = id("reduced");

	if (pourcent && total) {
		// calcule
		let reducedVal = total * (pourcent / 100);

		// limite à 6 décimales
		smallerResult(reducedVal, false, reduced);

	} else {
		reset(reduced);
	}
}

function calculQuantite() {
	let quantite = comReplace(id("quantite").innerText);
	let quantiteTotale = comReplace(id("quantiteTotale").innerText);

	let quantiteResult = id("quantiteResult");

	if (quantite && quantiteTotale) {
		// calcule
		let quantiteResultVal = (100 * quantite) / quantiteTotale;
		
		// limite à 6 décimales
		smallerResult(quantiteResultVal, true, quantiteResult);

		
	} else {
		// removes previous result
		reset(quantiteResult);
	}
}



function calcul(type,x,y) {
	if (type === "solde") {
		return y * (x / 100);
	} else if (type === "quant") {
		return (100 * x) / y;
	} else if  (type === "evo") {
		return ((y - x) / x) * 100;
	}
}

// Limite les décimales à 6, ajoute la class valid et inscrit le résultat
function smallerResult(value, isPercent, resultInput) {
	let smaller = parseFloat(value.toFixed(6));

	if (isPercent) {
		resultInput.innerText = smaller + "%";
	} else {
		resultInput.innerText = smaller;
	}

	resultInput.classList.add("valid");
}





// function thirdCalc() {
// 	let startValue = (document.getElementById("startValue").innerText).replace(",", ".");
// 	let endValue = (document.getElementById("endValue").innerText).replace(",", ".");
// 	let thirdResult = document.getElementById("rate");

// 	if (startValue && endValue) {
// 		let rate = ((endValue - startValue) / startValue) * 100;

// 		rate = rate.toFixed(6);
// 		rate = parseFloat(rate);

// 		thirdResult.innerText = rate;
// 		thirdResult.classList.add("valid");
// 	} else {
// 		thirdResult.innerText = "\u00A0";
// 		thirdResult.classList.remove("valid");
// 	}
// }