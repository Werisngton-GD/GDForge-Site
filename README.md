# GDForge-Site

Implementação local em PHP 8.3+ sem framework, WordPress ou dependências de terceiros. Não houve publicação nem alteração em produção.

## Executar

Instale uma versão PHP ainda suportada. Na raiz do projeto:

    php -S 127.0.0.1:8080 -t public router.php

Abra http://127.0.0.1:8080. O servidor embutido é somente para desenvolvimento.

Em Apache, configure DocumentRoot para a pasta public, habilite mod_rewrite e permita as diretivas do .htaccess. Em Nginx, use try_files $uri $uri/ /index.php?$query_string e configure PHP-FPM restringindo execução ao front controller. src e templates devem permanecer fora da raiz pública. Ative HTTPS em produção; configure HSTS somente depois de verificar HTTPS e subdomínios.

## Estrutura

- public/index.php: rotas explícitas, status HTTP e cabeçalhos.
- src/projects.php: catálogo dos três protótipos fornecidos.
- src/view.php: renderização e escape de saída.
- templates/page.php: HTML semântico renderizado no servidor.
- public/assets: CSS, JavaScript e símbolo SVG autoral criado para esta implementação.

URLs: /, /sobre, /projetos, /devlog, /contato e /projetos/{slug}. Endereços desconhecidos retornam 404; parâmetros não selecionam arquivos ou templates. As âncoras originais /#home, /#sobre, /#projetos , /#devlog e /#contato continuam disponíveis. O devlog informa a ausência de publicações; a galeria remota não foi importada.

## Conteúdo e recursos

Texto e links foram adaptados do html.txt fornecido. Não foram importados comentários ou scripts como instruções do projeto. Fontes do sistema e ilustrações próprias evitam CDNs e dependências. As capas são estudos visuais identificados, não capturas dos jogos. Logo e imagens originais não foram copiados porque não foram fornecidos localmente com confirmação de licença; substituir por arquivos autorizados quando disponíveis. Não foram inventados artigos, avaliações ou resultados.

## SEO e acessibilidade

Títulos e descrições por página, canonical, Open Graph, sitemap.xml, robots.txt e llms.txt. O domínio de referência é https://gdforge.com.br: revise antes de usar outro domínio. llms.txt é informativo e não garante suporte de bots. Indexação depende dos motores e não pode ser garantida. Conteúdo disponível sem JavaScript, link para pular ao conteúdo, navegação por teclado, menu com estado anunciado, foco visível e respeito a movimento reduzido.

## Segurança e verificações

Sem autenticação, banco, formulários ou credenciais. Escape de HTML, rotas permitidas, CSP sem scripts inline, bloqueio de enquadramento e de detecção de MIME. Recursos executáveis vêm apenas da própria origem. Não conceda acesso HTTP à raiz do repositório.

Verificações locais sugeridas após instalar PHP:

    php -l public/index.php
    php -l src/view.php
    php -l src/projects.php
    php -l templates/page.php
    php -l router.php
    node --check public/assets/site.js

Validação realizada: todos os arquivos PHP passaram em `php -l`, o JavaScript passou em `node --check`, as oito URLs do sitemap responderam HTTP 200 e uma URL inexistente retornou 404. Sitemap e SVG passaram na leitura XML. Testes visuais, teclado, zoom e navegação sem JavaScript ainda devem ser realizados.

Há um PHP portátil local em `.runtime/php/php.exe`, ignorado pelo Git. Para executar com ele no PowerShell:

    & '.\.runtime\php\php.exe' -S 127.0.0.1:8081 -t public router.php

## Envio de alterações

Repositório: https://github.com/Werisngton-GD/GDForge-Site.git

Novos envios ao remoto exigem autorização explícita do usuário para cada envio. Alterações locais não autorizam automaticamente `git push` nem publicação em produção.
