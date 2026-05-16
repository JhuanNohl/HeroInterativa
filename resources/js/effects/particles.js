const canvas = document.getElementById('particle-canvas');

if (canvas) {
    const ctx = canvas.getContext('2d', { alpha: true });
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const mouse = {
        x: window.innerWidth / 2,
        y: window.innerHeight / 2,
        px: window.innerWidth / 2,
        py: window.innerHeight / 2,
        active: false,
        speed: 0,
        energy: 0,
    };

    let width = 0;
    let height = 0;
    let dpr = 1;
    let particles = [];
    let rafId = null;

    class Particle {
        constructor(index) {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.baseX = this.x;
            this.baseY = this.y;
            this.size = 0.9 + Math.random() * 1.8;
            this.phase = Math.random() * Math.PI * 2;
            this.depth = 0.35 + Math.random() * 0.65;
            this.index = index;
        }

        update(time) {
            if (prefersReducedMotion) {
                return;
            }

            const drift = Math.sin(time * 0.00024 + this.phase) * 2.2 * this.depth;
            const counterDrift = Math.cos(time * 0.00018 + this.phase) * 1.8 * this.depth;

            this.x = this.baseX + drift;
            this.y = this.baseY + counterDrift;
        }

        proximity() {
            if (!mouse.active && mouse.energy < 0.02) {
                return 0;
            }

            const distance = Math.hypot(this.x - mouse.x, this.y - mouse.y);
            const radius = 170 + Math.min(mouse.speed * 0.18, 95);

            return Math.max(0, 1 - distance / radius) * mouse.energy;
        }

        draw() {
            const glow = this.proximity();
            const alpha = 0.055 + glow * 0.78;
            const size = this.size + glow * 3.2;

            ctx.fillStyle = `rgba(255, 255, 255, ${alpha})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    const setPointer = (event) => {
        const rect = canvas.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;

        mouse.speed = Math.hypot(x - mouse.x, y - mouse.y);
        mouse.px = mouse.x;
        mouse.py = mouse.y;
        mouse.x = x;
        mouse.y = y;
        mouse.active = true;
        mouse.energy = Math.min(1, 0.45 + mouse.speed / 90);
    };

    const makeParticles = () => {
        const area = width * height;
        const density = width < 720 ? 8800 : 7600;
        const count = Math.min(280, Math.max(95, Math.round(area / density)));

        particles = Array.from({ length: count }, (_, index) => new Particle(index));
    };

    const resize = () => {
        dpr = Math.min(window.devicePixelRatio || 1, 2);
        width = canvas.clientWidth;
        height = canvas.clientHeight;
        canvas.width = Math.round(width * dpr);
        canvas.height = Math.round(height * dpr);
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

        mouse.x = width / 2;
        mouse.y = height / 2;
        mouse.px = mouse.x;
        mouse.py = mouse.y;
        mouse.energy = 0;
        makeParticles();
    };

    const drawConnections = () => {
        const nearby = particles
            .map((particle) => ({ particle, glow: particle.proximity() }))
            .filter(({ glow }) => glow > 0.02)
            .sort((a, b) => b.glow - a.glow)
            .slice(0, 34);

        for (let i = 0; i < nearby.length; i += 1) {
            const a = nearby[i].particle;
            const aGlow = nearby[i].glow;

            for (let j = i + 1; j < nearby.length; j += 1) {
                const b = nearby[j].particle;
                const distance = Math.hypot(a.x - b.x, a.y - b.y);

                if (distance > 126) {
                    continue;
                }

                const intensity = (1 - distance / 126) * Math.min(aGlow, nearby[j].glow);

                ctx.strokeStyle = `rgba(255, 255, 255, ${0.18 * intensity})`;
                ctx.lineWidth = 0.65 + intensity * 0.55;
                ctx.beginPath();
                ctx.moveTo(a.x, a.y);
                ctx.lineTo(b.x, b.y);
                ctx.stroke();
            }
        }

        for (let i = 0; i < nearby.length - 2; i += 3) {
            const a = nearby[i];
            const b = nearby[i + 1];
            const c = nearby[i + 2];
            const ab = Math.hypot(a.particle.x - b.particle.x, a.particle.y - b.particle.y);
            const bc = Math.hypot(b.particle.x - c.particle.x, b.particle.y - c.particle.y);
            const ca = Math.hypot(c.particle.x - a.particle.x, c.particle.y - a.particle.y);

            if (ab > 148 || bc > 148 || ca > 148) {
                continue;
            }

            const opacity = Math.min(a.glow, b.glow, c.glow) * 0.08;

            ctx.fillStyle = `rgba(255, 255, 255, ${opacity})`;
            ctx.beginPath();
            ctx.moveTo(a.particle.x, a.particle.y);
            ctx.lineTo(b.particle.x, b.particle.y);
            ctx.lineTo(c.particle.x, c.particle.y);
            ctx.closePath();
            ctx.fill();
        }
    };

    const render = (time = 0) => {
        ctx.globalCompositeOperation = 'source-over';
        ctx.clearRect(0, 0, width, height);

        particles.forEach((particle) => particle.update(time));

        ctx.globalCompositeOperation = 'screen';
        drawConnections();
        particles.forEach((particle) => particle.draw());

        ctx.globalCompositeOperation = 'source-over';
        mouse.speed *= 0.82;
        mouse.energy *= mouse.active ? 0.94 : 0.9;
        rafId = window.requestAnimationFrame(render);
    };

    window.addEventListener('resize', resize);
    window.addEventListener('pointermove', setPointer, { passive: true });
    window.addEventListener('pointerdown', setPointer, { passive: true });
    window.addEventListener('pointerleave', () => {
        mouse.active = false;
    });

    resize();
    render();

    window.addEventListener('beforeunload', () => {
        if (rafId) {
            window.cancelAnimationFrame(rafId);
        }
    });
}
