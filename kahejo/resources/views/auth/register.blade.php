<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - KaHejo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2ecc71;
            --primary-dark: #27ae60;
            --text-color: #2c3e50;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 1.5rem;
            margin: 1rem;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .auth-header .logo {
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
            transition: transform 0.3s ease;
        }

        .auth-header .logo:hover {
            transform: scale(1.05);
        }

        .auth-header h1 {
            color: var(--text-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .auth-header p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .form-group {
            margin-bottom: 1rem;
            position: relative;
        }

        .form-control {
            height: 45px;
            background: #f8f9fa;
            border: 2px solid transparent;
            border-radius: 12px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            line-height: 1.5;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 4px rgba(46, 204, 113, 0.1);
        }

        .form-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            line-height: 1;
            display: flex;
            align-items: center;
            height: 100%;
            margin-top: 0;
        }

        .form-control:focus + i {
            color: var(--primary-color);
        }

        .password-requirements {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 0.75rem;
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: #666;
        }

        .password-requirements p {
            margin-bottom: 0.25rem;
            color: var(--text-color);
            font-weight: 500;
        }

        .password-requirements ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .password-requirements li {
            display: flex;
            align-items: center;
            margin-bottom: 0.2rem;
        }

        .password-requirements li i {
            position: static;
            margin-right: 0.5rem;
            font-size: 0.8rem;
        }

        .password-requirements li.valid {
            color: var(--primary-color);
        }

        .btn-auth {
            height: 45px;
            background: var(--primary-color);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 0.9rem;
            font-weight: 600;
            width: 100%;
            margin-top: 0.75rem;
            transition: all 0.3s ease;
        }

        .btn-auth:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
        }

        .auth-footer {
            text-align: center;
            margin-top: 1rem;
            color: #666;
            font-size: 0.9rem;
        }

        .auth-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .auth-footer a:hover {
            color: var(--primary-dark);
        }

        .alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            min-width: 300px;
            text-align: center;
            border: none;
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .alert-danger {
            background-color: #e74c3c;
            color: white;
        }

        @media (max-width: 480px) {
            .auth-container {
                width: 100%;
                margin: 1rem;
                padding: 2rem;
            }
        }

        .btn-toggle-password {
            position: absolute;
            right: 1rem;
            top: 0;
            transform: none;
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 0;
            font-size: 1.2rem;
            transition: color 0.3s ease;
            z-index: 10;
            height: 50px;
            display: flex;
            align-items: center;
        }
        
        .btn-toggle-password:hover {
            color: var(--primary-color);
        }

        .btn-toggle-password i {
            line-height: 1;
            position: static;
            margin: 0;
            height: auto;
        }

        .form-group i.fas.fa-lock,
        .form-group i.fas.fa-user {
            left: 1rem;
            right: auto;
            top: 0;
            transform: none;
            height: 50px;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="auth-container">
        <div class="auth-header">
            <div class="logo">
                <i class="fas fa-leaf"></i>
            </div>
            <h1>Create Account</h1>
            <p>Join KaHejo today</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Username" value="{{ old('name') }}" required autofocus>
                <i class="fas fa-user"></i>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
                <button type="button" class="btn-toggle-password" onclick="togglePassword('password', this)">
                    <i class="fas fa-eye"></i>
                </button>
                <div class="password-requirements">
                    <p>Password must contain:</p>
                    <ul>
                        <li id="length"><i class="fas fa-times"></i> At least 8 characters</li>
                        <li id="letter"><i class="fas fa-times"></i> At least one letter</li>
                        <li id="number"><i class="fas fa-times"></i> At least one number</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                <i class="fas fa-lock"></i>
                <button type="button" class="btn-toggle-password" onclick="togglePassword('password_confirmation', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <button type="submit" class="btn btn-auth">
                <i class="fas fa-user-plus me-2"></i>Register
            </button>
        </form>

        <div class="auth-footer">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fas fa-eye';
            }
        }

        const password = document.getElementById('password');
        const length = document.getElementById('length');
        const letter = document.getElementById('letter');
        const number = document.getElementById('number');

        password.addEventListener('input', function() {
            const val = this.value;
            
            // Check length
            if(val.length >= 8) {
                length.classList.add('valid');
                length.classList.remove('invalid');
                length.querySelector('i').className = 'fas fa-check';
            } else {
                length.classList.add('invalid');
                length.classList.remove('valid');
                length.querySelector('i').className = 'fas fa-times';
            }

            // Check letter
            if(/[a-zA-Z]/.test(val)) {
                letter.classList.add('valid');
                letter.classList.remove('invalid');
                letter.querySelector('i').className = 'fas fa-check';
            } else {
                letter.classList.add('invalid');
                letter.classList.remove('valid');
                letter.querySelector('i').className = 'fas fa-times';
            }

            // Check number
            if(/[0-9]/.test(val)) {
                number.classList.add('valid');
                number.classList.remove('invalid');
                number.querySelector('i').className = 'fas fa-check';
            } else {
                number.classList.add('invalid');
                number.classList.remove('valid');
                number.querySelector('i').className = 'fas fa-times';
            }
        });
    </script>
</body>
</html> 