<?php echo 'page.php'; ?>

<?php get_header(); ?>

<div class="main__inner">
    <div><?php the_title(); ?></div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php the_content(); ?></div>
    <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>