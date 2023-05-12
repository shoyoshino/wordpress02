<?php get_header(); ?>

<?php echo 'archive.php'; ?>

<div class="main__inner">
    <section class="news">
        <ul class="news__list">
            <?php while (have_posts()) : the_post(); ?>
                <li class="news__item">
                    <div class="news__date"><?php echo get_the_date(); ?></div>
                    <div class="news__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                </li>
            <?php endwhile; ?>
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