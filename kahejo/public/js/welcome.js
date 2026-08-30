        // 1. Mobile Hamburger Menu Toggle
        function toggleMenu() {
            const drawer = document.getElementById('mobile-drawer');
            const icon = document.getElementById('menu-icon');
            const isOpen = drawer.classList.contains('active');
            
            if (isOpen) {
                drawer.classList.remove('active');
                icon.className = 'fa-solid fa-bars';
            } else {
                drawer.classList.add('active');
                icon.className = 'fa-solid fa-xmark';
            }
        }
        document.getElementById('mobile-toggle').addEventListener('click', toggleMenu);

        // 2. Interactive Spotlight Glow on Mouse Movement for Cards
        document.querySelectorAll('.green-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            });
        });

        // 3. Dynamic Carbon Calculator Simulation
        function calculateEmission() {
            const transportKm = parseFloat(document.getElementById('transport-slider').value) || 0;
            const electricityKwh = parseFloat(document.getElementById('electricity-slider').value) || 0;

            document.getElementById('transport-val').innerText = transportKm + ' km/hari';
            document.getElementById('electricity-val').innerText = electricityKwh + ' kWh/bln';

            // Faktor emisi standar (IPCC/KemenLHK):
            // Transport: ~0.19 kg CO2e/km * 30 hari
            // Listrik grid: ~0.85 kg CO2e/kWh
            const monthlyTransportCO2 = transportKm * 0.19 * 30;
            const monthlyElectricityCO2 = electricityKwh * 0.85;

            const total = (monthlyTransportCO2 + monthlyElectricityCO2).toFixed(1);
            document.getElementById('total-co2').innerText = total;

            // Gauge progress bar calculation (max benchmark ~700 kg)
            const percentage = Math.min(Math.max((total / 700) * 100, 10), 100);
            document.getElementById('progress-bar').style.width = percentage + '%';

            // 1 pohon dewasa menyerap ~21.7 kg CO2/tahun
            const treesNeeded = Math.ceil(total / 21.7);
            document.getElementById('trees-needed').innerText = treesNeeded + ' pohon';
        }

        // 4. FAQ Accordion Toggle
        function toggleFaq(element) {
            const item = element.parentElement;
            const isActive = item.classList.contains('active');
            
            document.querySelectorAll('.faq-item').forEach(el => el.classList.remove('active'));
            
            if (!isActive) {
                item.classList.add('active');
            }
        }

        // 5. Scroll Reveal Observer
        document.addEventListener('DOMContentLoaded', () => {
            calculateEmission();

            const reveals = document.querySelectorAll('.reveal');
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            reveals.forEach(el => revealObserver.observe(el));
        });
