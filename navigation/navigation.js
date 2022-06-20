function openProfile() {
  const profile = document.querySelector(".profile");
  profile.classList.toggle("active");
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

fetch("/navigation/navigation.php")
  .then((response) => response.text())
  .then((data) => {
    document.body
      .appendChild(document.createElement("div"))
      .classList.add("nav");
    const nav = document.querySelector(".nav");
    nav.innerHTML += data;
    const navbarTemplate = document.getElementById("navbar-template");
    const chatTemplate = document.getElementById("chat-template");
    const footerTemplate = document.getElementById("footer-template");
    // const chatPHP = document.getElementById("chat-php");
    // console.log(chatPHP)
    // const script = document.createElement("script");
    // Array.from(chatPHP.children).forEach((child) => {
    //   script.innerHTML += child.innerHTML + ";";
    // })
    // console.log(script.innerHTML);
    // document.body.appendChild(script);
    // const css = nav.querySelectorAll("link");
    nav.innerHTML = "";
    nav.appendChild(navbarTemplate);
    document.body.appendChild(chatTemplate);
    document.body.appendChild(footerTemplate);
    document.head.insertAdjacentHTML('beforeend', "<link rel='stylesheet' href='/navigation/navigation.css'>");
    document.head.insertAdjacentHTML('beforeend', "<script src='https://use.fontawesome.com/releases/v5.15.4/js/all.js' integrity='sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc' crossorigin='anonymous'></script>");
    document.head.insertAdjacentHTML('beforeend', '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>');
    // Array.from(css).forEach(e => document.head.appendChild(e));
    // document.head.appendChild(css);
  })
  .catch((err) => console.warn("Something went wrong.", err));

function toggleMenu() {
  var menu = document.getElementById("menunav");
  if (menu.classList.contains("active")) {
    menu.classList.remove("active");
  } else {
    menu.classList.add("active");
  }
}

//////////////////////////// NEW CHAT TEMPLATE //////////////////////////////////
setTimeout(() => {
  const form = document.querySelector(".typing-area"),
  resident_id = form.querySelector(".resident_id").value,
  inputField = form.querySelector(".input-field"),
  sendBtn = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");
  form.onsubmit = (e)=>{
      e.preventDefault();
  }
  inputField.focus();
  inputField.onkeyup = ()=>{
      if(inputField.value != ""){
          sendBtn.classList.add("active");
      }else{
          sendBtn.classList.remove("active");
      }
  }
  
  sendBtn.onclick = ()=>{
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "/navigation/php/insert-chat.php", true);
      xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                scrollToBottom();
            }
        }
      }
      let formData = new FormData(form);
      xhr.send(formData);
  }
  chatBox.onmouseenter = ()=>{
      chatBox.classList.add("active");
  }
  
  chatBox.onmouseleave = ()=>{
      chatBox.classList.remove("active");
  }
  setInterval(() =>{
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "/navigation/php/get-chat.php", true);
      xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
              let data = xhr.response;
              chatBox.innerHTML = data;
              if(!chatBox.classList.contains("active")){
                  scrollToBottom();
                }
            }
        }
      }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("resident_id="+resident_id);
  }, 500);
  function scrollToBottom(){
      chatBox.scrollTop = chatBox.scrollHeight;
    }
}, 300);






