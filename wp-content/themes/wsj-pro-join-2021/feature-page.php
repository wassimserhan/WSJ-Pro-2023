<?php /* Template Name: Feature Page */ ?>
<?php get_header(); ?>

<main class="main-container">

  <!-- Add feature page specific modules -->
  <?php if ( have_rows('features') ):?>
  <?php while( have_rows('features') ): the_row();?>

  <?php if ( get_row_layout() == 'feature'): ?>
  <?php get_template_part( 'modules/feature' ) ;?>
  <?php endif; ?>


  <?php endwhile; ?>
  <?php endif;?>

  <!-- Use exiting modules from parent product page -->
  <?php if ( have_rows('main', $post->post_parent
) ):?>
  <?php while( have_rows('main', $post->post_parent
) ): the_row();?>



  <?php if ( get_row_layout() == 'pricing'): ?>
  <?php get_template_part( 'modules/pricing' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'contact'): ?>
  <?php get_template_part( 'modules/contact' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'form_layout'): ?>
  <?php get_template_part( 'modules/form' ) ;?>
  <?php endif; ?>

  <?php endwhile; ?>
  <?php endif;?>



</main>


<?php get_footer(); ?>