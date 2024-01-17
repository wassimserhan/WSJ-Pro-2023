<?php /* Template Name: Page */ ?>
<?php get_header(); ?>
<main class="main-container pull-main">
  <?php if ( have_rows('main') ):?>
  <?php while( have_rows('main') ): the_row();?>
  <?php if ( get_row_layout() == 'hero_layout'): ?>
  <?php get_template_part( 'modules/hero' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'hero_hub'): ?>
  <?php get_template_part( 'modules/hero-hub' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'products'): ?>
  <?php get_template_part( 'modules/products' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'pricing'): ?>
  <?php get_template_part( 'modules/pricing' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'data_layout'): ?>
  <?php get_template_part( 'modules/data' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'benefits_layout'): ?>
  <?php get_template_part( 'modules/benefits' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'layout-with-form'): ?>
  <?php get_template_part( 'modules/layout-with-form' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'newsletters'): ?>
  <?php get_template_part( 'modules/newsletters' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'contact'): ?>
  <?php get_template_part( 'modules/contact' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'divider'): ?>
  <?php get_template_part( 'modules/divider' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'insight_layout'): ?>
  <?php get_template_part( 'modules/insight' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'form_layout'): ?>
  <?php get_template_part( 'modules/form' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'popup'): ?>
  <?php get_template_part( 'modules/popup' ) ;?>
  <?php endif; ?>

  <?php endwhile; ?>
  <?php endif;?>
</main>


<?php get_footer(); ?>