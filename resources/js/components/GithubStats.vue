<template>
    <section class="content-section profile-section" id="github-stats" data-github-profile="JhuanNohl"
        aria-labelledby="github-title">
        <p class="section-label">Perfil conectado</p>
        <h2 id="github-title">Indicadores.</h2>

        <div class="github-showcase">
            <article class="profile-card" aria-label="Resumo do perfil GitHub">
                <div class="profile-card__avatar" data-profile-avatar>
                    <img v-if="avatarUrl" :src="avatarUrl" :alt="`Avatar de ${displayName}`">
                    <template v-else>JN</template>
                </div>
                <div>
                    <p class="profile-card__eyebrow">github.com/JhuanNohl</p>
                    <h3 data-profile-name>{{ displayName }}</h3>
                </div>
            </article>

            <div class="stats-grid" aria-label="Estatísticas públicas do GitHub">
                <article class="stat-card">
                    <span>Repositórios</span>
                    <strong data-stat="repos">{{ repos }}</strong>
                </article>
                <article class="stat-card">
                    <span>Seguidores</span>
                    <strong data-stat="followers">{{ followers }}</strong>
                </article>
                <article class="stat-card">
                    <span>Estrelas</span>
                    <strong data-stat="stars">{{ stars }}</strong>
                </article>
                <article class="stat-card">
                    <span>Forks</span>
                    <strong data-stat="forks">{{ forks }}</strong>
                </article>
            </div>
        </div>

        <div class="insight-grid">
            <article class="language-card">
                <div class="panel-title">
                    <h3>Stacks mais utilizadas</h3>
                    <span data-repo-count>{{ repoCount }}</span>
                </div>
                <div class="language-list" data-language-list>
                    <div class="language-row" v-for="[language, percent] in languages" :key="language">
                        <span>{{ language }}</span>
                        <div><i :style="{ width: percent + '%' }"></i></div>
                        <strong>{{ percent }}%</strong>
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
</template>

<script setup>
import { onMounted, ref } from 'vue';

const username = 'JhuanNohl';

const fallbackLanguages = [
    ['PHP', 42],
    ['JavaScript', 34],
    ['CSS', 24],
];

const number = new Intl.NumberFormat('pt-BR');

const displayName = ref('Jhuan Nohl');
const avatarUrl = ref(null);
const repoCount = ref('Carregando');
const languages = ref(fallbackLanguages);
const repos = ref('--');
const followers = ref('--');
const stars = ref('--');
const forks = ref('--');

const setStats = ({ publicRepos = 0, followers: followersCount = 0, stars: starsCount = 0, forks: forksCount = 0 }) => {
    repos.value = number.format(publicRepos);
    followers.value = number.format(followersCount);
    stars.value = number.format(starsCount);
    forks.value = number.format(forksCount);
};

const getLanguages = (repositories) => {
    const totals = repositories.reduce((all, repo) => {
        if (!repo.language || repo.fork) {
            return all;
        }

        all[repo.language] = (all[repo.language] || 0) + 1;
        return all;
    }, {});
    const total = Object.values(totals).reduce((sum, value) => sum + value, 0);

    if (!total) {
        return fallbackLanguages;
    }

    return Object.entries(totals)
        .sort((a, b) => b[1] - a[1])
        .slice(0, 5)
        .map(([language, count]) => [language, Math.max(4, Math.round((count / total) * 100))]);
};

const loadProfile = async () => {
    try {
        const [userResponse, reposResponse] = await Promise.all([
            fetch(`https://api.github.com/users/${username}`),
            fetch(`https://api.github.com/users/${username}/repos?per_page=100&sort=updated`),
        ]);

        if (!userResponse.ok || !reposResponse.ok) {
            throw new Error('GitHub API unavailable');
        }

        const user = await userResponse.json();
        const repositories = await reposResponse.json();
        const starsTotal = repositories.reduce((sum, repo) => sum + repo.stargazers_count, 0);
        const forksTotal = repositories.reduce((sum, repo) => sum + repo.forks_count, 0);

        displayName.value = user.name || username;
        avatarUrl.value = user.avatar_url;
        repoCount.value = `${number.format(repositories.length)} repos mapeados`;

        setStats({
            publicRepos: user.public_repos,
            followers: user.followers,
            stars: starsTotal,
            forks: forksTotal,
        });
        languages.value = getLanguages(repositories);
    } catch {
        repoCount.value = 'Dados locais';
        setStats({
            publicRepos: 12,
            followers: 0,
            stars: 0,
            forks: 0,
        });
        languages.value = fallbackLanguages;
    }
};

onMounted(() => {
    loadProfile();
});
</script>
