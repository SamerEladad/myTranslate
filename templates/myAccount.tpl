<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Header and navigation -->
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark custom-header">
            <div class="container ">
                <a class="navbar-brand" href="{$header_brand_link}">myTranslate</a>
                <ul class="navbar-nav ml-auto">
                    {foreach $header_links as $link}
                        <li class="nav-item">
                            <a href="{$link.url}" class="nav-link">{$link.label}</a>
                        </li>
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
        <div class="main-container center-container">

            <!-- Success/error message -->
            {if isset($success)}
                <div class="alert alert-success redirect-to-my-account" role="alert">
                    {$success} <a href="myAccount.inc.php">Go back to My Account.</a>
                </div>
            {elseif isset($error)}
                <div class="alert alert-danger redirect-to-my-account" role="alert">
                    {$error} <a href="myAccount.inc.php">Go back to My Account.</a>
                </div>
            {else}

                <!-- User details form -->
                <div class="container">
                    <div class="container card-container">
                        <div class="card custom-card default-card bounce">
                            <div class="card-body">
                                <h1 class="card-title mb-4">Account Details</h1>
                                <form id="updateAccountForm" action="myAccount.inc.php" method="post">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input class="form-control" id="name" name="name" type="text" value="{$user.name}"
                                            required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input class="form-control" id="email" name="email" type="email"
                                            value="{$user.email}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="language">Language:</label>
                                        <input class="form-control" id="language" name="language" type="text"
                                            value="{$user.language_name}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password:</label>
                                        <input class="form-control" id="password" name="password" type="password" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm New Password:</label>
                                        <input class="form-control" id="confirm_password" name="confirm_password"
                                            type="password" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" id="editButton" class="btn btn-secondary">Edit</button>
                                        <button type="button" id="cancelButton" class="btn btn-danger"
                                            style="display: none;">Cancel</button>

                                        <button type="submit" id="updateButton" class="btn btn-accept"
                                            style="display: none;">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            {/if}

        </div>
    </main> <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include custom Scripts -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/backgroundEffect.js"></script>
</body>

</html>