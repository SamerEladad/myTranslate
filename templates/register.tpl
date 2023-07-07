<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Main container -->
    <div class="container center-container">
        <!-- If registration is successful, display a success message and a link to the login page -->
        {if isset($success) && $success !== null}
            <div class="alert alert-success text-center redirect-to-register" role="alert">
                {$success} <a href="login.inc.php">Go to the register page.</a>
            </div>
        {else}
            <!-- If an error exists, display the error message and a link to go back to the registration page -->
            {if isset($error) && $error !== null}
                <div class="alert alert-danger text-center redirect-to-register" role="alert">
                    {$error} <a href="register.inc.php">Go to the register page.</a>
                </div>
            {else}
                <!-- Registration form -->
                <div class="card custom-card default-card bounce register-card">
                    <h1 class="title">Register</h1>
                    <form action="register.inc.php" method="post" id="registrationForm">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Account Type:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">Choose...</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>
                        </div>
                        <!-- Optional language selection (for teachers), hidden by default -->
                        <div class="form-group" id="language-group" style="display: none;">
                            <label for="language">Language:</label>
                            <select class="form-control" id="language" name="language">
                                <option value="">Choose...</option>
                                <option value="English">English</option>
                                <option value="German">German</option>
                                <option value="Spanish">Spanish</option>
                                <option value="French">French</option>
                                <option value="Portuguese">Portuguese</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <!-- Link to go back to the login page if the user already has an account -->
                    <a href="login.inc.php" class="btn btn-link">Already have an account?</a>
                </div>
            {/if}
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