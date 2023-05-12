<?php get_header(); ?>

<?php echo 'archive.php'; ?>

<div class="main__inner">
    <section class="blog">
        <ul class="blog__list">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <li class="blog__item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog__thumbnail">
                                <?php if (has_post_thumbnail()) { ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php } else { ?>
                                    <img src="http://placehold.jp/300x300.png" alt="">
                                <?php } ?>
                            </div>
                            <div class="blog__text">
                                <div class="blog__title"><?php the_title(); ?></div>
                                <div class="blog__desc"><?php the_excerpt(); ?></div>
                            </div>
                        </a>
                    </li>
            <?php endwhile;
            endif; ?>
        </ul>
    </section>
    <div class="navigation">
        <?php if (function_exists('wp_pagenavi')) : ?>
            <?php wp_pagenavi(); ?>
        <?php else : ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>