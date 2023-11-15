
document.addEventListener('DOMContentLoaded', function () {
    let body = document.body;

    window.addEventListener('scroll', function () {
        let scrollPosition = window.scrollY || window.pageYOffset;


        if (scrollPosition > 0) {
            body.classList.add('scrollEffect');
            console.log('scrollEffect');
        } else {
            body.classList.remove('scrollEffect');
            console.log('no');
        }

    })

});

