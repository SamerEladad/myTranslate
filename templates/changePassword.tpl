<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Main container -->
    <div class="container center-container">
        {if isset($success)}
            <div class="alert alert-success redirect-to-login" role="alert">
                {$success} <a href="login.inc.php">Go back to the login page.</a>
            </div>
        {elseif isset($error)}
            <div class="alert alert-danger redirect-to-login" role="alert">
                {$error} <a href="login.inc.php">Go back to the login page.</a>
            </div>
        {/if}

        {if !isset($success) && !isset($error)}
            <!-- Card container -->
            <div class="container card-container">
                <!-- Change password form -->
                <div class="card custom-card default-card bounce">
                    <h1 class="title">Change Password</h1>
                    <!-- Password change form -->
                    <form action="changePassword.inc.php?reset={$reset_code}" method="post">
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        {/if}
    </div>


    <!-- Include custom Scripts -->
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include custom scripts -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/backgroundEffect.js"></script>
</body>

</html>