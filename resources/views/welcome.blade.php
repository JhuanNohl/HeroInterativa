<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Interactive Hero</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <main class="hero" data-particle-hero>
            <canvas id="particle-canvas" aria-hidden="true"></canvas>

            <section class="hero-content" aria-label="Demonstração interativa">
                <nav class="hero-links" aria-label="Perfis sociais">
                    <a href="https://github.com/JhuanNohl" target="_blank" rel="noreferrer">GitHub</a>
                    <a href="https://www.linkedin.com/in/jhuan-nohl-9815a9210/" target="_blank" rel="noreferrer">LinkedIn</a>
                </nav>

                <p class="hero-kicker">Mouse reactive field</p>
                <h1>Jhuan Nohl</h1>
                <p class="hero-copy">
                    Um modelo de partículas luminosas que acompanha o mouse e reage ao conteúdo.
                </p>
            </section>
        </main>
    </body>
</html>
