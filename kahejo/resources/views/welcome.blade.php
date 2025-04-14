<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to KaHejo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        /* Animated background circles */
        body::before,
        body::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s infinite;
        }

        body::before {
            top: -150px;
            left: -150px;
        }

        body::after {
            bottom: -150px;
            right: -150px;
            animation-delay: -4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(50px, 50px) rotate(90deg);
            }
            50% {
                transform: translate(0, 100px) rotate(180deg);
            }
            75% {
                transform: translate(-50px, 50px) rotate(270deg);
            }
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
            font-size: 3rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            background: linear-gradient(45deg, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: titleGlow 2s ease-in-out infinite alternate;
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
            margin-bottom: 2rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
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

        /* Responsive design */
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
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to KaHejo</h1>
        <p class="welcome-text">Your trusted platform for health and wellness. Join us on your journey to better health.</p>
        <a href="/login" class="login-btn">Let's Get Started</a>
    </div>
</body>
</html>
