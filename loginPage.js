	function validateLoginForm() {
		const user = document.getElementById("svid");
		const password = document.getElementById("logpw");
		const form = document.getElementById("form");



	if (svid.value == "" || password.value == "") {
		alert("Please fill the required fields");
		return false;
	}

	else if (password.value.length < 8) {
		alert("Your password must include atleast 8 characters");
		return false;
	}
	else {
		alert("Successfully logged in");
		return true;
	}
}

function validateSignupForm() {
	var name = document.getElementById("signName");
	var mail = document.getElementById("email");
	var unit = document.getElementById("signUnit");
	var password = document.getElementById("signPassword");
	var password1 = document.getElementById("signRepeated");
	var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	if ( name.value == "" || mail.value == "" || unit.value=="" || password.value == "" || password1.value == "" ) {
	alert("Please fill the required fields");
		return false;
	}
	else if (password.value.length < 8) {
		alert("Your password must include atleast 8 characters");
		return false;
	}else if (password.value!= password1.value){
		alert("Repeated password must be same as password")
	}else if (!email.value.match(validRegex)) {
		alert("Please enter correct email ID")
		document.form.email.focus() ;
		return false;
	}else {
		alert("Successfully signed up");
		window.location.href="http://127.0.0.1:5500/southview-fe/sigupPage/signupnoti.html"
    }
}

function validateForgetPassword(){
	var emailID = document.getElementById("email");
	var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	if (emailID.value==""){
		alert("Please fill the required fields");
	}else if (!emailID.value.match(validRegex)) {
			alert("Please enter correct email ID")
			document.form.email.focus() ;
			return false;
	} else{
		alert("Sent successfully.")
		document.getElementById("resetbtn").addEventListener("click", myFunction);
		function myFunction(){
		window.location.href="http://127.0.0.1:5500/southview-fe/sigupPage/signupnoti.html";
	}
}
		}
