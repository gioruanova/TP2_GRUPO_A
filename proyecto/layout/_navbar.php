<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="index.php">
            <span><i class="bi bi-cpu"></i></span>
            <span>NextGen Tech</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="empresa.php">La empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle disabled" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Acceso
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" title="Proximamente!!!">Iniciar Sesion</a></li>
                            <li><a class="dropdown-item" href="#" title="Proximamente!!!">Registrarse</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <div class="redes">
                    <a href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>

        </div>
    </div>
</nav>