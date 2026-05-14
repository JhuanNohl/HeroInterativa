const canvas = document.getElementById('particle-canvas');

if (canvas) {
    const ctx = canvas.getContext('2d', { alpha: true });
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const accents = ['rgba(66, 133, 244, 0.85)', 'rgba(251, 188, 4, 0.82)', 'rgba(52, 168, 83, 0.78)'];
    const mouse = {
        x: window.innerWidth / 2,
        y: window.innerHeight / 2,
        px: window.innerWidth / 2,
        py: window.innerHeight / 2,
        active: false,
        speed: 0,
    };
    const swarm = {
        x: window.innerWidth / 2,
        y: window.innerHeight / 2,
    };

    let width = 0;
    let height = 0;
    let dpr = 1;
    let particles = [];
    let rafId = null;

    class Particle {
        constructor(index, count) {
            const angle = index * 2.399963 + Math.random() * 0.7;
            const radius = Math.sqrt(index / count) * 260 + Math.random() * 38;

            this.offsetX = Math.cos(angle) * radius;
            this.offsetY = Math.sin(angle) * radius * 0.78;
            this.x = swarm.x + this.offsetX;
            this.y = swarm.y + this.offsetY;
            this.vx = 0;
            this.vy = 0;
            this.size = 1.8 + Math.random() * 3.4;
            this.phase = Math.random() * Math.PI * 2;
            this.drag = 0.8 + Math.random() * 0.08;
            this.spring = 0.018 + Math.random() * 0.03;
            this.delay = 0.46 + Math.random() * 0.72;
            this.color = Math.random() < 0.88 ? `rgba(255, 255, 255, ${0.58 + Math.random() * 0.36})` : accents[index % accents.length];
        }

        update(time) {
            const orbit = time * 0.00055;
            const pulse = Math.sin(time * 0.0014 + this.phase) * 10;
            const targetX = swarm.x + this.offsetX * this.delay + Math.cos(orbit + this.phase) * pulse;
            const targetY = swarm.y + this.offsetY * this.delay + Math.sin(orbit + this.phase) * pulse;
            const dx = this.x - mouse.x;
            const dy = this.y - mouse.y;
            const distance = Math.hypot(dx, dy) || 1;
            const reach = 110 + Math.min(mouse.speed * 0.24, 96);

            if (mouse.active && distance < reach) {
                const force = (1 - distance / reach) ** 2;
                const angle = Math.atan2(dy, dx);

                this.vx += Math.cos(angle) * force * 3.2;
                this.vy += Math.sin(angle) * force * 3.2;
                this.vx += (mouse.x - mouse.px) * force * 0.022 * this.delay;
                this.vy += (mouse.y - mouse.py) * force * 0.022 * this.delay;
            }

            this.vx += (targetX - this.x) * this.spring;
            this.vy += (targetY - this.y) * this.spring;
            this.vx *= this.drag;
            this.vy *= this.drag;
            this.x += this.vx;
            this.y += this.vy;
        }

        draw() {
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
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
    };

    const makeParticles = () => {
        const count = width < 720 ? 96 : 170;

        particles = Array.from({ length: count }, (_, index) => new Particle(index, count));
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
        swarm.x = mouse.x;
        swarm.y = mouse.y;
        makeParticles();
    };

    const drawConnections = () => {
        ctx.lineWidth = 0.65;

        for (let i = 0; i < particles.length; i += 1) {
            const a = particles[i];

            for (let j = i + 1; j < Math.min(i + 5, particles.length); j += 1) {
                const b = particles[j];
                const distance = Math.hypot(a.x - b.x, a.y - b.y);

                if (distance > 84) {
                    continue;
                }

                ctx.strokeStyle = `rgba(255, 255, 255, ${0.1 * (1 - distance / 84)})`;
                ctx.beginPath();
                ctx.moveTo(a.x, a.y);
                ctx.lineTo(b.x, b.y);
                ctx.stroke();
            }
        }
    };

    const drawColorWash = () => {
        const speedAlpha = Math.min(0.22, 0.045 + mouse.speed * 0.0018);
        const radius = 210 + Math.min(mouse.speed * 1.3, 170);
        const gradient = ctx.createRadialGradient(swarm.x, swarm.y, 0, swarm.x, swarm.y, radius);

        gradient.addColorStop(0, `rgba(66, 133, 244, ${speedAlpha})`);
        gradient.addColorStop(0.38, `rgba(52, 168, 83, ${speedAlpha * 0.42})`);
        gradient.addColorStop(0.72, `rgba(251, 188, 4, ${speedAlpha * 0.22})`);
        gradient.addColorStop(1, 'rgba(5, 5, 5, 0)');

        ctx.globalCompositeOperation = 'screen';
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, width, height);
    };

    const render = (time = 0) => {
        ctx.globalCompositeOperation = 'source-over';
        ctx.fillStyle = 'rgba(5, 5, 5, 0.18)';
        ctx.fillRect(0, 0, width, height);

        if (!prefersReducedMotion) {
            const targetX = mouse.active ? mouse.x : width / 2;
            const targetY = mouse.active ? mouse.y : height / 2;

            swarm.x += (targetX - swarm.x) * 0.105;
            swarm.y += (targetY - swarm.y) * 0.105;
            particles.forEach((particle) => particle.update(time));
        }

        drawColorWash();
        ctx.globalCompositeOperation = 'lighter';
        drawConnections();
        particles.forEach((particle) => particle.draw());

        ctx.globalCompositeOperation = 'source-over';
        mouse.speed *= 0.82;
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
