<?php get_header(); ?>
<?php get_template_part( 'modules/hero-info' ) ;?>
<?php get_template_part( 'modules/hero-stats' ) ;?>
<?php get_template_part( 'modules/hero-overlay' ) ;?>
<?php get_template_part( 'modules/hero-info_horizontal' ) ;?>
<section class="error-404">
    <!-- <canvas id="errorCanvas"></canvas> -->
    <h1>404 ERROR (Page Not Found)</h1>
    <h2>Uh oh! I'm afraid you've found a page that doesn't really exist. That can happen when you follow a link to
        something that has since been deleted. Or the link was incorrect to begin with. </h2>

    <h1>To go back, please click <a href="<?php echo get_home_url(); ?>/">HERE</a></h1>
</section>
<?php get_footer(); ?>