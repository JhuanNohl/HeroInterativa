<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jhuan Nohl | Fullstack Developer</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <canvas id="particle-canvas" aria-hidden="true"></canvas>

    <div class="portfolio-shell" data-particle-hero>
        <header class="portfolio-rail" aria-label="Apresentação de Jhuan Nohl">
            <div class="intro-block">
                <p class="intro-kicker">Full Stack Developer</p>
                <h1>Jhuan Nohl</h1>
                <p class="intro-copy">
                    Belo Horizonte | MG
                </p>
            </div>

            <nav class="section-nav" aria-label="Navegação principal">
                <a href="#sobre"><span></span>Sobre</a>
                <a href="#experiencia"><span></span>Experiência</a>
                <a href="#projetos"><span></span>Projetos</a>
                <a href="#github-stats"><span></span>GitHub</a>
            </nav>

            <div class="social-links" aria-label="Perfis sociais">
                <a href="https://github.com/JhuanNohl" target="_blank" rel="noreferrer">GitHub</a>
                <a href="https://www.linkedin.com/in/jhuan-nohl-9815a9210/" target="_blank"
                    rel="noreferrer">LinkedIn</a>
                <a href="https://github.com/JhuanNohl?tab=repositories" target="_blank"
                    rel="noreferrer">Repositórios</a>
            </div>
        </header>

        <main class="portfolio-main">
            <section class="content-section" id="sobre" aria-labelledby="sobre-title">
                <p class="section-label">Sobre</p>
                <h2 id="sobre-title">Desenvolvedor Full Stack.</h2>

                <div class="prose-stack">
                    <p>
                        Sou desenvolvedor Full Stack com foco na criação de aplicações modernas,
                        organizadas e sustentáveis. Trabalho com PHP, Laravel, JavaScript, Blade,
                        Tailwind CSS e bancos relacionais, desenvolvendo soluções que conectam
                        interface, regras de negócio, autenticação, APIs e persistência de dados.
                    </p>
                    <p>
                        Busco constatemente aplicar boas práticas de desenvolvimento, como Clean Code, arquitetura MVC,
                        validações centralizadas, componentização, separação de camadas e código desacoplado.
                        Meu objetivo é construir sistemas claros, seguros e fáceis de manter, reduzindo
                        complexidade e facilitando a evolução contínua do produto.
                    </p>
                    <p>
                        Minha experiência com infraestrutura complementa minha visão técnica, permitindo
                        pensar em aplicações com maior atenção a ambiente, performance, estabilidade,
                        organização e resolução de problemas em cenários reais.
                    </p>
                </div>

                <div class="toolkit-panel">
                    <div class="panel-title">
                        <h3>Tecnologias e Ferramentas</h3>
                    </div>

                    <div class="tech-grid" aria-label="Tecnologias e ferramentas">
                        <span class="tech-badge tech-php">PHP</span>
                        <span class="tech-badge tech-laravel">Laravel</span>
                        <span class="tech-badge tech-js">JavaScript</span>
                        <span class="tech-badge tech-vite">Vite</span>
                        <span class="tech-badge tech-php">Blade</span>
                        <span class="tech-badge tech-css">CSS</span>
                        <span class="tech-badge tech-bootstrap">Bootstrap</span>
                        <span class="tech-badge tech-html">HTML5</span>
                        <span class="tech-badge tech-git">Git</span>
                        <span class="tech-badge tech-github">GitHub</span>
                        <span class="tech-badge tech-postgres">PostgreSQL</span>
                        <span class="tech-badge tech-linux">Linux</span>
                    </div>
                </div>
            </section>

            <section class="content-section" id="experiencia" aria-labelledby="experiencia-title">
                <p class="section-label">Experiência</p>
                <h2 id="experiencia-title">Trajetória Técnica.</h2>

                <div class="timeline-list">
                    <article class="timeline-item">
                        <span>Finalizado</span>
                        <div>
                            <h3>Aplicações Full Stack com Laravel</h3>
                            <p>
                                Desenvolvimento de aplicações com arquitetura MVC, organização de rotas,
                                views, controllers, assets com Vite e estrutura preparada para manutenção,
                                deploy e evolução contínua.
                            </p>
                            <ul class="tag-list" aria-label="Tecnologias usadas">
                                <li>PHP</li>
                                <li>Laravel</li>
                                <li>Blade</li>
                                <li>Vite</li>
                                <li>MVC</li>
                                <li>Vercel</li>
                            </ul>
                        </div>
                    </article>

                    <article class="timeline-item">
                        <span>Em Andamento</span>
                        <div>
                            <h3>Integração com APIs e dados dinâmicos</h3>
                            <p>
                                Consumo de APIs públicas para exibição de métricas, dados de perfil,
                                linguagens utilizadas e indicadores em tempo real, aplicando organização
                                de código, manipulação de dados e atualização dinâmica da interface.
                            </p>
                            <ul class="tag-list" aria-label="Tecnologias usadas">
                                <li>JavaScript</li>
                                <li>API REST</li>
                                <li>Fetch</li>
                                <li>UI dinâmica</li>
                            </ul>
                        </div>
                    </article>
                </div>
            </section>

            <section class="content-section" id="projetos" aria-labelledby="projetos-title">
                <p class="section-label">Projetos</p>
                <h2 id="projetos-title">1° Projeto.</h2>

                <div class="project-list">
                    <article class="project-card">
                        <div>
                            <p>Projeto Front-end</p>
                            <h3>UseNohl - E-commerce</h3>
                        </div>
                        <p>
                            UseNohl é uma experiência de e-commerce front-end para uma loja de roupas e acessórios,
                            criada com foco em navegação simples, identidade visual consistente e recursos
                            interativos que simulam uma jornada real de compra.
                            </br>
                            O projeto foi desenvolvido como primeiro projeto front-end após a conclusão
                            de estudos em HTML, CSS e JavaScript, reunindo catálogo de produtos,
                            carrinho, autenticação local, perfil de usuário e pré-checkout em uma aplicação estática..
                        </p>
                        <ul class="tag-list" aria-label="Tecnologias usadas">
                            <li>HTML5</li>
                            <li>CSS</li>
                            <li>Bootstrap</li>
                            <li>JavaScript</li>
                            <li>WebStorageAPI</li>
                        </ul>
                        <a href="https://github.com/JhuanNohl/UseNohl" target="_blank" rel="noreferrer">Ver
                            repositório</a>
                        <img src="https://res.cloudinary.com/dgztg4ry9/image/upload/v1779469478/UseNohl_mfohc2.gif"
                            alt="Descrição da imagem" />
                    </article>
                </div>

                <h2>2° Projeto.</h2>

                <div class="project-list">
                    <article class="project-card">
                        <div>
                            <p>Projeto FullStack</p>
                            <h3>ZKTeco - Intranet Corporativa</h3>
                        </div>
                        <p>
                            Sistema de intranet corporativa desenvolvido para centralizar comunicação interna,
                            documentos, treinamentos,
                            informações por setor e fluxos operacionais da ZKTeco Brasil.</br>
                            O projeto foi construído em Laravel, com foco em organização por departamentos, controle de
                            permissões
                            e uma experiência simples para uso diário pelos colaboradores.
                        </p>
                        <ul class="tag-list" aria-label="Tecnologias usadas">
                            <li>PHP 8.3+</li>
                            <li>Laravel 13</li>
                            <li>Blade</li>
                            <li>CSS</li>
                            <li>JavaScript</li>
                            <li>PostgreSQL</li>
                        </ul>
                        <a href="https://github.com/JhuanNohl" target="_blank" rel="noreferrer">Repositório Privado</a>
                        <img src="https://res.cloudinary.com/dgztg4ry9/image/upload/v1779469903/Intranet_upm8ut.gif"
                            alt="Descrição da imagem" />
                    </article>
                </div>

                <h2>3° Projeto.</h2>

                <div class="project-list">
                    <article class="project-card">
                        <div>
                            <p>Projeto FullStack</p>
                            <h3>Cliento - CRM</h3>
                        </div>
                        <p>
                            Aplicação de CRM enxuta criada com Laravel, Blade, Tailwind CSS e PostgreSQL.
                            O objetivo é demonstrar um fluxo comercial simples:</br>
                            Empresas, contatos, oportunidades, atividades e um dashboard autenticado.
                        </p>
                        <ul class="tag-list" aria-label="Tecnologias usadas">
                            <li>PHP 8.3+</li>
                            <li>Laravel 13</li>
                            <li>Blade</li>
                            <li>Tailwind CSS</li>
                            <li>Vite</li>
                        </ul>
                        <a href="https://github.com/JhuanNohl/Cliento" target="_blank" rel="noreferrer">Ver
                            repositório</a>
                        <img src="https://res.cloudinary.com/dgztg4ry9/image/upload/v1779475962/Cliento_ihavwv.gif"
                            alt="Descrição da imagem" />
                    </article>
                </div>
            </section>

            <section class="content-section profile-section" id="github-stats" data-github-profile="JhuanNohl"
                aria-labelledby="github-title">
                <p class="section-label">Perfil conectado</p>
                <h2 id="github-title">Indicadores.</h2>

                <div class="github-showcase">
                    <article class="profile-card" aria-label="Resumo do perfil GitHub">
                        <div class="profile-card__avatar" data-profile-avatar>JN</div>
                        <div>
                            <p class="profile-card__eyebrow">github.com/JhuanNohl</p>
                            <h3 data-profile-name>Jhuan Nohl</h3>
                        </div>
                    </article>

                    <div class="stats-grid" aria-label="Estatísticas públicas do GitHub">
                        <article class="stat-card">
                            <span>Repositórios</span>
                            <strong data-stat="repos">--</strong>
                        </article>
                        <article class="stat-card">
                            <span>Seguidores</span>
                            <strong data-stat="followers">--</strong>
                        </article>
                        <article class="stat-card">
                            <span>Estrelas</span>
                            <strong data-stat="stars">--</strong>
                        </article>
                        <article class="stat-card">
                            <span>Forks</span>
                            <strong data-stat="forks">--</strong>
                        </article>
                    </div>
                </div>

                <div class="insight-grid">
                    <article class="language-card">
                        <div class="panel-title">
                            <h3>Stacks mais utilizadas</h3>
                            <span data-repo-count>Carregando</span>
                        </div>
                        <div class="language-list" data-language-list>
                            <div class="language-row">
                                <span>PHP</span>
                                <div><i style="width: 42%"></i></div>
                                <strong>42%</strong>
                            </div>
                            <div class="language-row">
                                <span>JavaScript</span>
                                <div><i style="width: 34%"></i></div>
                                <strong>34%</strong>
                            </div>
                            <div class="language-row">
                                <span>CSS</span>
                                <div><i style="width: 24%"></i></div>
                                <strong>24%</strong>
                            </div>
                        </div>
                    </article>

                    <article class="activity-card">
                        <div class="panel-title">
                            <h3>Contribuições</h3>
                            <a href="https://github.com/JhuanNohl" target="_blank" rel="noreferrer">Abrir perfil</a>
                        </div>
                        <img src="https://ghchart.rshah.org/4fc3f7/JhuanNohl"
                            alt="Gráfico anual de contribuições de JhuanNohl no GitHub" loading="lazy">
                    </article>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
