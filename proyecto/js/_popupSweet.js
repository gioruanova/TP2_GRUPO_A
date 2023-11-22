async function showPopUp() {

  const valuePopUp = sessionStorage.getItem('popup');

  if (!valuePopUp || valuePopUp == "add") {
    sessionStorage.setItem('popup', 'add')
    Swal.fire({
      title: "Hot Sale!!!",
      text: "Aprovecha nuestros descuentos disponibles por tiempo limitado!!",
      imageUrl: "http://localhost:8080/TP2_GRUPO_A/proyecto/img/assets/hot-sale-img.jpg",
      imageWidth: 400,
      imageHeight: 300,
      imageAlt: "Hot Sale!!!",
      background: "#2a5e85eb",
      color: "white",
      confirmButtonText: "Seguir navegando",
    });
    sessionStorage.setItem('popup', 'remove')

  }
}





