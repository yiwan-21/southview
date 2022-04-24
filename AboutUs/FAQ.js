let li = document.querySelectorAll('.faq-txt li');
for (var i = 0; i < li.length; i++) {
    li[i].addEventListener('click', (e)=>{
        let clickedLi;
        if(e.target.classList.contains('question-arrow')){
            clickedLi = e.target.parentElement;
        }else{
            clickedLi = e.target.parentElement.parentElement;
        }
        clickedLi.classList.toggle('showAnswer');
    })
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
