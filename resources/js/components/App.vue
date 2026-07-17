<template>
    <ParticleCanvas />

    <div class="portfolio-shell" data-particle-hero>
        <PortfolioRail />

        <main class="portfolio-main">
            <AboutSection />
            <ExperienceSection />
            <ProjectsSection />
            <GithubStats />
        </main>
    </div>
</template>

<script setup>
import ParticleCanvas from './ParticleCanvas.vue';
import PortfolioRail from './PortfolioRail.vue';
import AboutSection from './AboutSection.vue';
import ExperienceSection from './ExperienceSection.vue';
import ProjectsSection from './ProjectsSection.vue';
import GithubStats from './GithubStats.vue';
</script>
