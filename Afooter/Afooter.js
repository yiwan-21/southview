fetch("/Afooter/Afooter.html")
    .then(response => response.text())
    .then(data => {
        document.body.appendChild(document.createElement('div')).classList.add('afooter');
        const afooter = document.querySelector('.afooter');
        afooter.innerHTML += data;
        const footerTemplate = document.getElementById('footer-template');
        const css = afooter.querySelector('link');
        afooter.innerHTML = '';
        afooter.appendChild(footerTemplate.content);
        document.head.appendChild(css);
    })
    .catch(err => console.warn('Something went wrong.', err));