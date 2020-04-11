id = name => document.getElementById(name);
cl = name => document.getElementsByClassName(name);






let inputs = document.querySelectorAll(".input");
let allowed = ["0","1", "2", "3", "4", "5", "6", "7", "8", "9", ",", "."];

inputs.forEach(filter);

function filter(input) {
	input.addEventListener('keypress', function(e) {
		if (!allowed.includes(e.key)) {
			event.preventDefault();
		} 
	});
}


function calculSoldes() {
	
}

function firstCalc() {
	let saleId = document.getElementById("sale");
	// gets the values and replaces , by .
	let saleContent = (saleId.innerText).replace(",", ".");



	let price = (document.getElementById("price").innerText).replace(",", ".");
	let firstResult = document.getElementById("reducedPrice");

	if (saleContent && price) {
		let reducedPrice = price * (saleContent / 100);



		// puts result in place
		if (reducedPrice) {

			// smaller results
			reducedPrice = reducedPrice.toFixed(6);
			//to remove useless zeros at the end
			reducedPrice = parseFloat(reducedPrice);


			firstResult.innerText = reducedPrice;

			// La class pour que ça s'allume
			firstResult.classList.add("valid");
		}
		
		
		

	} else {
		// removes previous result
		firstResult.innerText = "\u00A0";
		firstResult.classList.remove("valid");
	}

}

function secondCalc() {
	let partialValue = (document.getElementById("partialValue").innerText).replace(",", ".");
	let totalValue = (document.getElementById("totalValue").innerText).replace(",", ".");
	let secondResult = document.getElementById("percentage");

	if (partialValue && totalValue) {
		let percentage = (100 * partialValue) / totalValue;

		percentage = percentage.toFixed(6);
		percentage = parseFloat(percentage);

		secondResult.innerText = percentage;
		secondResult.classList.add("valid");
	} else {
		secondResult.innerText = "\u00A0";
		secondResult.classList.remove("valid");
	}
}

function thirdCalc() {
	let startValue = (document.getElementById("startValue").innerText).replace(",", ".");
	let endValue = (document.getElementById("endValue").innerText).replace(",", ".");
	let thirdResult = document.getElementById("rate");

	if (startValue && endValue) {
		let rate = ((endValue - startValue) / startValue) * 100;

		rate = rate.toFixed(6);
		rate = parseFloat(rate);

		thirdResult.innerText = rate;
		thirdResult.classList.add("valid");
	} else {
		thirdResult.innerText = "\u00A0";
		thirdResult.classList.remove("valid");
	}
}