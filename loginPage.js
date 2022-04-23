	function validateLoginForm() {
		const user = document.getElementById("svid");
		const password = document.getElementById("logpw");
		const form = document.getElementById("form");

while(user.value !== "" && password.value!==""){
 if (password.value.length < 8) {
		alert("Your password must include atleast 8 characters");
		return false;
	}
	else {
		alert("Successfully logged in");
		return true;
	}
}
	}

function validateSignupForm() {
	var name = document.getElementById("signName");
	var mail = document.getElementById("email");
	var unit = document.getElementById("signUnit");
	var password = document.getElementById("signPassword");
	var password1 = document.getElementById("signRepeated");

while(name.value !== "" && mail.value!=="" && unit.value!=="" && password.value!==""){
	if (password.value.length < 8) {
		alert("Your password must include atleast 8 characters");
		return false;
	}else if (password.value!== password1.value){
		alert("Repeated password must be same as password");
		return false;
	}
}



		
