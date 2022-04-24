function openProfile() {
    const profile = document.querySelector('.profile');
    if (profile.style.display === "none") {
        profile.style.display = "block";
    } else {
        profile.style.display = "none";
    }
}

fetch('/navigation/navigation.html')
.then(response => response.text())
.then(data => {
    document.body.innerHTML += data;
    const template = document.getElementById('navbar-template');
    document.body.appendChild(template.content);
})
.catch(err => console.warn('Something went wrong.', err));


