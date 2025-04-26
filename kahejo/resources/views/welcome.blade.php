<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to KaHejo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
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
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 900px;
            width: 95%;
            position: relative;
            z-index: 1;
            animation: fadeIn 1s ease-out;
            transition: all 0.3s ease;
        }

        .welcome-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-section {
            margin-bottom: 1.5rem;
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 0.8rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            background: linear-gradient(45deg, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: titleGlow 2s ease-in-out infinite alternate;
            font-weight: 700;
        }

        @keyframes titleGlow {
            from {
                text-shadow: 0 0 10px rgba(255,255,255,0.5);
            }
            to {
                text-shadow: 0 0 20px rgba(255,255,255,0.8);
            }
        }

        .welcome-text {
            font-size: 1rem;
            margin-bottom: 1.2rem;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
        }

        .button-group {
            display: flex;
            gap: 0.8rem;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .btn {
            padding: 0.7rem 1.8rem;
            font-size: 0.95rem;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-block;
            font-weight: 600;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .primary-btn {
            background: rgba(255, 255, 255, 0.9);
            color: #4CAF50;
            border: 2px solid transparent;
        }

        .secondary-btn {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            transform: translateX(100%);
            transition: transform 0.6s ease;
        }

        .btn:hover::before {
            transform: translateX(-100%);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .primary-btn:hover {
            background: white;
            border-color: #4CAF50;
        }

        .secondary-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.8rem;
        }

        .feature {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .feature i {
            font-size: 1.8rem;
            margin-bottom: 0.6rem;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .feature h3 {
            font-size: 0.95rem;
            margin-bottom: 0.4rem;
            color: white;
        }

        .feature p {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.8rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            height: fit-content;
        }

        .stat-item {
            text-align: center;
            padding: 0.8rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.1);
        }

        .stat-number {
            font-size: 1.6rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.2rem;
        }

        .stat-label {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .testimonials {
            margin-top: 1.5rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .testimonial-content {
            text-align: left;
        }

        .testimonial {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.3rem;
            font-style: italic;
        }

        .testimonial-author {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .testimonial-icon {
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.5);
        }

        @media (max-width: 768px) {
            .welcome-container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 2.2rem;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .features {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .button-group {
                flex-direction: column;
            }

            .testimonials {
                flex-direction: column;
                text-align: center;
            }

            .testimonial-content {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="welcome-container">
        <div class="header-section">
            <h1>Welcome to KaHejo</h1>
            <p class="welcome-text">Your trusted platform for health and wellness. Join us on your journey to better health.</p>
            
            <div class="button-group">
                <a href="{{ route('company') }}" class="btn primary-btn">Get Started</a>
                <a href="#" class="btn secondary-btn">Learn More</a>
            </div>
        </div>

        <div class="content-grid">
            <div class="features">
                <div class="feature">
                    <i class="fas fa-heartbeat"></i>
                    <h3>Health Tracking</h3>
                    <p>Monitor your health metrics and progress</p>
                </div>
                <div class="feature">
                    <i class="fas fa-chart-line"></i>
                    <h3>Progress Monitoring</h3>
                    <p>Track your fitness journey</p>
                </div>
                <div class="feature">
                    <i class="fas fa-users"></i>
                    <h3>Community Support</h3>
                    <p>Connect with like-minded individuals</p>
                </div>
            </div>

            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Health Experts</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Success Rate</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support</div>
                </div>
            </div>
        </div>

        <div class="testimonials">
            <i class="fas fa-quote-left testimonial-icon"></i>
            <div class="testimonial-content">
                <p class="testimonial">"KaHejo has transformed my health journey. The community support and tracking features are amazing!"</p>
                <p class="testimonial-author">- Sarah Johnson, Fitness Enthusiast</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 120,
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
                    random: true
                },
                size: {
                    value: 3,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: true,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
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
                }
            },
            retina_detect: true
        });
    </script>
</body>
</html>
