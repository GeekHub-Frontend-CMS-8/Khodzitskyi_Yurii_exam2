<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ghhw
 */

?>
<footer class="footer">

<div class="container">
    <?php
    if (get_theme_mod('footer_adress_set')) : ?>
        <p>
            <?php echo get_theme_mod('footer_adress_set');?>
        </p>
    <?php endif;?>
    <?php my_social_media_icons(); ?>
</div>
    <div class='scrolltop'>
        <div class='scroll icon'><i class="fa fa-4x fa-angle-up"></i></div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
