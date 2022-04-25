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

fetch(`${window.location.origin}/navigation/navigation.html`)
    .then(response => response.text())
    .then(data => {
        document.body.appendChild(document.createElement('div')).classList.add('nav');
        const nav = document.querySelector('.nav');
        nav.style.position = "fixed";
        nav.style.top = "0";
        nav.innerHTML += data;
        const navbarTemplate = document.getElementById('navbar-template');
        const chatTemplate = document.getElementById('chat-template');
        const footerTemplate = document.getElementById('footer-template');
        const css = nav.querySelector('link');
        css.href = `${window.location.origin}/navigation/navigation.css`;
        nav.innerHTML = '';
        nav.appendChild(navbarTemplate.content);
        document.body.appendChild(chatTemplate.content);
        document.body.appendChild(footerTemplate.content);
        document.head.appendChild(css);
    })
    .catch(err => console.warn('Something went wrong.', err));