<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <title>Teacher Landing - {$app_name}</title>
</head>
<body>
    <!-- Header and Navigation -->
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

    <!-- Main Content -->
    <main>
    <p class="points-card text-center"> Welcome, {$user_name}. You currently have {$points} points!</p>     
        <div class="container">
            <div class="container card-container">
                <div class="card custom-card default-card bounce">
                    <div class="card-body">
                        <!-- Display order details if available -->
                        {if isset($orders[$current_order])}
                            <p><b>Order ID:</b> {$orders[$current_order].id}</p>
                            <p><b>Student:</b> {$orders[$current_order].student_name}</p>
                            <p><b>Original text language:</b> {$orders[$current_order].source_language}</p>
                            <p><b>Original text:</b></p>
                            <textarea class="form-control" rows="15" cols="40"
                                readonly>{$orders[$current_order].source_text}</textarea>
                                <div class="mt-3">
                                <a href="?prev=1&current_order={$current_order}"
                                    class="btn btn-prev {if $current_order == 0}disabled{/if}"><</a>
                                <a href="orderFulfillment.inc.php?order_id={$orders[$current_order].id}&accept=1"
                                    class="btn btn-accept">Accept Order</a>
                                <a href="?next=1&current_order={$current_order}"
                                    class="btn btn-next {if $current_order == $orders|@count - 1}disabled{/if}">></a>
                            </div>
                        {else}
                            <p>No orders found.</p>
                        {/if}
                    </div>
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