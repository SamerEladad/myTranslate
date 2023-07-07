<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Landing - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Header and navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-header">
            <div class="container">
                <a class="navbar-brand" href="{$header_brand_link}">myTranslate</a>
                <ul class="navbar-nav ml-auto">
                    {foreach $header_links as $link}
                        <a href="{$link.url}" class="nav-link">{$link.label}</a>
                    {/foreach}
                </ul>
            </div>
        </nav>
    </header>

    <!-- Marquee section -->
    <div class="marquee-container">
        <div class="marquee-content">
            <ul class="teacher-list">
                {foreach $topTeachers as $index => $teacher}
                    <li>
                        <span>
                            {if $index == 0}🏆 1st place:
                            {elseif $index == 1}🥈 2nd place:
                            {elseif $index == 2}🥉 3rd place:
                            {/if}
                            {$teacher['name']} (Points: {$teacher['points']})
                        </span>
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>

    <!-- Main content -->
    <main>
        <p class="points-card text-center"> Welcome, {$user_name}.</p>
        <div class="main-container">
            <!-- Success/error message -->
            {if isset($success) && $success !== null}
                <div class="alert alert-success redirect-to-student-landing" role="alert">
                    {$success} <a href="studentLanding.inc.php">Go back to the main page.</a>
                </div>
            {else}
                {if isset($error) && $error !== null}
                    <div class="alert alert-danger redirect-to-student-landing" role="alert">
                        {$error} <a href="studentLanding.inc.php">Go back to the main page.</a>
                    </div>
                {/if}
                <!-- Order details form -->
                <div class="container">
                    <div class="container card-container">
                        <div class="card custom-card default-card bounce">
                            <div class="card-body">
                                <h1 class="card-title mb-4">Order Details</h1>
                                <form id="createOrderForm" action="studentLanding.inc.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="from_language">From:</label>
                                            <!-- Language options -->
                                            <select class="form-control" id="from_language" name="from_language" required>
                                                <option value="">Select Language</option>
                                                <option value="English">English</option>
                                                <option value="German">German</option>
                                                <option value="Spanish">Spanish</option>
                                                <option value="French">French</option>
                                                <option value="Portuguese">Portuguese</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="to_language">To:</label>
                                            <!-- Language options -->
                                            <select class="form-control" id="to_language" name="to_language" required>
                                                <option value="">Select Language</option>
                                                <option value="English">English</option>
                                                <option value="German">German</option>
                                                <option value="Spanish">Spanish</option>
                                                <option value="French">French</option>
                                                <option value="Portuguese">Portuguese</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="source_text">Text:</label>
                                        <textarea class="form-control" id="source_text" name="source_text" rows="10"
                                            required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-accept">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
        </div>
    </main>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include custom Scripts -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/backgroundEffect.js"></script>
</body>

</html>