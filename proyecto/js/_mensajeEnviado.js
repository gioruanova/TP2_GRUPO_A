
const formSubmitElement = document.getElementById('mensajeEnviado');
if (formSubmitElement) {
    formSubmitElement.addEventListener('submit', function (e) {
        e.preventDefault();

        const formElement = e.currentTarget;

        if (!formElement) {
            console.error("Form element not found!");
            return;
        }

        Swal.fire({
            title: "Envio de mensaje",
            text: "¿Confirma que desea enviar el mensaje?",
            icon: "information",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Enviar",
            cancelButtonText: "Volver",
            background: "#2a5e85eb",
            color: "white",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Mensaje Enviado!",
                    text: "En breve nos estaremos comunicando con usted.",
                    icon: "success",
                    background: "#2a5e85eb",
                    color: "white",
                    willClose: () => {
                        formElement.submit();
                    }
                });
            }
        });
    });
}



