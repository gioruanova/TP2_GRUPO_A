<?php

function paginacion($lista, $pagina_actual, $cantidad_por_pagina)
{

    $desde = ($pagina_actual - 1) * $cantidad_por_pagina;

    return array_splice($lista, $desde, $cantidad_por_pagina);

}

function paginador_enlaces($cantidad, $pagina_actual, $cantidad_por_pagina)
{

    $cantidad_paginas = ceil($cantidad / $cantidad_por_pagina);

    $resultado = array(
        'cantidad' => $cantidad_paginas,
        'actual' => $pagina_actual,
        'anterior' => ($pagina_actual > 1) ? ($pagina_actual - 1) : null,
        'siguiente' => ($pagina_actual < $cantidad_paginas) ? ($pagina_actual + 1) : null,
        'primero' => ($pagina_actual > 1) ? 1 : null,
        'ultimo' => ($pagina_actual < $cantidad_paginas) ? $cantidad_paginas : null
    );

    return $resultado;

}

?>