window.onload = function () {
    document.querySelector("#btn-pdf")
        .addEventListener("click", () => {
            const content = this.document.getElementById("downloadarea");
            var opt = {
                bottom: 100,
                filename: 'Payment Receipt.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 3 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
            };
            html2pdf().from(content).set(opt).save();
        })
};


function submitPayment(event) {
    event.preventDefault();
    window.location.href = "/southview_payment/payment-success.html"
}; 

function getImage(imagename){
    var newing=imagename.replace(/^.*\\/,"");
    $('#display-image').html(newing);
}

