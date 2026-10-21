<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Login & Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --gradient-start: #4338ca;
            --gradient-end: #312e81;
            --bg-gradient-start: #e0e7ff;
            --bg-gradient-end: #c7d2fe;
            --text-heading: #1e1b4b;
            --text-sub: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            text-decoration: none;
            list-style: none;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));
            padding: 20px;
        }

        .container {
            position: relative;
            width: 850px;
            height: 550px;
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(49, 46, 129, 0.15);
            overflow: hidden;
        }

        .container h1 {
            font-size: 32px;
            margin-bottom: 12px;
            color: var(--text-heading);
        }

        .container p {
            font-size: 13.5px;
            margin: 10px 0;
            color: var(--text-sub);
        }

        form {
            width: 100%;
        }

        .form-box {
            position: absolute;
            right: 0;
            width: 50%;
            height: 100%;
            background: #fff;
            display: flex;
            align-items: center;
            color: #333;
            text-align: center;
            padding: 40px;
            z-index: 1;
            transition: .6s ease-in-out 1.2s, visibility 0s 1s;
        }

        .container.active .form-box {
            right: 50%;
        }

        .form-box.register {
            visibility: hidden;
        }

        .container.active .form-box.register {
            visibility: visible;
        }

        .input-box {
            position: relative;
            margin: 18px 0;
        }

        .input-box input {
            width: 100%;
            padding: 12px 45px 12px 18px;
            background: #f8fafc;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            outline: none;
            font-size: 14px;
            color: #1e293b;
            font-weight: 500;
            transition: 0.3s;
        }

        .input-box input:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
        }

        .input-box input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        .input-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #94a3b8;
        }

        .input-box input:focus ~ i {
            color: var(--primary);
        }

        .forgot-link {
            margin: -6px 0 16px;
            text-align: right;
        }

        .forgot-link a {
            font-size: 13px;
            color: var(--primary);
            font-weight: 500;
        }

        .forgot-link a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            height: 46px;
            background: var(--primary);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
            border: none;
            cursor: pointer;
            font-size: 15px;
            color: #fff;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn:hover {
            background: var(--primary-hover);
        }

        .toggle-box {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .toggle-box::before {
            content: '';
            position: absolute;
            left: -250%;
            width: 300%;
            height: 100%;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border-radius: 150px;
            z-index: 2;
            transition: 1.8s ease-in-out;
        }

        .container.active .toggle-box::before {
            left: 50%;
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 2;
            transition: .6s ease-in-out;
            padding: 30px;
            text-align: center;
        }

        .toggle-panel h1 {
            color: #fff;
        }

        .toggle-panel p {
            color: #e0e7ff;
            margin-bottom: 20px;
        }

        .toggle-panel.toggle-left {
            left: 0;
            transition-delay: 1.2s;
        }

        .container.active .toggle-panel.toggle-left {
            left: -50%;
            transition-delay: .6s;
        }

        .toggle-panel.toggle-right {
            right: -50%;
            transition-delay: .6s;
        }

        .container.active .toggle-panel.toggle-right {
            right: 0;
            transition-delay: 1.2s;
        }

        .toggle-panel .btn {
            width: 160px;
            height: 44px;
            background: transparent;
            border: 2px solid #fff;
            box-shadow: none;
        }

        .toggle-panel .btn:hover {
            background: rgba(255, 255, 255, 0.18);
        }

        .msg-alert {
            padding: 8px 12px;
            font-size: 13px;
            border-radius: 6px;
            margin-bottom: 12px;
            text-align: left;
        }

        .msg-success {
            background: #dcfce7;
            color: #166534;
        }

        .msg-error {
            background: #fee2e2;
            color: #991b1b;
        }

        @media screen and (max-width: 650px) {
            .container {
                height: calc(100vh - 40px);
                max-width: 420px;
            }

            .form-box {
                bottom: 0;
                width: 100%;
                height: 70%;
            }

            .container.active .form-box {
                right: 0;
                bottom: 30%;
            }

            .toggle-box::before {
                left: 0;
                top: -270%;
                width: 100%;
                height: 300%;
                border-radius: 20vw;
            }

            .container.active .toggle-box::before {
                left: 0;
                top: 70%;
            }

            .container.active .toggle-panel.toggle-left {
                left: 0;
                top: -30%;
            }

            .toggle-panel {
                width: 100%;
                height: 30%;
            }

            .toggle-panel.toggle-left {
                top: 0;
            }

            .toggle-panel.toggle-right {
                right: 0;
                bottom: -30%;
            }

            .container.active .toggle-panel.toggle-right {
                bottom: 0;
            }
        }
    </style>
</head>
<body>

    <div class="container {{ $errors->has('register_error') || old('form_type') === 'register' ? 'active' : '' }}" id="authContainer">
        
        {{-- LOGIN FORM --}}
        <div class="form-box login">
            <form action="{{ route('student.login.submit') }}" method="POST">
                @csrf
                <h1>Login</h1>

                @if(session('success'))
                    <div class="msg-alert msg-success">{{ session('success') }}</div>
                @endif

                @if($errors->has('login_error'))
                    <div class="msg-alert msg-error">{{ $errors->first('login_error') }}</div>
                @endif

                <div class="input-box">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                    <i class='bx bxs-envelope'></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="forgot-link">
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        {{-- REGISTRATION FORM --}}
        <div class="form-box register">
            <form action="{{ route('student.register.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="form_type" value="register">
                <h1>Registration</h1>

                @if($errors->has('register_error'))
                    <div class="msg-alert msg-error">{{ $errors->first('register_error') }}</div>
                @endif

                <div class="input-box">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                    <i class='bx bxs-user'></i>
                </div>

                <div class="input-box">
                    <input type="email" name="email" value="{{ old('form_type') === 'register' ? old('email') : '' }}" placeholder="Email Address" required>
                    <i class='bx bxs-envelope'></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password (min. 6 characters)" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn">Register</button>
            </form>
        </div>

        {{-- SLIDING OVERLAY --}}
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn" type="button">Register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn" type="button">Login</button>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('authContainer');
        const registerBtn = document.querySelector('.register-btn');
        const loginBtn = document.querySelector('.login-btn');

        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
        });
    </script>
</body>
</html>