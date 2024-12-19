
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIOLA - DINKES TEGAL</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e8f5e9; /* Warna latar belakang lebih segar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .container-login {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            margin: 0 20px;
            display: flex;
            flex-direction: row;
        }

        .login-left {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-left h2 {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #2e537d; /* Warna hijau */
        }

        .login-left p {
            font-size: 16px;
            margin-bottom: 40px;
            text-align: center;
            color: #555;
        }

        .login-left .form-control {
            border-radius: 25px;
            margin-bottom: 20px;
            padding: 15px 20px;
            font-size: 16px;
        }

        .login-left .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 25px;
            background-color: #384c8e; /* Hijau lebih gelap untuk tombol */
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        .login-left .forgot-password a {
            color: #38698e;
        }

        .login-right {
            width: 50%;
            background-color: #6690bb; /* Hijau cerah untuk kesan segar */
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 40px;
        }

        .login-right img {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
        }

        .login-right h3 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-right p {
            font-size: 16px;
            text-align: center;
            color: #f1f8e9;
        }

        @media (max-width: 768px) {
            .container-login {
                flex-direction: column;
                width: 90%;
            }

            .login-left,
            .login-right {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container-login">
        <!-- Left Section: Login Form -->
        <div class="login-left">
            <div style="text-align: center;">
                <img src="{{ asset('images/siola.png') }}" alt="logo" style="width: 180px; height: auto; ">
            </div>
            <!-- Error Message -->
            @if (session()->has('msgError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('msgError') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ url('/login') }}" method="post" onsubmit="return validateForm()">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="forgot-password">
                    <a href="/forgot-password">Lupa Password?</a>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Login</button>
            </form>
        </div>

        <!-- Right Section: Welcome Text -->
        <div class="login-right">
            <img src="{{ asset('backend/assets/img/kaiadmin/logodinkes.png') }}" alt="logo">
            <h3>Selamat Datang di SIOLA!</h3>
            <p>Mari bersama membangun kesehatan masyarakat yang lebih baik dengan sistem yang terintegrasi.</p>
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            console.log('Username:', username);
            console.log('Password:', password);

            if (username === "" || password === "") {
                alert('Username atau Password tidak boleh kosong.');
                return false;
            }
            return true;
        }

    </script>
</body>

</html>
