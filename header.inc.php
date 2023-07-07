<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-header">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $header_brand_link; ?>">myTranslate</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php foreach ($header_links as $link): ?>
                        <li class="nav-item">
                            <a href="<?php echo $link['url']; ?>" class="nav-link"><?php echo $link['label']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
