<template>
    <ParticleCanvas />

    <div class="portfolio-shell" data-particle-hero>
        <PortfolioRail />

        <main class="portfolio-main">
            <AboutSection />
            <ProjectsSection />
            <ExperienceSection />
            <GithubStats />
        </main>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import ParticleCanvas from './ParticleCanvas.vue';
import PortfolioRail from './PortfolioRail.vue';
import AboutSection from './AboutSection.vue';
import ExperienceSection from './ExperienceSection.vue';
import ProjectsSection from './ProjectsSection.vue';
import GithubStats from './GithubStats.vue';

onMounted(() => {
    document.title = 'Jhuan Nohl | Fullstack Developer';
    document.documentElement.lang = 'en';
});
</script>
