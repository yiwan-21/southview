// visitor pass form
function validate(val) {
    v1 = document.getElementById("vname");
    v2 = document.getElementById("nric");
    v3 = document.getElementById("vehicle");
    v4 = document.getElementById("mob");
    v5 = document.getElementById("date");
    v6 = document.getElementById("stime");
    v7 = document.getElementById("etime");
    
    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;
    flag6 = true;
    flag7 = true;
    
    if(val>=1 || val==0) {
    if(v1.value == "") {
    v1.style.borderColor = "red";
    flag1 = false;
    }
    else {
    v1.style.borderColor = "green";
    flag1 = true;
    }
    }
    
    if(val>=2 || val==0) {
    if(v2.value == "") {
    v2.style.borderColor = "red";
    flag2 = false;
    }
    else {
    v2.style.borderColor = "green";
    flag2 = true;
    }
    }
    if(val>=3 || val==0) {
    if(v3.value == "") {
    v3.style.borderColor = "red";
    flag3 = false;
    }
    else {
    v3.style.borderColor = "green";
    flag3 = true;
    }
    }
    if(val>=4 || val==0) {
    if(v4.value == "") {
    v4.style.borderColor = "red";
    flag4 = false;
    }
    else {
    v4.style.borderColor = "green";
    flag4 = true;
    }
    }
    if(val>=5 || val==0) {
    if(v5.value == "") {
    v5.style.borderColor = "red";
    flag5 = false;
    }
    else {
    v5.style.borderColor = "green";
    flag5 = true;
    }
    }
    if(val>=6 || val==0) {
    if(v6.value == "") {
    v6.style.borderColor = "red";
    flag6 = false;
    }
    else {
    v6.style.borderColor = "green";
    flag6 = true;
    }
    }
    if(val>=7 || val==0) {
        if(v7.value == "") {
        v7.style.borderColor = "red";
        flag7 = false;
        }
        else {
        v7.style.borderColor = "green";
        flag7 = true;
        }
        }
    
    flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7;
    
    return flag;
    }

// button submit
function handleFormSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    formData.forEach((value, key) => {
        values.push(value)
        // console.log(key, value);
    });
    //  console.log(values);
    window.location.href="registerVisitorSuccess.html"
}

function view(){
    window.location.href="visitorpassGenerated.php"
}

function register(){
    window.location.href="visitorpassform.php"
}

//download pdf
document.querySelector(".btn-pdf").onclick = function () {
    var element = document.getElementById("downloadarea")
    var opt = {
      filename: 'visitor pass.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 3 },
      jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
    };

    html2pdf(element, opt);
  };
  
// Open Profile Icon && Open Chating Icon
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
