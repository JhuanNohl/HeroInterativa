const profile = document.querySelector('[data-github-profile]');

if (profile) {
    const username = profile.dataset.githubProfile;
    const stats = {
        repos: profile.querySelector('[data-stat="repos"]'),
        followers: profile.querySelector('[data-stat="followers"]'),
        stars: profile.querySelector('[data-stat="stars"]'),
        forks: profile.querySelector('[data-stat="forks"]'),
    };
    const name = profile.querySelector('[data-profile-name]');
    const bio = profile.querySelector('[data-profile-bio]');
    const avatar = profile.querySelector('[data-profile-avatar]');
    const repoCount = profile.querySelector('[data-repo-count]');
    const languageList = profile.querySelector('[data-language-list]');

    const fallbackLanguages = [
        ['PHP', 42],
        ['JavaScript', 34],
        ['CSS', 24],
    ];

    const number = new Intl.NumberFormat('pt-BR');

    const setStats = ({ publicRepos = 0, followers = 0, stars = 0, forks = 0 }) => {
        stats.repos.textContent = number.format(publicRepos);
        stats.followers.textContent = number.format(followers);
        stats.stars.textContent = number.format(stars);
        stats.forks.textContent = number.format(forks);
    };

    const renderLanguages = (languages) => {
        languageList.innerHTML = languages
            .map(([language, percent]) => `
                <div class="language-row">
                    <span>${language}</span>
                    <div><i style="width: ${percent}%"></i></div>
                    <strong>${percent}%</strong>
                </div>
            `)
            .join('');
    };

    const getLanguages = (repos) => {
        const totals = repos.reduce((all, repo) => {
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
            const repos = await reposResponse.json();
            const stars = repos.reduce((sum, repo) => sum + repo.stargazers_count, 0);
            const forks = repos.reduce((sum, repo) => sum + repo.forks_count, 0);

            name.textContent = user.name || username;
            avatar.innerHTML = `<img src="${user.avatar_url}" alt="Avatar de ${user.name || username}">`;
            repoCount.textContent = `${number.format(repos.length)} repos mapeados`;

            setStats({
                publicRepos: user.public_repos,
                followers: user.followers,
                stars,
                forks,
            });
            renderLanguages(getLanguages(repos));
        } catch {
            repoCount.textContent = 'Dados locais';
            setStats({
                publicRepos: 12,
                followers: 0,
                stars: 0,
                forks: 0,
            });
            renderLanguages(fallbackLanguages);
        }
    };

    loadProfile();
}
