<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to KaHejo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 500px;
            width: 90%;
            position: relative;
            z-index: 1;
            animation: fadeIn 1s ease-out;
            transition: transform 0.3s ease;
        }

        .welcome-container:hover {
            transform: translateY(-5px);
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

        h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
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
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
        }

        .login-btn {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            background: rgba(255, 255, 255, 0.9);
            color: #4CAF50;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-block;
            font-weight: 600;
            letter-spacing: 0.5px;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
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

        .login-btn:hover::before {
            transform: translateX(-100%);
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            background: white;
            border-color: #4CAF50;
        }

        .login-btn:active {
            transform: translateY(-1px);
        }

        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 2rem;
            gap: 1rem;
        }

        .feature {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-5px);
        }

        .feature i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .feature p {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        @media (max-width: 600px) {
            .welcome-container {
                padding: 2rem;
            }

            h1 {
                font-size: 2.5rem;
            }

            .welcome-text {
                font-size: 1rem;
            }

            .features {
                flex-direction: column;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div id="particles-js"></div>
    <div class="welcome-container">
        <h1>Welcome to KaHejo</h1>
        <p class="welcome-text">Your trusted platform for health and wellness. Join us on your journey to better health.</p>
        <a href="{{ route('company') }}" class="login-btn">Let's Get Started</a>
        
        <div class="features">
            <div class="feature">
                <i class="fas fa-heartbeat"></i>
                <p>Health Tracking</p>
            </div>
            <div class="feature">
                <i class="fas fa-chart-line"></i>
                <p>Progress Monitoring</p>
            </div>
            <div class="feature">
                <i class="fas fa-users"></i>
                <p>Community Support</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 80,
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
