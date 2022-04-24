document.querySelector(".btn-pdf").onclick = function () {
    var element = document.getElementById("downloadarea")
    var opt = {
      filename: 'payment receipt.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 3 },
      jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
    };

    html2pdf(element, opt);
  };