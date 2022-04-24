window.onload=function(){
    document.querySelector(".btn-pdf")
    .addEventListener("click",()=>{
        const receipt = this.document.getElementById("downloadarea");
        console.log(receipt)
        // html2pdf().from(receipt).save();
    })
}