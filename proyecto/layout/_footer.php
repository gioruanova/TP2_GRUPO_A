<footer>
    <a class="navbar-brand" href="<?php echo BASE_URL ?>">
        <span><i class="bi bi-cpu color-change-effect"></i></span>
        <span class="brand-name">NextGen</span>
    </a>
    <div class="nav-footer">
        <a href="<?php echo BASE_URL ?>">Inicio</a>
        <span class="separator">|</span>
        <a href="<?php echo BASE_URL ?>empresa.php">La empresa</a>
        <span class="separator">|</span>
        <a href="<?php echo BASE_URL ?>contacto.php">Contacto</a>
        <span class="separator">|</span>

        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="<?php echo BASE_URL ?>admin_index.php">Mi cuenta</a>
        <?php else: ?>
            <a href="<?php echo BASE_URL ?>iniciar_sesion.php">Acceder</a>
        <?php endif ?>

    </div>
    <div class="copyright">
        <span>©NextGen Tech. 2023 Todos los derechos reservados</span>
        <span>Powered by <a href="https://github.com/gioruanova/TP2_GRUPO_A" target="_blank" title="Repositorio">Grupo
                A</a></span>
    </div>
</footer>