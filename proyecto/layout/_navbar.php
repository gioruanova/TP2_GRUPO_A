<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="<?php echo BASE_URL ?>index.php">
            <span><i class="bi bi-cpu color-change-effect"></i></span>
            <span>NextGen</span>
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
                        <a class="nav-link" href="<?php echo BASE_URL ?>empresa.php">La empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL ?>contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Acceso
                        </a>
                        <ul class="dropdown-menu">

                            <?php if (isset($_SESSION['usuario'])): ?>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL ?>admin_index.php">Mi cuenta</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL ?>logout.php">Logout</a></li>
                            <?php else: ?>

                                <li><a class="dropdown-item" href="<?php echo BASE_URL ?>iniciar_sesion.php">Iniciar
                                        Sesion</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL ?>registrarse.php">Registrarse</a>
                                </li>
                            <?php endif ?>




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