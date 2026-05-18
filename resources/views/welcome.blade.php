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
                    <p class="intro-kicker">Fullstack Developer</p>
                    <h1>Jhuan Nohl</h1>
                    <p class="intro-lead">
                        Transformando aprendizado em aplicações reais, escaláveis e bem estruturadas.
                    </p>
                    <p class="intro-copy">
                        Desenvolvo interfaces e fluxos backend com atenção a responsabilidades bem definidas,
                        camadas desacopladas e código legível para manutenção contínua.
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
                    <a href="https://www.linkedin.com/in/jhuan-nohl-9815a9210/" target="_blank" rel="noreferrer">LinkedIn</a>
                    <a href="https://github.com/JhuanNohl?tab=repositories" target="_blank" rel="noreferrer">Repositórios</a>
                </div>
            </header>

            <main class="portfolio-main">
                <section class="content-section" id="sobre" aria-labelledby="sobre-title">
                    <p class="section-label">Sobre</p>
                    <h2 id="sobre-title">Construção simples por fora, organizada por dentro.</h2>

                    <div class="prose-stack">
                        <p>
                            Minha base está em desenvolvimento fullstack com Laravel, PHP, JavaScript e bancos
                            relacionais. Gosto de transformar ideias em aplicações funcionais, entendendo o domínio,
                            separando responsabilidades e entregando uma experiência clara para quem usa.
                        </p>
                        <p>
                            Este portfólio mantém o perfil conectado ao GitHub e o fundo interativo como uma camada
                            viva da interface: discreta, reativa e alinhada ao que eu busco construir no código.
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
                            <span class="tech-badge tech-node">Node.js</span>
                            <span class="tech-badge tech-css">CSS</span>
                            <span class="tech-badge tech-bootstrap">Bootstrap</span>
                            <span class="tech-badge tech-html">HTML5</span>
                            <span class="tech-badge tech-git">Git</span>
                            <span class="tech-badge tech-github">GitHub</span>
                            <span class="tech-badge tech-postgres">PostgreSQL</span>
                            <span class="tech-badge tech-mysql">MySQL</span>
                            <span class="tech-badge tech-sqlite">SQLite</span>
                            <span class="tech-badge tech-linux">Linux</span>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="experiencia" aria-labelledby="experiencia-title">
                    <p class="section-label">Experiência</p>
                    <h2 id="experiencia-title">Foco em produto, manutenção e evolução contínua.</h2>

                    <div class="timeline-list">
                        <article class="timeline-item">
                            <span>2026</span>
                            <div>
                                <h3>Aplicações fullstack com Laravel</h3>
                                <p>
                                    Estruturação de projetos com rotas, views, assets via Vite e deploy preparado
                                    para ambientes serverless como a Vercel.
                                </p>
                                <ul class="tag-list" aria-label="Tecnologias usadas">
                                    <li>Laravel</li>
                                    <li>Blade</li>
                                    <li>Vite</li>
                                    <li>Vercel</li>
                                </ul>
                            </div>
                        </article>

                        <article class="timeline-item">
                            <span>Atual</span>
                            <div>
                                <h3>Interfaces conectadas a dados públicos</h3>
                                <p>
                                    Consumo da API do GitHub para compor métricas, linguagens mais utilizadas,
                                    avatar e dados públicos do perfil em tempo real.
                                </p>
                                <ul class="tag-list" aria-label="Tecnologias usadas">
                                    <li>JavaScript</li>
                                    <li>GitHub API</li>
                                    <li>CSS</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </section>

                <section class="content-section" id="projetos" aria-labelledby="projetos-title">
                    <p class="section-label">Projetos</p>
                    <h2 id="projetos-title">Pequenos sistemas com intenção clara.</h2>

                    <div class="project-list">
                        <article class="project-card">
                            <div>
                                <p>Projeto em destaque</p>
                                <h3>Hero Interativa</h3>
                            </div>
                            <p>
                                Portfólio responsivo com fundo reativo, integração com GitHub e deploy em Vercel,
                                construído sobre Laravel, Blade e Vite.
                            </p>
                            <ul class="tag-list" aria-label="Tecnologias usadas">
                                <li>Laravel</li>
                                <li>JavaScript</li>
                                <li>Canvas</li>
                                <li>Vercel</li>
                            </ul>
                            <a href="https://github.com/JhuanNohl?tab=repositories" target="_blank" rel="noreferrer">Ver repositórios</a>
                        </article>

                        <article class="project-card">
                            <div>
                                <p>Em evolução</p>
                                <h3>Perfil GitHub conectado</h3>
                            </div>
                            <p>
                                Uma vitrine dinâmica que traduz atividade pública do GitHub em indicadores simples,
                                ajudando a mostrar stack, consistência e evolução.
                            </p>
                            <ul class="tag-list" aria-label="Tecnologias usadas">
                                <li>API REST</li>
                                <li>Fetch</li>
                                <li>UI</li>
                            </ul>
                            <a href="#github-stats">Ver métricas</a>
                        </article>
                    </div>
                </section>

                <section class="content-section profile-section" id="github-stats" data-github-profile="JhuanNohl" aria-labelledby="github-title">
                    <p class="section-label">Perfil conectado</p>
                    <h2 id="github-title">Dados públicos, contexto real.</h2>

                    <div class="github-showcase">
                        <article class="profile-card" aria-label="Resumo do perfil GitHub">
                            <div class="profile-card__avatar" data-profile-avatar>JN</div>
                            <div>
                                <p class="profile-card__eyebrow">github.com/JhuanNohl</p>
                                <h3 data-profile-name>Jhuan Nohl</h3>
                                <p data-profile-bio>Construindo aplicações com responsabilidades bem definidas, camadas desacopladas e código legível para manutenção contínua.</p>
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
                            <img
                                src="https://ghchart.rshah.org/4fc3f7/JhuanNohl"
                                alt="Gráfico anual de contribuições de JhuanNohl no GitHub"
                                loading="lazy"
                            >
                        </article>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
