// Funcion para copiar on click
function copyToClipboard() {
    const copyText = document.getElementById("listado");
    copyText.select();
    const successCopyElement = document.getElementById("success-copy");
    if (successCopyElement) {
        successCopyElement.classList.add("confirmation-blink");
        setTimeout(() => {
            successCopyElement.classList.remove("confirmation-blink");
        }, 1500);
    }
}

