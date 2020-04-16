id = name => document.getElementById(name);
cl = name => document.getElementsByClassName(name);

// Pour remplacer les virgules par des points
function comReplace(value) {
	return value.replace(",", ".");
}

// Indication d'erreur quand mauvaise touche
function error(input) {
	event.preventDefault();
	input.classList.add("error");
	setTimeout(() => { input.classList.remove("error"); }, 125);
}

function launcher(input) {
	const allowed = RegExp("[0-9,\.]");
 
	// filtre les inputs
	input.addEventListener('keypress', function(e) {

		if (!allowed.test(e.key)) {
			error(input);
		//truc compliqué pour empêcher d'avoir plusieurs virgules
		} else if ((input.innerText.indexOf('.') > -1 || input.innerText.indexOf(',') > -1) && (e.key === "." || e.key === ",")) {
			error(input);
		} else if (this.innerText.length > 24) {
			error(input);
		}
	});

	// filtre les copiés collés
	input.addEventListener('paste', function(event) {

		event.preventDefault();
        event.stopPropagation();

        const pastedText = event.clipboardData.getData('text');
        let numbersOnly = pastedText.replace(/[^0-9,\.]/g, '');

		let dotCount = (numbersOnly.match(/\./g) || []).length;
		let commaCount = (numbersOnly.match(/,/g) || []).length;
		let sum = dotCount + commaCount;

		while (sum > 1) {
			let i = 0;

			numbersOnly = numbersOnly.replace(/\./g, m  => !i++ ? m : '');
			numbersOnly = numbersOnly.replace(/,/g, m  => !i++ ? m : '');

			dotCount = (numbersOnly.match(/\./g) || []).length;
			commaCount = (numbersOnly.match(/,/g) || []).length;
			sum = dotCount + commaCount;
		}

        input.innerText = numbersOnly;

        if (numbersOnly === "") {
        	error(input);
        }
	});

	// à chaque entrée de texte
	input.addEventListener('input', function(e) {
		// indique si les inputs sont pleins/vides (pour  le % de la bonne couleur)
		if (input.innerText.length > 0) {
			input.classList.add("full");
		} else {
			input.classList.remove("full");
		}

		// lance le calcul
		processor(input);
	});
}

function processor(input) {
	// Récupère le parent pour savoir à qui on a affaire
	let parent = input.parentNode;

	let x = comReplace(parent.querySelector("#x").innerText);
	let y = comReplace(parent.querySelector("#y").innerText);

	let zInput = parent.querySelector("#resultat");

	// cache le placeholder du résultat quand il y au moins une entrée
	if (x || y) {
		zInput.classList.add("hidePh");
	} else {
		zInput.classList.remove("hidePh");
	}

	if (parent.classList.contains("solde")) {
		// si les deux inputs sont pleins
		if (x && y) {
			// lance le calcul puis le traite
			processResult(calcul("solde", x, y), false, zInput);
		} else {
			// reset quand les inputs sont vides
			reset(zInput,x,y);
		}
	} else if (parent.classList.contains("quant")) {
		if (x && y) {
			processResult(calcul("quant", x, y), true, zInput);
		} else {
			reset(zInput,x,y);
		}
	} else if (parent.classList.contains("evo")) {
		if (x && y) {
			processResult(calcul("evo", x, y), true, zInput);
		} else {
			reset(zInput,x,y);
		}
	}
}

// Limite les décimales à 6, inscrit le résultat et ajoute la class .valid
function processResult(value, isPercent, resultInput) {
	let result = parseFloat(value.toFixed(6));

	if (isPercent) {
		resultInput.innerText = result + "%";
	} else {
		resultInput.innerText = result;
	}

	if (result === Infinity || isNaN(result)) {
		resultInput.classList.add("invalid");
	} else {
		resultInput.classList.add("valid");
	}
	
}

// Pour savoir combien y a de décimales
Number.prototype.countDecimals = function () {
    if(Math.floor(this.valueOf()) === this.valueOf()) return 0;
    return this.toString().split(".")[1].length || 0; 
}

// removes previous result
function reset(toReset, x, y) {
	// si un seul champ
	if (!x && y || x && !y) {
		toReset.innerText = "\u00A0";
	// si tout est vide
	} else if (!x && !y) {
		toReset.innerText = "";
	}

	toReset.classList.remove("invalid", "valid");
}

// des belles mathématiques
function calcul(type,x,y) {
	switch(type) {
		case "solde":
			return y * (x / 100);
		case "quant":
			return (100 * x) / y;
		case "evo":
			return ((y - x) / x) * 100;
	}
}

let inputs = document.querySelectorAll(".input");
inputs.forEach(launcher);
