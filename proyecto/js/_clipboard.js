// Funcion para copiar on click
function copyToClipboard(inputId) {

    var inputElement = document.getElementById(inputId);

    inputElement.select();
    inputElement.setSelectionRange(0, 99999); 
    document.execCommand("copy");
    window.getSelection().removeAllRanges();

    Swal.fire({
        customClass: {
            container: 'copy-modal-alert'
        },
        position: "bottom-right",
        icon: "success",
        title: "Direcciones copiadas",
        showConfirmButton: false,
        timer: 1500,
        background: "#2a5e85eb",
        color: "white",
        showClass: {
            popup: `
          animate__animated
          animate__fadeInRight
          animate__faster
        `
        },
        hideClass: {
            popup: `
          animate__animated
          animate__fadeOutRight
          animate__faster
        `
        }
    });
    inputElement.select();
}

