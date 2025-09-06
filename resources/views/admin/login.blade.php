<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Desa Tetembomua</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Warna Utama - Gradasi Hijau Modern */
            --primary-gradient: linear-gradient(135deg, #2E8B57, #3CB371, #20B2AA);
            --primary-green: #2E8B57;
            --secondary-green: #3CB371;
            --accent-teal: #20B2AA;
            --light-green: #90EE90;
            --dark-green: #006400;
            
            /* Warna Aksen - Gradasi Coklat Tanah */
            --brown-gradient: linear-gradient(135deg, #8B4513, #A0522D, #CD853F);
            --accent-brown: #8B4513;
            --light-brown: #DEB887;
            --warm-brown: #D2691E;
            
            /* Warna Netral Modern */
            --text-dark: #2C3E50;
            --text-light: #7F8C8D;
            --bg-light: #F8F9FA;
            --bg-warm: #FFF8DC;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, 
                rgba(46, 139, 87, 0.1) 0%, 
                rgba(60, 179, 113, 0.05) 50%, 
                rgba(32, 178, 170, 0.1) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-y: auto;
            padding: 2rem 0;
        }

        /* Animated Background Elements */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        /* Floating Geometric Shapes */
        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: floatShapes 20s infinite linear;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
            background: linear-gradient(45deg, #2E8B57, #3CB371);
            box-shadow: 0 0 20px rgba(46, 139, 87, 0.3);
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 10%;
            animation-delay: 2s;
            background: linear-gradient(45deg, #3CB371, #20B2AA);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            box-shadow: 0 0 25px rgba(60, 179, 113, 0.3);
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
            background: linear-gradient(45deg, #20B2AA, #90EE90);
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            box-shadow: 0 0 15px rgba(32, 178, 170, 0.3);
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            bottom: 30%;
            right: 20%;
            animation-delay: 6s;
            background: linear-gradient(45deg, #90EE90, #2E8B57);
            border-radius: 40% 60% 60% 40% / 60% 30% 70% 40%;
            box-shadow: 0 0 22px rgba(144, 238, 144, 0.3);
        }

        .shape:nth-child(5) {
            width: 70px;
            height: 70px;
            top: 50%;
            left: 5%;
            animation-delay: 8s;
            background: linear-gradient(45deg, #2E8B57, #20B2AA);
            border-radius: 50% 50% 50% 50% / 40% 40% 60% 60%;
            box-shadow: 0 0 18px rgba(46, 139, 87, 0.3);
        }

        .shape:nth-child(6) {
            width: 90px;
            height: 90px;
            top: 60%;
            right: 5%;
            animation-delay: 10s;
            background: linear-gradient(45deg, #3CB371, #90EE90);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            box-shadow: 0 0 20px rgba(60, 179, 113, 0.3);
        }

        /* Animated Particles */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: linear-gradient(135deg, #2E8B57, #3CB371, #20B2AA);
            border-radius: 50%;
            animation: particleFloat 15s infinite linear;
            box-shadow: 0 0 10px rgba(46, 139, 87, 0.3);
        }

        .particle:nth-child(odd) {
            background: linear-gradient(135deg, #3CB371, #20B2AA, #90EE90);
            box-shadow: 0 0 8px rgba(60, 179, 113, 0.4);
        }

        .particle:nth-child(even) {
            background: linear-gradient(135deg, #20B2AA, #2E8B57, #3CB371);
            box-shadow: 0 0 12px rgba(32, 178, 170, 0.3);
        }


        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(1deg); }
            66% { transform: translateY(10px) rotate(-1deg); }
        }

        @keyframes floatShapes {
            0% { 
                transform: translateY(0px) rotate(0deg) scale(1);
                opacity: 0.7;
            }
            25% { 
                transform: translateY(-30px) rotate(90deg) scale(1.1);
                opacity: 1;
            }
            50% { 
                transform: translateY(-60px) rotate(180deg) scale(0.9);
                opacity: 0.8;
            }
            75% { 
                transform: translateY(-30px) rotate(270deg) scale(1.05);
                opacity: 0.9;
            }
            100% { 
                transform: translateY(0px) rotate(360deg) scale(1);
                opacity: 0.7;
            }
        }

        @keyframes particleFloat {
            0% { 
                transform: translateY(100vh) translateX(0px) rotate(0deg);
                opacity: 0;
            }
            10% { 
                opacity: 1;
            }
            90% { 
                opacity: 1;
            }
            100% { 
                transform: translateY(-100px) translateX(100px) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes pulse {
            0%, 100% { 
                transform: scale(1);
                opacity: 0.8;
            }
            50% { 
                transform: scale(1.1);
                opacity: 1;
            }
        }

        /* Login Container */
        .login-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(46, 139, 87, 0.2);
            overflow: hidden;
            position: relative;
            z-index: 10;
            max-width: 450px;
            width: 100%;
            margin: 2rem auto;
            animation: slideUp 0.8s ease-out;
            min-height: fit-content;
        }

        /* Responsive adjustments */
        @media (max-height: 600px) {
            body {
                align-items: flex-start;
                padding-top: 1rem;
            }
            
            .login-container {
                margin: 1rem auto;
            }
        }

        /* Ensure scrolling works on all devices */
        @media (max-height: 500px) {
            body {
                padding: 0.5rem 0;
            }
            
            .login-container {
                margin: 0.5rem auto;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 1rem 0;
            }
            
            .login-container {
                margin: 1rem;
                border-radius: 15px;
            }
            
            .form-control {
                height: 50px;
                padding: 12px 15px 12px 45px;
                font-size: 0.95rem;
            }
            
            .input-icon {
                left: 15px;
                font-size: 1rem;
            }
            
            .password-toggle {
                right: 15px;
                width: 2rem;
                height: 2rem;
            }
            
            .password-toggle i {
                font-size: 0.9rem;
            }
            
            .form-label {
                font-size: 0.9rem;
            }
            
            .btn-login {
                padding: 12px 1.5rem;
                font-size: 1rem;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Header Section */
        .login-header {
            background: var(--primary-gradient);
            padding: 3rem 2rem 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 30% 30%, rgba(255,255,255,0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 70%, rgba(255,255,255,0.05) 0%, transparent 50%);
        }

        .login-header .icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #FFFFFF, #F0F8FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        .login-header h2 {
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .login-header p {
            opacity: 0.9;
            font-weight: 300;
        }

        /* Form Section */
        .login-form {
            padding: 2.5rem 2rem;
            position: relative;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            border: 2px solid #E9ECEF;
            border-radius: 15px;
            padding: 1rem 1rem 1rem 3rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--bg-light);
        }

        .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.2rem rgba(46, 139, 87, 0.25);
            background: white;
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: var(--text-light);
        }

        /* Password Input Container */
        .password-input-container {
            position: relative;
        }

        /* Input Icons */
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .form-control:focus + .input-icon {
            color: var(--primary-green);
        }

        /* Password Toggle Button */
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.3s ease;
            z-index: 3;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
        }

        .password-toggle:hover {
            color: var(--primary-green);
            background: rgba(46, 139, 87, 0.1);
        }

        .password-toggle:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(46, 139, 87, 0.25);
        }

        .password-toggle i {
            font-size: 1rem;
        }

        /* Alert Styles */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .alert ul {
            margin-bottom: 0;
        }

        /* Button Styles */
        .btn-login {
            background: var(--primary-gradient);
            border: none;
            border-radius: 15px;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(46, 139, 87, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        /* Demo Credentials */
        .demo-credentials {
            background: linear-gradient(135deg, var(--bg-light), white);
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            border-left: 4px solid;
            border-image: var(--primary-gradient) 1;
        }

        .demo-credentials h6 {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .demo-credentials .credential-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            background: rgba(46, 139, 87, 0.05);
            border-radius: 8px;
        }

        .demo-credentials .credential-item:last-child {
            margin-bottom: 0;
        }

        .demo-credentials .label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .demo-credentials .value {
            font-family: 'Courier New', monospace;
            color: var(--primary-green);
            font-weight: 600;
        }

        /* Back to Website Link */
        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            color: var(--dark-green);
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-container {
                margin: 1rem;
                border-radius: 20px;
            }
            
            .login-header {
                padding: 2rem 1.5rem 1.5rem;
            }
            
            .login-form {
                padding: 2rem 1.5rem;
            }
            
            .login-header .icon {
                font-size: 3rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .loading.show {
            display: flex;
        }

        .spinner {
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .btn-login:disabled {
            opacity: 0.8;
            cursor: not-allowed;
            transform: none;
        }

        .btn-login:disabled:hover {
            transform: none;
            box-shadow: 0 5px 15px rgba(46, 139, 87, 0.3);
        }

        .btn-text {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .loading {
            transition: all 0.3s ease;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { 
                opacity: 1;
            }
            50% { 
                opacity: 0.7;
            }
        }

        .loading-text {
            animation: pulse 1.5s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <!-- Animated Background Elements -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <div class="particles" id="particles"></div>
    
    <div class="login-container">
        <!-- Header -->
        <div class="login-header">
            <div class="icon">
                <img src="{{ asset('FOTO/LOGO-removebg-preview.png') }}" alt="Logo Desa Tetembomua" height="60" class="mb-3">
            </div>
            <h2>Admin Panel</h2>
            <p>Desa Tetembomua</p>
        </div>

        <!-- Login Form -->
        <div class="login-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form id="loginForm" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email
                    </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock me-2"></i>Password
                    </label>
                    <div class="password-input-container">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda" required>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-login">
                    <span class="btn-text">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk</span>
                    </span>
                    <span class="loading">
                        <div class="spinner"></div>
                        <span class="loading-text">Memproses...</span>
                    </span>
                </button>
            </form>

            

            <!-- Back to Website -->
            <div class="back-link">
                <a href="{{ route('home') }}">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Website
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Form submission handling with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = this.querySelector('.btn-login');
            const btnText = btn.querySelector('.btn-text');
            const loading = btn.querySelector('.loading');
            
            // Prevent double submission
            if (btn.disabled) {
                e.preventDefault();
                return false;
            }
            
            // Show loading state with smooth transition
            btnText.style.opacity = '0';
            btnText.style.transform = 'translateY(-10px)';
            
            setTimeout(() => {
                btnText.style.display = 'none';
                loading.classList.add('show');
                loading.style.opacity = '0';
                loading.style.transform = 'translateY(10px)';
                
                // Animate loading in
                setTimeout(() => {
                    loading.style.opacity = '1';
                    loading.style.transform = 'translateY(0)';
                }, 50);
            }, 200);
            
            btn.disabled = true;
        });

        // Password toggle functionality
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });

        // Create dynamic particles
        const createParticle = () => {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            // Random size
            const size = Math.random() * 4 + 2;
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';
            
            // Random position
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = '100vh';
            
            // Random animation duration
            const duration = Math.random() * 10 + 10;
            particle.style.animationDuration = duration + 's';
            
            // Random delay
            particle.style.animationDelay = Math.random() * 5 + 's';
            
            document.getElementById('particles').appendChild(particle);
            
            // Remove particle after animation
            setTimeout(() => {
                if (particle.parentNode) {
                    particle.parentNode.removeChild(particle);
                }
            }, duration * 1000);
        };

        // Create particles periodically
        setInterval(createParticle, 800);
        
        // Create initial particles
        for (let i = 0; i < 10; i++) {
            setTimeout(createParticle, i * 200);
        }

        // Add interactive hover effects to shapes
        document.querySelectorAll('.shape').forEach(shape => {
            shape.addEventListener('mouseenter', function() {
                this.style.animationPlayState = 'paused';
                this.style.transform = 'scale(1.2)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            shape.addEventListener('mouseleave', function() {
                this.style.animationPlayState = 'running';
                this.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>