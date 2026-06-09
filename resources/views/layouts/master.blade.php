 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTC | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --dark: #1b263b;
            --light: #f8f9fa;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        }
        
        body {
            display: flex;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            overflow: hidden;
        }
        
        .graphic-section {
            flex: 1.5;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        
        .graphic-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('../img/ntc.jpeg') center/cover no-repeat;
            filter: brightness(0.8);
            z-index: 1;
        }
        
        .graphic-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(67, 97, 238, 0.9) 0%, rgba(63, 55, 201, 0.8) 100%);
            z-index: 2;
            mix-blend-mode: multiply;
        }
        
        .graphic-content {
            position: relative;
            z-index: 3;
            color: white;
            padding: 2rem;
            max-width: 600px;
            text-align: center;
        }
        
        .graphic-content h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        .graphic-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .feature {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(5px);
            padding: 1rem 1.5rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            transition: transform 0.3s ease;
        }
        
        .feature:hover {
            transform: translateY(-5px);
        }
        
        .feature i {
            font-size: 1.5rem;
            color: var(--success);
        }
        
        .login-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            position: relative;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            position: relative;
            z-index: 2;
            overflow: hidden;
            transform: scale(1);
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.5s ease;
        }
        
        
        .login-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 0%, rgba(67, 97, 238, 0.03) 100%);
            z-index: -1;
            animation: rotate 15s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .logo img {
            height: 50px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-header h2 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .login-header p {
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark);
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .input-field {
            position: relative;
        }
        
        .input-field input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }
        
        .input-field input:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            background-color: white;
            outline: none;
        }
        
        .input-field i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            transition: color 0.3s ease;
        }
        
        .input-field input:focus + i {
            color: var(--primary);
        }
        
        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .remember-me input {
            accent-color: var(--primary);
        }
        
        .forgot-password a {
            color: var(--primary);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .forgot-password a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }
        
        .login-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        
        .login-btn:hover::before {
            left: 100%;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e0e0e0;
            margin: 0 1rem;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
            border: 1px solid #e0e0e0;
            color: #6c757d;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .social-btn.google:hover {
            color: #db4437;
            border-color: #db4437;
        }
        
        .social-btn.facebook:hover {
            color: #4267b2;
            border-color: #4267b2;
        }
        
        .social-btn.twitter:hover {
            color: #1da1f2;
            border-color: #1da1f2;
        }
        
        .signup-link {
            text-align: center;
            font-size: 0.95rem;
            color: #6c757d;
        }
        
        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .signup-link a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(67, 97, 238, 0.1);
            filter: blur(30px);
            animation: float 15s infinite linear;
        }
        
        .shape:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 200px;
            height: 200px;
            bottom: -50px;
            right: -50px;
            animation-delay: 3s;
            animation-duration: 20s;
        }
        
        .shape:nth-child(3) {
            width: 150px;
            height: 150px;
            top: 30%;
            right: 10%;
            animation-delay: 5s;
            animation-duration: 25s;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(50px, 50px) rotate(90deg); }
            50% { transform: translate(100px, 0) rotate(180deg); }
            75% { transform: translate(50px, -50px) rotate(270deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }
        
        @media (max-width: 992px) {
            body {
                flex-direction: column;
            }
            
            .graphic-section {
                flex: none;
                height: 300px;
            }
            
            .graphic-content {
                padding: 1.5rem;
            }
            
            .graphic-content h1 {
                font-size: 2rem;
            }
            
            .features {
                display: none;
            }
            
            .login-section {
                flex: none;
                padding: 1.5rem;
            }
            
            .login-container {
                padding: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 1.5rem;
            }
            
            .login-header h2 {
                font-size: 1.5rem;
            }
            
            .input-field input {
                padding: 0.8rem 0.8rem 0.8rem 2.5rem;
            }
            
            .options {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>


    @yield('content')


</body>
</html>