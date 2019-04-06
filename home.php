<?php /* Template Name: front page*/
get_header();
?>
<main class="homepage">
    <section class="container homepage__hero-section">
        <?php my_social_media_icons(); ?>
        <!--background block-->
        <div class="homepage__top-back-block"></div>
        <div class="homepage__hero-section__slider">
            <?php $args = array(
                    'post_type' => 'profiles',
                    'posts_per_page' => 4,
                ); ?>
            <?php $loop = new WP_Query($args); ?>
            <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div>
                    <div class="homepage__hero-section__slider__item">
                        <img src="<?php echo the_post_thumbnail_url()?>" alt="photo">
                        <div class="homepage__hero-section__slider__item__text">
                            <h2>
                                <?php echo get_the_title();?>
                            </h2>
                            <p>
                                <?php echo get_the_excerpt();?>
                            </p>
                        </div>
                        <a href="<?php echo get_the_permalink()?>" class="homepage__hero-section__slider__item__btn">
                            VIEW PROFILE
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>

            <?php else: ?>
                <h1>No posts here!</h1>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
    <section class="container homepage__news-section">
        <h2 class="container homepage__news-section__main-title">
            Latest News
        </h2>
        <div class="grid">
            <!--LOOP FOR NEWS-->
            <?php
            $args = array(
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => 12,
            );

            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                <div class="grid-item">
                    <a href="<?php echo get_the_permalink();?>" class="homepage__news-section__image">
                        <img src="<?php echo the_post_thumbnail_url();?>" alt="img">
                    </a>
                    <div class="homepage__news-section__text">
                        <a href="<?php echo get_the_permalink();?>" class="homepage__news-section__title">
                            <?php echo get_the_title();?>
                        </a>
                        <p class="homepage__news-section__date">
                            <?php echo get_the_date();?>
                        </p>
                    </div>
                </div>

            <?php
            endwhile;

            wp_reset_postdata();
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
