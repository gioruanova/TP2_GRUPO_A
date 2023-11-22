const btn_actualizar = document.querySelectorAll('.btn-actualizarRegistro');
btn_actualizar.forEach((item) => {

    item.addEventListener('click', (e) => {

        e.preventDefault();

        Swal.fire({
            title: "¿Esta seguro de querer actualizar este registro?",
            text: "(esta opcion no se puede deshacer)",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Actualizar",
            cancelButtonText: "No, Cancelar",
            background: "#2a5e85eb",
            color: "white",
        }).then((result) => {
            if (result.isConfirmed) {
                let timerInterval;
                Swal.fire({
                    title: "Procesando pedido",
                    text: "Aguarde por favor",
                    background: "#2a5e85eb",
                    color: "white",
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        timerInterval = setInterval(() => {
                            location.href = item.href;
                        }, 800);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                    }
                });
            }
        });
    });
});