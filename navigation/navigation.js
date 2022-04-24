function openProfile() {
    const profile = document.querySelector('.profile');
    profile.classList.toggle('active');
}

fetch('/navigation/navigation.html')
.then(response => response.text())
.then(data => {
    document.body.appendChild(document.createElement('div')).classList.add('nav');
    const nav = document.querySelector('.nav');
    nav.style.position = "fixed";
    nav.style.top = "0";
    nav.innerHTML += data;
    const template = document.getElementById('navbar-template');
    const css = nav.querySelector('link');
    nav.innerHTML = '';
    nav.appendChild(template.content);
    document.head.appendChild(css);
})
.catch(err => console.warn('Something went wrong.', err));