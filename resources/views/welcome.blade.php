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
                <p class="hero-kicker">Mouse reactive field</p>
                <h1>Interactive Hero</h1>
                <p class="hero-copy">
                    Um campo de partículas com gravidade elástica.
                </p>
            </section>
        </main>
    </body>
</html>
