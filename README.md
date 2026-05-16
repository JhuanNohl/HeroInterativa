# Interactive Hero

Uma landing page pessoal desenvolvida com Laravel, Vite, Tailwind CSS 4 e JavaScript puro. O projeto apresenta um hero interativo com canvas de particulas, links sociais e uma secao conectada ao GitHub para exibir dados publicos do perfil.

## Preview

A pagina inicial destaca o perfil de Jhuan Nohl com:

- animacao de particulas responsiva no fundo;
- interacao visual pelo movimento do ponteiro;
- links para GitHub e LinkedIn;
- estatisticas publicas do GitHub carregadas pela API;
- lista de tecnologias e ferramentas;
- resumo das linguagens mais usadas nos repositorios;
- grafico anual de contribuicoes.

## Tecnologias

- PHP 8.3
- Laravel 13
- Vite 8
- Tailwind CSS 4
- JavaScript
- Blade
- CSS moderno com canvas e layout responsivo

## Requisitos

Antes de rodar o projeto, tenha instalado:

- PHP 8.3 ou superior
- Composer
- Node.js
- npm

## Como Rodar Localmente

Clone o repositorio:

```bash
git clone https://github.com/JhuanNohl/interactive-hero.git
cd interactive-hero
```

Instale as dependencias do PHP:

```bash
composer install
```

Instale as dependencias do Node:

```bash
npm install
```

Crie o arquivo de ambiente:

```bash
cp .env.example .env
```

Gere a chave da aplicacao:

```bash
php artisan key:generate
```

Inicie o servidor Laravel:

```bash
php artisan serve
```

Em outro terminal, inicie o Vite:

```bash
npm run dev
```

Acesse:

```text
http://localhost:8000
```

## Scripts Disponiveis

Rodar o ambiente de desenvolvimento do frontend:

```bash
npm run dev
```

Gerar build de producao:

```bash
npm run build
```

Rodar os testes do Laravel:

```bash
composer test
```

Rodar todos os processos de desenvolvimento configurados no Composer:

```bash
composer dev
```

## Estrutura Principal

```text
resources/
  css/
    app.css
  js/
    app.js
    effects/
      github-profile.js
      particles.js
  views/
    welcome.blade.php
routes/
  web.php
vite.config.js
```

## Integracao Com GitHub

O arquivo `resources/js/effects/github-profile.js` consulta a API publica do GitHub usando o usuario configurado no atributo `data-github-profile` da secao principal:

```html
<section data-github-profile="JhuanNohl">
```

Com isso, a pagina carrega automaticamente:

- nome e avatar do perfil;
- quantidade de repositorios publicos;
- seguidores;
- total de estrelas;
- total de forks;
- linguagens mais frequentes nos repositorios.

Caso a API esteja indisponivel, o projeto exibe dados locais de fallback.

## Personalizacao

Para adaptar o projeto para outro perfil, edite:

- `resources/views/welcome.blade.php` para alterar textos, links e usuario do GitHub;
- `resources/css/app.css` para ajustar layout, cores e responsividade;
- `resources/js/effects/particles.js` para alterar a animacao do canvas;
- `resources/js/effects/github-profile.js` para mudar a logica das estatisticas.

## Build

Para gerar os arquivos otimizados em `public/build`, execute:

```bash
npm run build
```

## Licenca

Este projeto esta disponivel sob a licenca MIT.
