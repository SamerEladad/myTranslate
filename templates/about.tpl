<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Header section -->
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


<!-- Main section -->
<main>
    <div class="main-container">
        <div class="container">
            <!-- Loop through each member in the members array and display their information in a card -->
            <div class="about-card-container">
                {foreach $members as $member}
                <div class="card about-card mb-4">
                    <img src="{$member.image}" alt="{$member.name}" class="card-img-top member-image">
                    <div class="card-body">
                        <p class="card-text card-text-hover">Name: {$member.name}</p>
                        <p class="card-text card-text-hover">Matrikelnummer: {$member.id}</p>
                        <p class="card-text card-text-hover">
                            <a href="mailto:{$member.email}">Send Email</a>
                        </p>
                    </div>
                </div>
                {/foreach}
            </div>
        </div>
    </div>
</main>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include custom Scripts -->
    <script src="assets/js/backgroundEffect.js"></script>
</body>

</html>