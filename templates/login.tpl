<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Main container for the login form -->
    <div class="container card-container center-container">
        <!-- If an error exists, display the error message and a link to go back to the login page -->
        {if isset($error) && $error !== null}
            <div class="alert alert-danger redirect-to-login" role="alert">
                {$error} <a href="login.inc.php">Go back to the login page.</a>
            </div>
        {else}
            <!-- Login form -->
            <div class="card custom-card default-card bounce">
                <h1 class="title">Login</h1>
                <!-- Post the form to the login.inc.php script -->
                <form action="login.inc.php" method="post">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <!-- Require a valid email address -->
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <!-- Require a valid password -->
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- Submit the form when the user clicks this button -->
                        <button type="submit" class="btn btn-primary">Login</button>
                        <!-- Links to register.inc.php and forgotPassword.inc.php pages -->
                        <div class="d-flex flex-column align-items-end">
                            <a href="register.inc.php" class="btn btn-link">Don't have an account?</a>
                            <a href="forgotPassword.inc.php" class="btn btn-link">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        {/if}
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include custom Scripts -->
    <script src="assets/js/backgroundEffect.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
