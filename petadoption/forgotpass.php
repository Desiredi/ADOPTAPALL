<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Adoptapal</title>
    <link rel="stylesheet" href="signin-styles.css">
</head>
<body>
    <main>
        <div>
            <section class="login-section">
                <h2>Reset Your Password</h2>
                <p>Enter your email address, and we'll send you a link to reset your password.</p>

                <form action="forgotpass.php" method="post">
                    <label for="email">Email:</label>
                    <input type="text" id="text" name="text" placeholder="Enter your email" required>
                    <button type="submit">Send Reset Link</button>
                </form>
                <div class="back-login">
                    <p><a href="login.php">Back to Login</a></p>
                </div>
            </section>
        </div>
    </main>
</body>
</html>