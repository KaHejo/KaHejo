<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to KaHejo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #66bb6a;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .welcome-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 800px;
            width: 95%;
            position: relative;
            z-index: 1;
            animation: fadeIn 1s ease-out;
            transition: all 0.3s ease;
        }

        .welcome-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-section {
            margin-bottom: 1rem;
            position: relative;
        }

        .brand-logo {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: white;
            text-shadow: 0 1px 8px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
            position: relative;
        }

        .brand-logo::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ffffff, transparent);
            border-radius: 2px;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(4deg); }
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
            background: linear-gradient(45deg, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: titleGlow 2s ease-in-out infinite alternate;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        @keyframes titleGlow {
            from {
                text-shadow: 0 0 8px rgba(255,255,255,0.4);
            }
            to {
                text-shadow: 0 0 15px rgba(255,255,255,0.7);
            }
        }

        .welcome-text {
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.4;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 300;
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
        }

        .button-group {
            display: flex;
            gap: 0.6rem;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .btn {
            padding: 0.5rem 1.2rem;
            font-size: 0.85rem;
            text-decoration: none;
            border-radius: 40px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .btn i {
            font-size: 0.85rem;
            transition: transform 0.3s ease;
        }

        .btn:hover i {
            transform: translateX(1px);
        }

        .primary-btn {
            background: rgba(255, 255, 255, 0.95);
            color: #66bb6a;
            border: 2px solid transparent;
        }

        .secondary-btn {
            background: transparent;
            color: white;
            border: 1.5px solid white;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.15), transparent);
            transform: translateX(100%);
            transition: transform 0.5s ease;
        }

        .btn:hover::before {
            transform: translateX(-100%);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }

        .primary-btn:hover {
            background: white;
            border-color: #66bb6a;
        }

        .secondary-btn:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.5rem;
        }

        .feature {
            background: rgba(255, 255, 255, 0.08);
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .feature::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.08), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }

        .feature:hover::before {
            transform: translateX(100%);
        }

        .feature:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .feature i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #ffffff;
            text-shadow: 0 1px 3px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }

        .feature:hover i {
            transform: scale(1.05) rotate(3deg);
        }

        .feature h3 {
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
            color: white;
            font-weight: 600;
        }

        .feature p {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.75);
            line-height: 1.3;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 10px;
            height: fit-content;
        }

        .stat-item {
            text-align: center;
            padding: 0.6rem;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.08), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }

        .stat-item:hover::before {
            transform: translateX(100%);
        }

        .stat-item:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.2rem;
            text-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        .stat-label {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.75);
            font-weight: 500;
        }

        .testimonials {
            margin-top: 1rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            position: relative;
            overflow: hidden;
        }

        .testimonials::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.04), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }

        .testimonials:hover::before {
            transform: translateX(100%);
        }

        .testimonial-content {
            text-align: left;
            position: relative;
            z-index: 1;
        }

        .testimonial {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 0.3rem;
            font-style: italic;
            line-height: 1.4;
        }

        .testimonial-author {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
        }

        .testimonial-icon {
            font-size: 1.75rem;
            color: rgba(255, 255, 255, 0.4);
            animation: float 3s ease-in-out infinite;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            animation: floatShape 20s infinite linear;
        }

        @keyframes floatShape {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(80px, 80px) rotate(180deg);
            }
            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .welcome-container {
                padding: 0.8rem;
            }

            h1 {
                font-size: 1.8rem;
            }

            .brand-logo {
                font-size: 2rem;
            }

            .content-grid {
                grid-template-columns: 1fr;
                gap: 0.8rem;
            }

            .features {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }

            .button-group {
                flex-direction: column;
                gap: 0.4rem;
            }

            .testimonials {
                flex-direction: column;
                text-align: center;
                gap: 0.8rem;
            }

            .testimonial-content {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="floating-shapes">
        <div class="shape" style="width: 80px; height: 80px; top: 10%; left: 10%;"></div>
        <div class="shape" style="width: 120px; height: 120px; top: 60%; right: 10%;"></div>
        <div class="shape" style="width: 60px; height: 60px; bottom: 20%; left: 20%;"></div>
    </div>
    <div class="welcome-container animate__animated animate__fadeIn">
        <div class="header-section">
            <div class="brand-logo animate__animated animate__bounceIn">
                <i class="fas fa-leaf"></i>
            </div>
            <h1 class="animate__animated animate__fadeInDown">Welcome to KaHejo</h1>
            <p class="welcome-text animate__animated animate__fadeInUp">
                Track your carbon footprint and join our eco-conscious community.
            </p>
            
            <div class="button-group animate__animated animate__fadeInUp animate__delay-1s">
                <a href="{{ route('login') }}" class="btn primary-btn">
                    <i class="fas fa-rocket"></i>
                    <span>Get Started</span>
                </a>
                <a href="#learn-more" class="btn secondary-btn">
                    <i class="fas fa-info-circle"></i>
                    <span>Learn More</span>
                </a>
            </div>
        </div>

        <div class="content-grid">
            <div class="features">
                <div class="feature animate__animated animate__fadeInLeft">
                    <i class="fas fa-heartbeat"></i>
                    <h3>Health Tracking</h3>
                    <p>Monitor health metrics with advanced tracking</p>
                </div>
                <div class="feature animate__animated animate__fadeInUp">
                    <i class="fas fa-chart-line"></i>
                    <h3>Progress Monitoring</h3>
                    <p>Track journey with detailed analytics</p>
                </div>
                <div class="feature animate__animated animate__fadeInRight">
                    <i class="fas fa-users"></i>
                    <h3>Community Support</h3>
                    <p>Connect with like-minded individuals</p>
                </div>
            </div>

            <div class="stats">
                <div class="stat-item animate__animated animate__fadeInRight animate__delay-1s">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat-item animate__animated animate__fadeInRight animate__delay-2s">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Health Experts</div>
                </div>
                <div class="stat-item animate__animated animate__fadeInRight animate__delay-3s">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Success Rate</div>
                </div>
                <div class="stat-item animate__animated animate__fadeInRight animate__delay-4s">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support</div>
                </div>
            </div>
        </div>

        <div class="testimonials animate__animated animate__fadeInUp animate__delay-2s">
            <i class="fas fa-quote-left testimonial-icon"></i>
            <div class="testimonial-content">
                <p class="testimonial">"KaHejo transformed my health journey with amazing community support and tracking features!"</p>
                <p class="testimonial-author">- Asherakmal, CEO OF KAHEJO</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 180,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#ffffff'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.5,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 2.5,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 120,
                    color: '#ffffff',
                    opacity: 0.3,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: true,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: true,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'grab'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 120,
                        line_linked: {
                            opacity: 0.8
                        }
                    },
                    push: {
                        particles_nb: 3
                    }
                }
            },
            retina_detect: true
        });
    </script>
</body>
</html>