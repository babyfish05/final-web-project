<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/final-web-project/style/auth.css">
    <script defer src="/final-web-project/js/auth.js"></script>
</head>
<body>

<div class="container" id="container">

    <!-- SIGN UP -->
    <div class="form-container sign-up">
        <form action="/final-web-project/controllers/authController.php?action=register" method="POST" autocomplete="off">
            <h1>Create Account</h1>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" autocomplete="off" required>
            <input type="password" name="password" placeholder="Password" autocomplete="new-password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>

    <!-- SIGN IN -->
    <div class="form-container sign-in">
        <form action="/final-web-project/controllers/authController.php?action=login" method="POST">
            <h1>Sign In</h1>
            <input type="email" name="email" placeholder="Email" autocomplete="off" required>
            <input type="password" name="password" placeholder="Password" autocomplete="new-password" required>
            <button type="submit">Sign In</button>

            <?php if(isset($_SESSION['error'])): ?>
                <p style="color:red; margin-top:10px;">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                </p>
            <?php endif; ?>
        </form>
    </div>

    <!-- TOGGLE PANEL -->
    <div class="toggle-container">
        <div class="toggle">

            <div class="toggle-panel toggle-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button id="signIn">Sign In</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button id="signUp">Sign Up</button>
            </div>

        </div>
    </div>

</div>

</body>
</html>
