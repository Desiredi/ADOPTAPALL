<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Adoptapal</title>
    <link rel="stylesheet" href="signin-styles.css">
    <link rel="icon" type="icon/x-icon" href="resources/Pawfect Pawtrails-4.png">
</head>
<body>
    <main>
        <div>
            <section class="login-section">
                <h2>Login to Your Account</h2>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php endif; ?>

                <form action="backend/loginaccess.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    
                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember-me" name="remember-me">
                            <label for="remember-me">Remember Me</label>
                        </div>
                        <a href="forgotpass.php">Forgot Password?</a>
                    </div>
                    
                    <button type="submit">Login</button>
                </form>
                
                <div class="signup-option">
                    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
