<?php get_header(); ?>

<div class="main__inner">
    <section class="news">
        <?php
        $args = array(
            'post_type' => 'news',
            'posts_per_page' => 5,
            'paged' => $paged,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
        ?>
            <ul class="news__list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <li class="news__item">
                        <div class="news__date"><?php echo get_the_date(); ?></div>
                        <div class="news__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <?php endif; ?>
        <a href="<?php echo home_url(); ?>/news" class="news__archive-button">ニュース一覧</a>
    </section>

    <?php get_template_part('sec', 'service') ?>

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
        <a href="<?php echo home_url(); ?>/blog" class="blog__archive-button">ブログ一覧</a>
    </section>
</div>

<?php get_footer(); ?>