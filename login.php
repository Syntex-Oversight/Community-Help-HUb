<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Community Help Hub</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background:linear-gradient(135deg,#064635,#0b6b43);
        }

        .login-wrapper{
            width:100%;
            max-width:420px;
            padding:20px;
        }

        .login-card{
            background:#fff;
            border-radius:18px;
            padding:40px 35px;
            box-shadow:0 25px 60px rgba(0,0,0,.25);
            animation:fadeUp .6s ease;
        }

        @keyframes fadeUp{
            from{opacity:0;transform:translateY(20px)}
            to{opacity:1;transform:translateY(0)}
        }

        .login-title{
            text-align:center;
            margin-bottom:25px;
        }

        .login-title h2{
            color:#064635;
            margin-bottom:5px;
        }

        .login-title p{
            color:#777;
            font-size:14px;
        }

        .login-card label{
            font-weight:600;
            color:#333;
        }

        .login-card input{
            width:100%;
            padding:12px 14px;
            margin-top:6px;
            border-radius:10px;
            border:1px solid #ccc;
            outline:none;
            font-size:15px;
        }

        .login-card input:focus{
            border-color:#0b6b43;
        }

        .login-card .btn-login{
            width:100%;
            margin-top:25px;
            padding:14px;
            border:none;
            border-radius:12px;
            font-size:16px;
            font-weight:700;
            background:linear-gradient(90deg,#064635,#0b6b43);
            color:#fff;
            cursor:pointer;
            transition:.3s;
        }

        .login-card .btn-login:hover{
            opacity:.9;
            transform:translateY(-2px);
        }

        .error-msg{
            background:#ffe6e6;
            color:#b00000;
            padding:10px;
            border-radius:10px;
            text-align:center;
            margin-bottom:15px;
            font-size:14px;
        }

        .brand{
            text-align:center;
            margin-bottom:15px;
            font-weight:800;
            font-size:22px;
            color:#064635;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="brand">🌿 Community Help Hub</div>

        <div class="login-title">
            <h2>Welcome Back</h2>
            <p>Please login to continue</p>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="error-msg">Invalid email or password</div>
        <?php endif; ?>

        <form method="post" action="login_action.php">
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div style="margin-top:15px">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button class="btn-login">Login</button>
        </form>

    </div>
</div>

</body>
</html>
