var counter= 1;
setInterval(function(){
    document.getElementById('btn' + counter).checked = true;
    counter++;
    if (counter > 4){
        counter = 1;
    }
}, 5000);

function initMap(){
    var location = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Maps(document.getElementById('map'), {
        zoom: 4,
        center: location
    });
}

document.getElementById("myButton").onclick = function () {
    location.href = "indexHomepage.html";
};

function openForm() {
document.getElementById("myForm").style.display = "block";
}

function closeForm() {
document.getElementById("myForm").style.display = "none";
}


function openProfile() {
    var x = document.getElementById("profile-detail");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}