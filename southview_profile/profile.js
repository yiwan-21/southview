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
