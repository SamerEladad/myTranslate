<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Fulfillment</title>
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
        <div class="container">
        <div class="container card-container">
            {if isset($success)}
                <!-- Display success message -->
                <div class="alert alert-success redirect-to-teacher-landing" role="alert">
                    {$success} <a href="teacherLanding.inc.php">Go back to the main page.</a>
                </div>
            {else}
                <div class="card custom-card default-card square-card square-card bounce">
                    {if isset($error)}
                        <!-- Display error message -->
                        <div class="alert alert-danger" role="alert">
                            {$error} <a href="teacherLanding.inc.php">Go back to the main page.</a>
                        </div>
                    {/if}
                    <!-- Order fulfillment form -->
                    <form action="orderFulfillment.inc.php?order_id={$order.id}" method="post">
                        <input type="hidden" name="order_id" value="{$order.id}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="original_text">Original Text:</label>
                                <textarea class="form-control original-text" id="original_text" name="original_text" rows="15"
                                    readonly>{$order.source_text|default:''}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="translated_text">Translated Text:</label>
                                <textarea class="form-control" id="translated_text" name="translated_text" rows="15"
                                    required>{$order.translated_text|default:''}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="teacherLanding.inc.php" class="btn btn-primary">Back to Orders</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            {/if}
        </div>
    </div>

  <!-- Include custom Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/backgroundEffect.js"></script>
</body>

</html>