<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <nav class="nav">
                <ul class="nav__list">
                    <li class="nav__item"><a href="<?php echo home_url(); ?>" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="<?php echo home_url(); ?>/service" class="nav__link">Service</a></li>
                    <li class="nav__item"><a href="<?php echo home_url(); ?>/blog" class="nav__link">Blog</a></li>
                    <li class="nav__item"><a href="<?php echo home_url(); ?>/company" class="nav__link">Company</a></li>
                    <li class="nav__item"><a href="<?php echo home_url(); ?>/contact" class="nav__link">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="first-view">
            <div class="first-view__inner">
                <?php if (is_front_page()) { ?>
                    <div class="first-view__text">
                        今までになかった<br />
                        感動体験を
                    </div>
                <?php } elseif (is_page(5)) { ?>
                    <div class="first-view__text">Service</div>
                <?php } elseif (is_page(11)) { ?>
                    <div class="first-view__text">Contact</div>
                <?php } elseif (is_page(9)) { ?>
                    <div class="first-view__text">Company</div>
                <?php } elseif (is_post_type_archive('news') || is_singular('news')) { ?>
                    <div class="first-view__text">News</div>
                <?php } elseif (is_archive() || is_single()) { ?>
                    <div class="first-view__text">Blog</div>
                <?php } else {
                }; ?>
            </div>
        </div>