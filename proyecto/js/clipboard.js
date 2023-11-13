// Funcion para copiar on click
function copyToClipboard(selector,selector2) {
    const copyText = document.getElementById(selector);
    copyText.select();
    const successCopyElement = document.getElementById(selector2);
    if (successCopyElement) {
        successCopyElement.classList.add("confirmation-blink");
        setTimeout(() => {
            successCopyElement.classList.remove("confirmation-blink");
        }, 1500);
    }
}

