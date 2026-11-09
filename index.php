<?php
declare(strict_types=1);

/**
 * GDForge - Fallback Front Controller
 * Encaminha a requisição para public/index.php caso o DocumentRoot da hospedagem
 * aponte para a raiz do repositório em vez da subpasta public/.
 */
require __DIR__ . '/public/index.php';
