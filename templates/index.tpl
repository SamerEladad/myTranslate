<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Countdown bar to show the remaining time until some event -->
    <div class="countdown-bar"></div>
    <!-- Page content container -->
    <div class="page-content">
        <div class="container center-container">
            <div class="container card-container bounce">
                <!-- Card to show the welcome message -->
                <div class="card custom-card default-card">
                    <h1 class="title">Welcome to {$app_name}!</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include custom Scripts -->
    <script src="assets/js/backgroundEffect.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
