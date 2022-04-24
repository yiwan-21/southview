var values=[];
function handleFormSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    formData.forEach((value, key) => {
        values.push(value)
        console.log(key, value);
    });
     console.log(values)
     window.location.href="profile1.html"
}

// var tag=document.querySelector("#name");
// tag.addEventListener('change', function(){
//     tag.innerHTML=values[0];
// })

function edit(){
var tag=document.querySelector('#edit')
.addEventListener('click', function(){
    const reader = new FileReader();
    reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
});
});
}
