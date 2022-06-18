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
    window.location.href = "profile1.css"
}

function Submit(event) {
    event.preventDefault();
    window.location.href = "/login/login.html"
}


var checkcurpass= function (){
    if(document.getElementById('oldpass').value==document.getElementById('oripass').value){
        document.getElementById('curpass').style.color ='green';
        document.getElementById('curpass').innerHTML = 'Current password is correct';
    }else{
        document.getElementById('curpass').style.color ='red';
        document.getElementById('curpass').innerHTML = 'Current password is incorrect';
    }

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

//declearing html elements

const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');

//if user hover on img div 

imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});

//if we hover out from img div

imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});


file.addEventListener('change', function(){

    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); 

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});
