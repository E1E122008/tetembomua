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
            overflow: hidden;
        }

        /* Background Animation */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(46, 139, 87, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(60, 179, 113, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(32, 178, 170, 0.05) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(1deg); }
            66% { transform: translateY(10px) rotate(-1deg); }
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
            margin: 2rem;
            animation: slideUp 0.8s ease-out;
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

        /* Input Icons */
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            transition: all 0.3s ease;
        }

        .form-control:focus + .input-icon {
            color: var(--primary-green);
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
        }

        .loading.show {
            display: inline-block;
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
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
            <form id="loginForm">
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email
                    </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                    <i class="fas fa-envelope input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock me-2"></i>Password
                    </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda" required>
                    <i class="fas fa-lock input-icon"></i>
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
                        <i class="fas fa-sign-in-alt me-2"></i>Masuk
                    </span>
                    <span class="loading">
                        <div class="spinner me-2"></div>Memproses...
                    </span>
                </button>
            </form>

            <!-- Demo Credentials -->
            <div class="demo-credentials">
                <h6><i class="fas fa-info-circle me-2"></i>Demo Credentials</h6>
                <div class="credential-item">
                    <span class="label">Email:</span>
                    <span class="value">admin@desatetembomua.com</span>
                </div>
                <div class="credential-item">
                    <span class="label">Password:</span>
                    <span class="value">password123</span>
                </div>
            </div>

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
        // Form submission handling
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const btn = this.querySelector('.btn-login');
            const btnText = btn.querySelector('.btn-text');
            const loading = btn.querySelector('.loading');
            
            // Show loading state
            btnText.style.display = 'none';
            loading.classList.add('show');
            btn.disabled = true;
            
            // Simulate login process
            setTimeout(() => {
                // For demo purposes, redirect to admin dashboard
                window.location.href = '/admin';
            }, 2000);
        });

        // Add floating animation to background elements
        const createFloatingElement = () => {
            const element = document.createElement('div');
            element.style.position = 'absolute';
            element.style.width = Math.random() * 50 + 20 + 'px';
            element.style.height = element.style.width;
            element.style.background = `rgba(46, 139, 87, ${Math.random() * 0.1 + 0.05})`;
            element.style.borderRadius = '50%';
            element.style.left = Math.random() * 100 + '%';
            element.style.top = Math.random() * 100 + '%';
            element.style.pointerEvents = 'none';
            element.style.animation = `float ${Math.random() * 10 + 10}s ease-in-out infinite`;
            
            document.body.appendChild(element);
            
            setTimeout(() => {
                element.remove();
            }, 15000);
        };

        // Create floating elements periodically
        setInterval(createFloatingElement, 3000);
        
        // Create initial floating elements
        for (let i = 0; i < 5; i++) {
            setTimeout(createFloatingElement, i * 500);
        }
    </script>
</body>
</html>
