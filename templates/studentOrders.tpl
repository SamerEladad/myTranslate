<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Orders - {$app_name}</title>
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
  <h1 class="mb-4 title">Student Orders</h1>
  <div class="container">
    <!-- Filter orders dropdown -->
    <div class="filter-container">
      <label for="order-filter">Filter Orders:</label>
      <select id="order-filter">
        <option value="all">All Orders</option>
        <option value="fulfilled">Fulfilled Orders</option>
        <option value="unfulfilled">Unfulfilled Orders</option>
      </select>
    </div>
    <!-- Orders list -->
    {if isset($orders) && count($orders) > 0}
      <div class="container orders-container">
        {foreach $orders as $order}
          <div class="order-item">
            <div class="card custom-card bounce {if $order.translated_text}fulfilled-card{else}pending-card{/if} scroll">
              <h5><strong>Order ID:</strong> {$order.id}</h5>
              <p><strong>Created at:</strong> {$order.created_at}</p>
              <p><strong>Source text:</strong> {$order.source_text}</p>
              <p><strong>Source text language:</strong> {$order.source_language}</p>
              <p><strong>Translated text:</strong> {if $order.translated_text}{$order.translated_text}{else}pending{/if}</p>
              <p><strong>Translated text language:</strong> {$order.translated_language}</p>
              <p><strong>Translated by:</strong> {if $order.translated_text}{$order.teacher_name}{else}not assigned{/if}</p>
            </div>
          </div>
        {/foreach}
      </div>
    {else}
      <!-- No orders message -->
      <div class="d-flex justify-content-center align-items-center">
        <div class="card custom-card bounce">
          <p>No orders found.</p>
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
  <script src="assets/js/scrollingEffects.js"></script>
  <script src="assets/js/filterOrders.js"></script>

</body>

</html>