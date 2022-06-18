function openProfile() {
    const profile = document.querySelector('.profile');
    profile.classList.toggle('active');
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

fetch("/navigation/navigation.php")
    .then(response => response.text())
    .then(data => {
        document.body.appendChild(document.createElement('div')).classList.add('nav');
        const nav = document.querySelector('.nav');
        nav.innerHTML += data;
        const navbarTemplate = document.getElementById('navbar-template');
        const chatTemplate = document.getElementById('chat-template');
        const footerTemplate = document.getElementById('footer-template');
        const css = nav.querySelector('link');
        nav.innerHTML = '';
        nav.appendChild(navbarTemplate.content);
        document.body.appendChild(chatTemplate.content);
        document.body.appendChild(footerTemplate.content);
        document.head.appendChild(css);
    })
    .catch(err => console.warn('Something went wrong.', err));

function toggleMenu() {
    var menu = document.getElementById("menunav");
    if (menu.classList.contains("active")) {
        menu.classList.remove("active");
    } else {
        menu.classList.add("active");
    }
}



