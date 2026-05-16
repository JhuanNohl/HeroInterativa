<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jhuan Nohl | GitHub Profile</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <main class="hero" data-particle-hero>
            <canvas id="particle-canvas" aria-hidden="true"></canvas>

            <section class="hero-content" aria-label="Perfil de Jhuan Nohl">
                <nav class="hero-links" aria-label="Perfis sociais">
                    <a href="https://github.com/JhuanNohl" target="_blank" rel="noreferrer">GitHub</a>
                    <a href="https://www.linkedin.com/in/jhuan-nohl-9815a9210/" target="_blank" rel="noreferrer">LinkedIn</a>
                </nav>

                <p class="hero-kicker">Fullstack Developer</p>
                <h1>Jhuan Nohl</h1>
                <p class="hero-copy">
                    Transformando aprendizado em aplicações reais, escaláveis e bem estruturadas.</p>
                <div class="hero-actions" aria-label="Ações principais">
                    <a href="#github-stats">Ver estatísticas</a>
                    <a href="https://github.com/JhuanNohl?tab=repositories" target="_blank" rel="noreferrer">Repositórios</a>
                </div>
            </section>
        </main>

        <section class="profile-section" id="github-stats" data-github-profile="JhuanNohl">
            <div class="section-shell">
                <div class="section-heading">
                    <p>Perfil conectado</p>
                </div>

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
            </div>
        </section>
    </body>
</html>
