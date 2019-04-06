<?php
/* Template Name: contact us*/
get_header();?>

<main class="contact-us">
    <section class="container">
        <div class="contact-us__image-wrapper">
            <img src="<?php echo the_post_thumbnail_url();?>" alt="image">
            <h1>
                <?php echo get_the_title();?>
            </h1>
            <a href="<?php echo get_the_permalink()?>" class="homepage__hero-section__slider__item__btn contact-us__image-wrapper__btn">
                VIEW PROFILE
            </a>
        </div>
        <div class="contact-us__text-wrapper">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    //
                    // Post Content here
                    the_content();
                    //
                } // end while
            } // end if
            ?>
            <div class="contact-us__adresses-wrapper">
                <address class="contact-us__adresses-wrapper__item">
                    <i class="fa fa-home"></i>
                    <pre><?php echo get_theme_mod('contact_adress_set');?></pre>
                </address>
                <div class="contact-us__adresses-wrapper__item contact-us__adresses-wrapper__phones">
                    <i class="fa fa-phone"></i>
                    <ul>
                        <?php if(get_theme_mod('contact_phones_set1')) {?>
                            <li>
                                <a href="tel:<?php echo get_theme_mod('contact_phones_set1');?>">
                                    <?php echo get_theme_mod('contact_phones_set1');?>
                                </a>
                            </li>
                        <?php }?>
                        <?php if(get_theme_mod('contact_phones_set2')) {?>
                            <li>
                                <a href="tel:<?php echo get_theme_mod('contact_phones_set2');?>">
                                    <?php echo get_theme_mod('contact_phones_set2');?>
                                </a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="contact-us__adresses-wrapper__item contact-us__adresses-wrapper__phones__mail">
                    <i class="fa fa-envelope-o"></i>
                    <a href="mailto:<?php echo get_theme_mod('contact_mail_set');?>">
                        <?php echo get_theme_mod('contact_mail_set');?>
                    </a>
                </div>
            </div>
        </div>
        <div class="contact-us__right-absolute-block">

        </div>
    </section>
    <section class="container contact-us__newsletter-section">
        <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
        $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
        echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="logo">';?>

        <a href="#" class="contact-us__newsletter-section__newsletter">
            sign up our newsletter
            <i class="fa fa-envelope-o"></i>
        </a>
    </section>
</main>
<?php get_footer(); ?>
