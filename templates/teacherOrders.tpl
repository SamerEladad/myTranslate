<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Orders - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
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
    <h1 class="mb-4 title">Teacher Orders</h1>
    <div class="container">
        <!-- Filter for orders -->
        <div class="filter-container">
            <label for="order-filter">Filter Orders:</label>
            <select id="order-filter">
                <option value="all">All Orders</option>
                <option value="fulfilled">Fulfilled Orders</option>
                <option value="unfulfilled">Unfulfilled Orders</option>
            </select>
        </div>
        <!-- Orders display -->
        {if isset($orders) && count($orders)}
            <div class="container orders-container">
                <div class="row">
                    {foreach $orders as $order}
                        <div class="order-item">
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="order-item">
                                    <div
                                        class="card custom-card bounce {if $order.status === 'completed'}fulfilled-card{else}pending-card{/if} scroll">
                                        <h5><strong>Order ID:</strong> {$order.id}</h5>
                                        <p><strong>Student:</strong> {$order.student_name}</p>
                                        <p><strong>From Language:</strong> {$order.source_language}</p>
                                        <p><strong>To Language:</strong> {$order.translated_language}</p>
                                        <p><strong>Status:</strong> {$order.status}</p>
                                        <p><strong>Created At:</strong> {$order.created_at}</p>
                                        {if $order.status !== 'completed'}
                                            <a href="orderFulfillment.inc.php?order_id={$order.id}" class="btn btn-pending">Accept
                                                Order</a>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        {else}
            <p>No orders found.</p>
        {/if}
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include custom Scripts -->
    <script src="assets/js/backgroundEffect.js"></script>
    <script src="assets/js/scrollingEffects.js"></script>
    <script src="assets/js/filterOrders.js"></script>

</body>

</html>