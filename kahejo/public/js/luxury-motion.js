/**
 * KaHejo Luxury Motion Engine
 * Powered by Motion One (WAAPI) & Modern Web Animations API
 * Diverse, page-aware and component-tailored "Hilang -> Muncul" entrance animations.
 */

(function () {
    'use strict';

    // 1. Top Shimmer Loading Progress Bar
    function createProgressBar() {
        let bar = document.getElementById('kahejoProgressBar');
        if (!bar) {
            bar = document.createElement('div');
            bar.id = 'kahejoProgressBar';
            bar.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 0%;
                height: 3px;
                background: linear-gradient(90deg, #059669, #10b981, #34d399, #a7f3d0);
                box-shadow: 0 0 16px rgba(52, 211, 153, 0.9), 0 0 8px rgba(16, 185, 129, 0.9);
                z-index: 999999;
                pointer-events: none;
                transition: width 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease;
                opacity: 0;
            `;
            document.body.appendChild(bar);
        }
        return bar;
    }

    function startProgress() {
        const bar = createProgressBar();
        bar.style.opacity = '1';
        bar.style.width = '30%';
        setTimeout(() => {
            if (bar.style.opacity === '1') bar.style.width = '80%';
        }, 100);
    }

    function completeProgress() {
        const bar = createProgressBar();
        bar.style.width = '100%';
        setTimeout(() => {
            bar.style.opacity = '0';
            setTimeout(() => {
                bar.style.width = '0%';
            }, 300);
        }, 180);
    }

    // 2. Multi-Varied "Hilang Menjadi Muncul" Page & Component Animations
    function initDiverseEntrances() {
        const path = window.location.pathname.toLowerCase();

        // Check if Motion One animate is available
        const hasMotion = window.Motion && typeof window.Motion.animate === 'function';

        // TYPE A: FORMS & INPUT PAGES (e.g. create, edit, company, carbon input)
        // Style: Silky Smooth Slide-Up with Soft Unblur Focus
        if (path.includes('create') || path.includes('edit') || path.endsWith('/company') || path.endsWith('/carbon') || path.includes('profile')) {
            const formCards = document.querySelectorAll('.glass-card, form, .form-container');
            const inputGroups = document.querySelectorAll('form > div, .space-y-5 > div, .space-y-6 > div');

            if (hasMotion && formCards.length > 0) {
                window.Motion.animate(
                    formCards,
                    { 
                        opacity: [0, 1], 
                        y: [36, 0], 
                        filter: ['blur(10px)', 'blur(0px)'] 
                    },
                    { 
                        duration: 0.65, 
                        easing: [0.16, 1, 0.3, 1] 
                    }
                );
            }

            if (hasMotion && inputGroups.length > 0) {
                window.Motion.animate(
                    inputGroups,
                    { 
                        opacity: [0, 1], 
                        y: [16, 0] 
                    },
                    { 
                        duration: 0.5, 
                        delay: window.Motion.stagger(0.04, { start: 0.15 }), 
                        easing: [0.16, 1, 0.3, 1] 
                    }
                );
            }
        }
        // TYPE B: CATALOGS, ACHIEVEMENTS & REWARDS GRID
        // Style: 3D Cascade Wave Flip & Spring Bloom
        else if (path.includes('achievement') || path.includes('reward')) {
            const catalogCards = document.querySelectorAll('.glass-card, .grid > div');
            if (hasMotion && catalogCards.length > 0) {
                window.Motion.animate(
                    catalogCards,
                    { 
                        opacity: [0, 1], 
                        y: [30, 0], 
                        scale: [0.93, 1],
                        filter: ['blur(6px)', 'blur(0px)']
                    },
                    { 
                        duration: 0.6, 
                        delay: window.Motion.stagger(0.06, { start: 0.04 }), 
                        easing: [0.16, 1, 0.3, 1] 
                    }
                );
            }
        }
        // TYPE C: TABLES, HISTORY & LOGS
        // Style: Horizontal Row Sweep & Layer Cascade
        else if (path.includes('history') || path.includes('users') || path.includes('claim') || path.includes('factor')) {
            const tableContainer = document.querySelectorAll('.glass-card, table, .overflow-x-auto');
            const tableRows = document.querySelectorAll('tbody tr');

            if (hasMotion && tableContainer.length > 0) {
                window.Motion.animate(
                    tableContainer,
                    { 
                        opacity: [0, 1], 
                        x: [-24, 0], 
                        filter: ['blur(6px)', 'blur(0px)'] 
                    },
                    { 
                        duration: 0.55, 
                        easing: [0.16, 1, 0.3, 1] 
                    }
                );
            }

            if (hasMotion && tableRows.length > 0) {
                window.Motion.animate(
                    tableRows,
                    { 
                        opacity: [0, 1], 
                        y: [12, 0] 
                    },
                    { 
                        duration: 0.4, 
                        delay: window.Motion.stagger(0.03, { start: 0.1 }), 
                        easing: [0.16, 1, 0.3, 1] 
                    }
                );
            }
        }
        // TYPE D: KNOWLEDGE, FAQ & ARTICLES
        // Style: Elastic Vertical Unfold & Soft Reveal
        else if (path.includes('education') || path.includes('faq')) {
            const accordionItems = document.querySelectorAll('.glass-card, details, article');
            if (hasMotion && accordionItems.length > 0) {
                window.Motion.animate(
                    accordionItems,
                    { 
                        opacity: [0, 1], 
                        y: [26, 0], 
                        scale: [0.97, 1],
                        filter: ['blur(6px)', 'blur(0px)']
                    },
                    { 
                        duration: 0.55, 
                        delay: window.Motion.stagger(0.07, { start: 0.05 }), 
                        easing: [0.16, 1, 0.3, 1] 
                    }
                );
            }
        }
        // TYPE E: DASHBOARD & METRICS OVERVIEW (DEFAULT)
        // Style: Staggered Dynamic Spring Pop with Ambient Glow Bloom
        else {
            const dashCards = document.querySelectorAll('.glass-card, .metric-card');
            if (hasMotion && dashCards.length > 0) {
                window.Motion.animate(
                    dashCards,
                    { 
                        opacity: [0, 1], 
                        y: [28, 0], 
                        scale: [0.95, 1],
                        filter: ['blur(8px)', 'blur(0px)']
                    },
                    { 
                        duration: 0.65, 
                        delay: window.Motion.stagger(0.07, { start: 0.04 }), 
                        easing: [0.16, 1, 0.3, 1] 
                    }
                );
            }
        }
    }

    // 3. Interactive 3D Perspective Card Tilt (Desktop Only)
    function init3DCardTilt() {
        if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
            return;
        }

        const cards = document.querySelectorAll('.glass-card');
        cards.forEach((card) => {
            let isHovered = false;
            let reqId = null;

            card.addEventListener('mouseenter', () => {
                isHovered = true;
                card.style.willChange = 'transform, box-shadow';
            });

            card.addEventListener('mousemove', (e) => {
                if (!isHovered) return;
                if (reqId) cancelAnimationFrame(reqId);

                reqId = requestAnimationFrame(() => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateX = ((y - centerY) / centerY) * -4.5;
                    const rotateY = ((x - centerX) / centerX) * 4.5;

                    card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-4px) scale(1.008)`;
                });
            });

            card.addEventListener('mouseleave', () => {
                isHovered = false;
                if (reqId) cancelAnimationFrame(reqId);
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0) scale(1)';
                setTimeout(() => {
                    card.style.willChange = 'auto';
                }, 400);
            });
        });
    }

    // 4. Animated Number Counters
    function initNumberCounters() {
        const counterElements = document.querySelectorAll('.metric-glow, [data-counter]');
        
        if (!('IntersectionObserver' in window)) return;

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    obs.unobserve(el);

                    const text = el.innerText.trim();
                    const match = text.match(/[\d,.]+/);
                    if (!match) return;

                    const rawNumStr = match[0].replace(/,/g, '');
                    const targetNum = parseFloat(rawNumStr);
                    if (isNaN(targetNum) || targetNum <= 0) return;

                    const isDecimal = rawNumStr.includes('.');
                    const decimalPlaces = isDecimal ? rawNumStr.split('.')[1].length : 0;
                    const prefix = text.slice(0, match.index);
                    const suffix = text.slice(match.index + match[0].length);

                    const duration = 1200;
                    const startTime = performance.now();

                    function updateNumber(now) {
                        const elapsed = now - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        const easeOut = 1 - Math.pow(1 - progress, 4);
                        const currentVal = targetNum * easeOut;

                        const formattedNum = isDecimal
                            ? currentVal.toLocaleString('id-ID', { minimumFractionDigits: decimalPlaces, maximumFractionDigits: decimalPlaces })
                            : Math.round(currentVal).toLocaleString('id-ID');

                        el.innerHTML = `${prefix}${formattedNum}${suffix}`;

                        if (progress < 1) {
                            requestAnimationFrame(updateNumber);
                        } else {
                            const finalFormatted = isDecimal
                                ? targetNum.toLocaleString('id-ID', { minimumFractionDigits: decimalPlaces, maximumFractionDigits: decimalPlaces })
                                : targetNum.toLocaleString('id-ID');
                            el.innerHTML = `${prefix}${finalFormatted}${suffix}`;
                        }
                    }

                    requestAnimationFrame(updateNumber);
                }
            });
        }, { threshold: 0.15 });

        counterElements.forEach(el => observer.observe(el));
    }

    // 5. Tactile Spring Tap Feedback on Buttons
    function initTactileSprings() {
        const interactives = document.querySelectorAll('.btn-shimmer, .logout-btn, button[type="submit"], .sidebar-link, a.px-4, button.px-4');
        
        interactives.forEach(btn => {
            btn.addEventListener('mousedown', () => {
                btn.style.transform = 'scale(0.97)';
                btn.style.transition = 'transform 0.1s cubic-bezier(0.16, 1, 0.3, 1)';
            });

            const resetSpring = () => {
                btn.style.transform = '';
                btn.style.transition = 'transform 0.35s cubic-bezier(0.16, 1, 0.3, 1)';
            };

            btn.addEventListener('mouseup', resetSpring);
            btn.addEventListener('mouseleave', resetSpring);
        });
    }

    // 6. Cinematic Page Navigation Transitions
    function initPageTransitions() {
        completeProgress();

        document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"]):not([href^="javascript:"])').forEach(link => {
            link.addEventListener('click', function (e) {
                const url = this.getAttribute('href');
                if (!url || url === '#' || url.startsWith('javascript:')) return;
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

                try {
                    const targetUrl = new URL(url, window.location.origin);
                    if (targetUrl.origin !== window.location.origin) return;
                    if (targetUrl.pathname === window.location.pathname && targetUrl.search === window.location.search) return;
                } catch (_) {
                    return;
                }

                startProgress();

                const mainEl = document.querySelector('main');
                if (mainEl) {
                    e.preventDefault();
                    mainEl.style.transition = 'opacity 0.22s cubic-bezier(0.16, 1, 0.3, 1), transform 0.22s cubic-bezier(0.16, 1, 0.3, 1), filter 0.22s ease';
                    mainEl.style.opacity = '0';
                    mainEl.style.transform = 'translateY(-14px) scale(0.98)';
                    mainEl.style.filter = 'blur(6px)';

                    setTimeout(() => {
                        window.location.href = url;
                    }, 200);
                }
            });
        });
    }

    // 7. Initialize
    function initAll() {
        initDiverseEntrances();
        init3DCardTilt();
        initNumberCounters();
        initTactileSprings();
        initPageTransitions();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAll);
    } else {
        initAll();
    }

    window.addEventListener('pageshow', (e) => {
        if (e.persisted) {
            const mainEl = document.querySelector('main');
            if (mainEl) {
                mainEl.style.opacity = '1';
                mainEl.style.transform = 'translateY(0) scale(1)';
                mainEl.style.filter = 'blur(0px)';
            }
            completeProgress();
            initDiverseEntrances();
        }
    });
})();
