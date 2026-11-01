<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= escape($title) ?></title>
<meta name="description" content="<?= escape($description) ?>">
<meta name="robots" content="<?= $found ? 'index, follow, max-image-preview:large' : 'noindex, follow' ?>">
<?php if ($found): ?><link rel="canonical" href="https://gdforge.com.br<?= escape($path === '/' ? '/' : $path) ?>"><?php endif; ?>
<meta property="og:type" content="website">
<meta property="og:locale" content="pt_BR">
<meta property="og:site_name" content="GDForge">
<meta property="og:title" content="<?= escape($title) ?>">
<meta property="og:description" content="<?= escape($description) ?>">
<?php if ($found): ?><meta property="og:url" content="https://gdforge.com.br<?= escape($path) ?>"><?php endif; ?>
<meta name="twitter:card" content="summary">
<link rel="icon" href="/assets/forge.svg" type="image/svg+xml">
<link rel="stylesheet" href="/assets/site.css">
<script src="/assets/site.js" defer></script>
</head>
<body>
<a class="skip" href="#conteudo">Pular para o conteúdo</a>
<header class="header"><a class="brand" href="/" aria-label="GDForge — início"><img src="/assets/forge.svg" width="34" height="40" alt="">GD<span>FORGE</span><span class="brand-dot">®</span></a><button class="menu-toggle" type="button" aria-expanded="false" aria-controls="navigation" hidden>Menu</button><nav id="navigation" aria-label="Principal"><ul><?php foreach (['/sobre' => 'A forja', '/projetos' => 'Protótipos', '/devlog' => 'Devlog', '/contato' => 'Contato'] as $url => $name): ?><li><a href="<?= $url ?>" <?= $path === $url ? 'aria-current="page"' : '' ?>><?= $name ?></a></li><?php endforeach; ?></ul></nav><span class="header-note">INDEPENDENTE. EXPERIMENTAL.</span></header>
<main id="conteudo">
<?php if (!$found): ?>
<section class="container page-intro"><p class="eyebrow">ERRO 404</p><h1>Essa trilha ainda<br>não foi <em>forjada.</em></h1><p>Não encontramos a página que você procura.</p><a class="button" href="/">Voltar ao início ↗</a></section>
<?php elseif ($project !== null): ?>
<section class="container page-intro"><a class="text-link" href="/projetos">← Todos os protótipos</a><p class="eyebrow"><?= escape($project['genre']) ?></p><h1><?= escape($project['name']) ?></h1><p><?= escape($project['description']) ?></p><a class="button" href="<?= escape($project['url']) ?>">Conhecer no itch.io ↗</a><p class="small">Você será direcionado à página do jogo no itch.io.</p></section>
<?php else: ?>
<?php if ($path === '/'): ?>
<section class="hero container" id="home"><div class="hero-copy"><p class="eyebrow"><span class="status"></span> LABORATÓRIO INDEPENDENTE DE JOGOS</p><h1>Boas ideias.<br>Muito teste.<br><em>Game feel.</em></h1><p class="hero-description">Aqui, cada mecânica passa pela forja. Um laboratório de jogos indie, protótipos e novas formas de jogar.</p><div class="actions"><a class="button" href="#projetos">Explorar protótipos <span>↗</span></a><a class="text-link" href="/sobre">Conheça a forja →</a></div><p class="hero-caption">FORGING GAMES & TECHNIQUES <span>— GD FORGE</span></p></div><div class="hero-art" aria-hidden="true"><div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><span class="art-coordinate">EXPERIMENT / 001</span><img src="/assets/forge.svg" width="260" height="310" alt=""><span class="art-label">IDEIA → MECÂNICA → EXPERIÊNCIA</span></div></section>
<div class="ticker" aria-label="Áreas de interesse"><span>GAME DESIGN</span><span>✳</span><span>ARCADE & ROGUELITES</span><span>✳</span><span>METROIDVANIA</span><span>✳</span><span>TOWER DEFENSE</span></div>
<?php endif; ?>
<?php if ($path === '/' || $path === '/projetos'): ?>
<section class="container section" id="projetos"><div class="section-heading"><div><p class="eyebrow">01 / EXPERIMENTOS JOGÁVEIS</p><<?= $path === '/' ? 'h2' : 'h1' ?>>Protótipos <em>forjados.</em></<?= $path === '/' ? 'h2' : 'h1' ?>></div><p>Mecânicas em primeiro lugar.<br>Descubra o que saiu do laboratório.</p></div><div class="projects"><?php foreach ($projects as $item): ?><article class="project"><a class="project-art art-<?= escape($item['slug']) ?>" href="/projetos/<?= escape($item['slug']) ?>" aria-label="Conhecer <?= escape($item['name']) ?>"><span class="project-index">EXPERIMENTO / <?= $item['symbol'] ?></span><span class="game-visual" aria-hidden="true"></span><span class="project-art-title"><?= escape($item['name']) ?></span><span class="art-note">ESTUDO VISUAL · GD FORGE</span></a><div class="project-meta"><span><?= escape($item['genre']) ?></span><span>↗</span></div><h3><a href="/projetos/<?= escape($item['slug']) ?>"><?= escape($item['name']) ?></a></h3><p><?= escape($item['description']) ?></p></article><?php endforeach; ?></div></section>
<?php endif; ?>
<?php if ($path === '/' || $path === '/sobre'): ?>
<section class="container section about" id="sobre"><div><p class="eyebrow">02 / SOBRE A FORJA</p><<?= $path === '/' ? 'h2' : 'h1' ?>>A diversão está<br>nos <em>detalhes.</em></<?= $path === '/' ? 'h2' : 'h1' ?>></div><div><p class="lead">Dev solo. Game designer apaixonado. Sempre aprendendo.</p><p>A GDForge é meu laboratório de criação. Meu foco é experimentar, martelar o código e encontrar controles fluidos, mecânicas envolventes e aquela sensação boa de jogar.</p><p>Exploro gêneros clássicos com uma pegada moderna: arcade, roguelites, metroidvania e tower defense.</p><span class="outline-label">DA IDEIA AO PRÓXIMO PROTÓTIPO</span></div></section>
<?php endif; ?>
<?php if ($path === '/' || $path === '/devlog'): ?>
<section class="container section page-intro" id="devlog"><p class="eyebrow">03 / DIÁRIO DO LABORATÓRIO</p><<?= $path === '/' ? 'h2' : 'h1' ?>>Por dentro<br>da <em>forja.</em></<?= $path === '/' ? 'h2' : 'h1' ?>><p>Controles, mecânicas e game feel são os temas que orientam os estudos da GDForge.</p><div class="empty-state"><h2>Os próximos registros começam aqui.</h2><p>Ainda não há artigos publicados neste projeto. Enquanto isso, explore os protótipos e acompanhe os bastidores nas redes sociais.</p><a class="text-link" href="/projetos">Explorar protótipos →</a></div></section>
<?php endif; ?>
<?php if ($path === '/' || $path === '/contato'): ?>
<section class="container section contact" id="contato"><p class="eyebrow"><?= $path === '/' ? '03' : '04' ?> / SIGA A FORJA</p><<?= $path === '/' ? 'h2' : 'h1' ?>>A próxima ideia<br>já está <em>no fogo.</em></<?= $path === '/' ? 'h2' : 'h1' ?>><p>Acompanhe os experimentos e os bastidores do desenvolvimento.</p><div class="actions"><a class="button" href="https://www.instagram.com/gdforge_oficial/">Instagram ↗</a><a class="text-link" href="https://www.tiktok.com/@gdforge">TikTok ↗</a></div></section>
<?php endif; ?>
<?php endif; ?>
</main>
<footer class="container footer"><a class="brand" href="/">GD<span>FORGE</span></a><p>© <?= date('Y') ?> GDForge · Forging Games & Techniques.</p><a href="https://www.ariceliomoura.com.br" rel="external">Desenvolvido por Aricelio Moura ↗</a></footer>
</body>
</html>
