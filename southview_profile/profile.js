var values = [];
function handleFormSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    formData.forEach((value, key) => {
        values.push(value)
        console.log(key, value);
    });
    console.log(values)
    window.location.href = "profile1.html"
}

function Submit(event) {
    event.preventDefault();
    window.location.href = "/login/login.html"
}

var check = function () {
    if (document.getElementById('logpw').value ==
        document.getElementById('confirmpw').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Passwords matched';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Please make sure the passwords are the same';
    }
}

function hadSubmit(event) {
    event.preventDefault();
    window.location.href = "#resetsuccess"
}

