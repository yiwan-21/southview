// menu button
var menu_btn = document.querySelector("#menu-btn");
      var sidebar = document.querySelector("#sidebar");
      var container = document.querySelector(".my-container");
      menu_btn?.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
});


// click validate icon 
// const validate = document.querySelectorAll(".validateicon");
// validate.forEach(element => {
//     element.addEventListener('click', ()=>{
//     // alert("Validated!");
//     element.style.opacity = 1;
//     })
// })


//select all
function selects(){  
    var ele=document.getElementsByName('chk');  
    for(var i=0; i<ele.length; i++){  
        if(ele[i].type=='checkbox')  
            ele[i].checked=true;  
    }  
}  

//deselect all
// function deSelect(){  
//     var ele=document.getElementsByName('chk');  
//     for(var i=0; i<ele.length; i++){  
//         if(ele[i].type=='checkbox')  
//             ele[i].checked=false;  
          
//     }  
// }   

// datatable (Sign Up Request List)
$(document).ready(function() {
    $('#example-signuprequest').DataTable( {
        columnDefs: [ {
            "targets": [0,3,5],
            "orderable": false         
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );

// datatable (Covid-19 Reporting)
$(document).ready(function() {
    $('#example-Covid19').DataTable( {
        columnDefs: [ {
            "targets": [0,5,6],
            "orderable": false         
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );

// datatable (Resident List)
$(document).ready(function() {
    $('#example-viewlist').DataTable( {
        columnDefs: [ {
            "targets": [0,4],
            "orderable": false         
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );


//submit form
// var values=[];
// function handleFormSubmit(event) {
//     event.preventDefault();
//     const form = event.target;
//     const formData = new FormData(form);
//     formData.forEach((value, key) => {
//         values.push(value)
//         console.log(key, value);
//     });
//      console.log(values)
//      alert("Register/Update Successfully!");
// }

//logout
function Alert() {
    var answer = confirm ("Click on OK to log out!")
    if (answer)
    window.location.href= "/login/login.html" ;
}











