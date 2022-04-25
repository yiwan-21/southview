// menu button
var menu_btn = document.querySelector("#menu-btn");
      var sidebar = document.querySelector("#sidebar");
      var container = document.querySelector(".my-container");
      menu_btn?.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
});


// click validate icon 
const validate = document.querySelectorAll(".validateicon");
validate.forEach(element => {
    element.addEventListener('click', ()=>{
    alert("Validated!");
    element.style.opacity = 1;
    })
})


//select all
function selects(){  
    var ele=document.getElementsByName('chk');  
    for(var i=0; i<ele.length; i++){  
        if(ele[i].type=='checkbox')  
            ele[i].checked=true;  
    }  
}  

//deselect all
function deSelect(){  
    var ele=document.getElementsByName('chk');  
    for(var i=0; i<ele.length; i++){  
        if(ele[i].type=='checkbox')  
            ele[i].checked=false;  
          
    }  
}   

//pagination and search
$(document).ready(function() {
    $('#example').DataTable();
} );

//submit form
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
     alert("Register/Update Successfully!");
}


// click logout button
const logout = document.querySelectorAll(".logoutbtn");
logout.forEach(element => {
    element.addEventListener('click', ()=>{
    alert("Logout Successfully!");    
    })
})






