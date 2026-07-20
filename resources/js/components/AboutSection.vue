<template>
    <section class="content-section" id="sobre" aria-labelledby="sobre-title">
        <p class="section-label">Sobre</p>
        <h2 id="sobre-title">Desenvolvedor Full Stack.</h2>

        <div class="prose-stack">
            <p>
                Sou desenvolvedor Full Stack com foco na
                construção de aplicações corporativas utilizando
                PHP, Laravel, Vue.js e bancos de dados relacionais.
            </p>
            <p>
                Atuo desde a criação das interfaces e componentes até a implementação de
                regras de negócio, autenticação, permissões, APIs, persistência de dados, testes e deploy.
            </p>
            <p>
                Em meus projetos, busco aplicar arquitetura MVC, componentização, validações centralizadas,
                separação de responsabilidades e código preparado para manutenção e evolução.
            </p>
            <p>
                Minha experiência anterior com infraestrutura complementa essa atuação,
                permitindo desenvolver soluções com maior atenção ao ambiente de
                produção, segurança, desempenho, estabilidade e resolução de problemas reais.
            </p>
        </div>

        <div class="toolkit-panel">
            <div class="panel-title">
                <div>
                    <h3>Tecnologias e Ferramentas</h3>
                </div>
            </div>

            <div class="toolkit-groups">
                <div class="toolkit-group">
                    <div class="toolkit-group__header">
                        <span class="toolkit-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 6 3 12 9 18" />
                                <polyline points="15 6 21 12 15 18" />
                            </svg>
                        </span>
                        <h4>Backend</h4>
                    </div>
                    <div class="tech-grid" aria-label="Tecnologias de backend">
                        <span class="tech-badge tech-php">PHP</span>
                        <span class="tech-badge tech-laravel">Laravel</span>
                        <span class="tech-badge tech-api">APIs REST</span>
                    </div>
                </div>

                <div class="toolkit-group">
                    <div class="toolkit-group__header">
                        <span class="toolkit-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7" rx="1" />
                                <rect x="14" y="3" width="7" height="7" rx="1" />
                                <rect x="3" y="14" width="7" height="7" rx="1" />
                                <rect x="14" y="14" width="7" height="7" rx="1" />
                            </svg>
                        </span>
                        <h4>Frontend</h4>
                    </div>
                    <div class="tech-grid" aria-label="Tecnologias de frontend">
                        <span class="tech-badge tech-vue">Vue.js</span>
                        <span class="tech-badge tech-html">HTML5</span>
                        <span class="tech-badge tech-css">CSS</span>
                    </div>
                </div>

                <div class="toolkit-group">
                    <div class="toolkit-group__header">
                        <span class="toolkit-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <ellipse cx="12" cy="5" rx="8" ry="3" />
                                <path d="M4 5v6c0 1.66 3.58 3 8 3s8-1.34 8-3V5" />
                                <path d="M4 11v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6" />
                            </svg>
                        </span>
                        <h4>Dados e Infraestrutura</h4>
                    </div>
                    <div class="tech-grid" aria-label="Tecnologias de dados e infraestrutura">
                        <span class="tech-badge tech-postgres">PostgreSQL</span>
                        <span class="tech-badge tech-redis">Redis</span>
                        <span class="tech-badge tech-docker">Docker</span>
                    </div>
                </div>

                <div class="toolkit-group">
                    <div class="toolkit-group__header">
                        <span class="toolkit-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M14.7 6.3a4 4 0 1 0-5.4 5.4L4 17l3 3 5.3-5.3a4 4 0 0 0 5.4-5.4l-2 2-2.5-.5-.5-2.5 2-2z" />
                            </svg>
                        </span>
                        <h4>Qualidade e Ferramentas</h4>
                    </div>
                    <div class="tech-grid" aria-label="Ferramentas de qualidade">
                        <span class="tech-badge tech-vite">Vite</span>
                        <span class="tech-badge tech-mvc">Arquitetura MVC</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
