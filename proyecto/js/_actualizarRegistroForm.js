const enviarContacto = document.getElementById('formSubmit');
if (enviarContacto) {

    enviarContacto.addEventListener('submit', function (e) {
        e.preventDefault();

        const formElement = e.currentTarget;

        if (!formElement) {
            console.error("Form element not found!");
            return;
        }

        Swal.fire({
            title: "¿Está seguro de querer actualizar este registro?",
            text: "(Esta opción no se puede deshacer)",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, Actualizar",
            cancelButtonText: "No, Cancelar",
            background: "#2a5e85eb",
            color: "white",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Procesando pedido",
                    text: "Aguarde por favor",
                    background: "#2a5e85eb",
                    color: "white",
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    willClose: () => {
                        formElement.submit();
                    }
                });
            }
        });
    });

}
