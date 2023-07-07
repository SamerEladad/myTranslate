<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <div class="container center-container">
        <!-- Forgot password form -->
        {if isset($success)}
            <div class="alert alert-success redirect-to-login" role="alert">
                {$success} <a href="login.inc.php">Go back to the login page.</a>
            </div>
        {elseif isset($error)}
            <div class="alert alert-danger redirect-to-login" role="alert">
                {$error} <a href="login.inc.php">Go back to the login page.</a>
            </div>
        {/if}

        <!-- Forgot password form -->
        {if !isset($success) && !isset($error)}
            <div class="container card-container">
                <div class="card custom-card default-card bounce">
                    <h1 class="title">Forgot Password</h1>
                    <form action="forgotPassword.inc.php" method="post">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <div class="d-flex flex-column align-items-end">
                                <a href="register.inc.php" class="btn btn-link">Sign Up</a>
                                <a href="login.inc.php" class="btn btn-link">Log In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        {/if}
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include custom Scripts -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/backgroundEffect.js"></script>
</body>

</html>