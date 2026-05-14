const canvas = document.getElementById('particle-canvas');

if (canvas) {
    const ctx = canvas.getContext('2d', { alpha: true });
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const colors = ['#4285f4', '#ea4335', '#fbbc04', '#34a853', '#ffffff'];
    const mouse = {
        x: window.innerWidth / 2,
        y: window.innerHeight / 2,
        px: window.innerWidth / 2,
        py: window.innerHeight / 2,
        active: false,
        radius: 170,
        speed: 0,
    };

    let width = 0;
    let height = 0;
    let dpr = 1;
    let particles = [];
    let rafId = null;

    class Particle {
        constructor(x, y, color, size, column) {
            this.homeX = x;
            this.homeY = y;
            this.x = x + (Math.random() - 0.5) * 18;
            this.y = y + (Math.random() - 0.5) * 18;
            this.vx = 0;
            this.vy = 0;
            this.size = size;
            this.color = color;
            this.column = column;
            this.phase = Math.random() * Math.PI * 2;
            this.drag = 0.86 + Math.random() * 0.04;
            this.spring = 0.026 + Math.random() * 0.012;
        }

        update(time) {
            const dx = this.x - mouse.x;
            const dy = this.y - mouse.y;
            const distance = Math.hypot(dx, dy) || 1;
            const reach = mouse.radius + mouse.speed * 0.18;

            if (mouse.active && distance < reach) {
                const force = (1 - distance / reach) ** 2;
                const angle = Math.atan2(dy, dx);
                const push = force * (7.5 + mouse.speed * 0.024);

                this.vx += Math.cos(angle) * push;
                this.vy += Math.sin(angle) * push;
                this.vx += (mouse.x - mouse.px) * force * 0.035;
                this.vy += (mouse.y - mouse.py) * force * 0.035;
            }

            const floatY = Math.sin(time * 0.0012 + this.phase + this.column * 0.2) * 5;
            const floatX = Math.cos(time * 0.001 + this.phase) * 2;

            this.vx += (this.homeX + floatX - this.x) * this.spring;
            this.vy += (this.homeY + floatY - this.y) * this.spring;
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
        particles = [];

        const columns = Math.max(30, Math.round(width / 26));
        const rows = Math.max(18, Math.round(height / 28));
        const gapX = width / columns;
        const gapY = height / rows;
        const centerX = width / 2;
        const centerY = height / 2;
        const fieldWidth = Math.min(width * 0.88, 980);
        const fieldHeight = Math.min(height * 0.62, 500);
        const startX = centerX - fieldWidth / 2;
        const startY = centerY - fieldHeight / 2;

        for (let row = 0; row <= rows; row += 1) {
            for (let column = 0; column <= columns; column += 1) {
                const u = column / columns;
                const v = row / rows;
                const x = startX + u * fieldWidth + (Math.random() - 0.5) * gapX * 0.22;
                const y = startY + v * fieldHeight + (Math.random() - 0.5) * gapY * 0.22;
                const halo = Math.hypot((x - centerX) / fieldWidth, (y - centerY) / fieldHeight);

                if (halo > 0.68 && Math.random() < 0.5) {
                    continue;
                }

                const color = colors[(column + row * 2) % colors.length];
                const depth = 1 - Math.min(1, halo * 1.55);
                const size = 1.2 + Math.random() * 1.8 + depth * 2.2;

                particles.push(new Particle(x, y, color, size, column));
            }
        }
    };

    const resize = () => {
        dpr = Math.min(window.devicePixelRatio || 1, 2);
        width = canvas.clientWidth;
        height = canvas.clientHeight;
        canvas.width = Math.round(width * dpr);
        canvas.height = Math.round(height * dpr);
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        mouse.radius = Math.max(115, Math.min(220, width * 0.12));
        makeParticles();
    };

    const drawConnections = () => {
        ctx.lineWidth = 0.7;

        for (let i = 0; i < particles.length; i += 1) {
            const a = particles[i];

            for (let j = i + 1; j < Math.min(i + 8, particles.length); j += 1) {
                const b = particles[j];
                const dx = a.x - b.x;
                const dy = a.y - b.y;
                const distance = Math.hypot(dx, dy);

                if (distance > 42) {
                    continue;
                }

                ctx.strokeStyle = `rgba(255, 255, 255, ${0.11 * (1 - distance / 42)})`;
                ctx.beginPath();
                ctx.moveTo(a.x, a.y);
                ctx.lineTo(b.x, b.y);
                ctx.stroke();
            }
        }
    };

    const render = (time = 0) => {
        ctx.clearRect(0, 0, width, height);
        ctx.globalCompositeOperation = 'lighter';

        if (!prefersReducedMotion) {
            particles.forEach((particle) => particle.update(time));
        }

        drawConnections();
        particles.forEach((particle) => particle.draw());

        ctx.globalCompositeOperation = 'source-over';
        mouse.speed *= 0.84;
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
