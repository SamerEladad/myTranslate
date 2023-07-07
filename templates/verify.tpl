<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        {if isset($success)}
            <!-- If account verification is successful -->
            <div class="alert alert-success redirect-to-login" role="alert">
                {$success} Click<a href="login.inc.php"> here</a> to log in.
            </div>
        {elseif isset($error)}
            <!-- If account verification fails -->
            <div class="alert alert-danger redirect-to-login" role="alert">
                {$error} <a href="login.inc.php">Go back to the login page.</a>
            </div>
        {else}
            <div class="alert alert-warning redirect-to-login" role="alert">
                Invalid request. <a href="login.inc.php">Go back to the login page.</a>
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