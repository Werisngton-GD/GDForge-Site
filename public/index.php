<?php
declare(strict_types=1);

require dirname(__DIR__) . '/src/view.php';
header('Content-Type: text/html; charset=UTF-8');
header("Content-Security-Policy: default-src 'none'; style-src 'self'; script-src 'self'; img-src 'self'; base-uri 'none'; frame-ancestors 'none'; form-action 'none'");
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
header('X-Frame-Options: DENY');

$projects = require dirname(__DIR__) . '/src/projects.php';
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$pages = [
    '/' => ['Início', 'GDForge | Jogos indie, protótipos e game design', 'Laboratório independente de desenvolvimento de jogos. Explore protótipos arcade, metroidvania e estudos de game feel da GDForge.'],
    '/sobre' => ['Sobre a Forja', 'Sobre a Forja | GDForge', 'Conheça o laboratório GDForge: desenvolvimento solo, game design e experimentação de mecânicas e controles.'],
    '/projetos' => ['Protótipos', 'Protótipos de jogos indie | GDForge', 'Conheça Pongobo Arena, Root: Echoes of Shadows e Mimimiau, os protótipos apresentados pela GDForge.'],
    '/devlog' => ['Devlog', 'Devlog de desenvolvimento de jogos | GDForge', 'Conheça os temas de estudo do laboratório GDForge: controles, mecânicas e game feel.'],
    '/contato' => ['Contato', 'Contato e redes sociais | GDForge', 'Acompanhe a GDForge no Instagram e no TikTok e conheça seus protótipos no itch.io.'],
];
$project = null;
foreach ($projects as $candidate) {
    if ($path === '/projetos/' . $candidate['slug']) {
        $project = $candidate;
        $pages[$path] = [$candidate['name'], $candidate['name'] . ' | GDForge', $candidate['description']];
        break;
    }
}
$found = is_string($path) && isset($pages[$path]);
if (!$found) {
    http_response_code(404);
    header('X-Robots-Tag: noindex');
}
[$label, $title, $description] = $found ? $pages[$path] : ['Página não encontrada', 'Página não encontrada | GDForge', 'O endereço solicitado não foi encontrado.'];
render('page', compact('path', 'projects', 'project', 'found', 'label', 'title', 'description'));
