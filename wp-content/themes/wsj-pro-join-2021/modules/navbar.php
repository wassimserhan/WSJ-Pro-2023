<?php 
$nav_cta = get_field('nav_cta');
$nav_logo = get_field('nav_logo', get_option( 'page_on_front' ));
$nav_utag = get_field('nav_utag', get_option( 'page_on_front' ));
$dropdown_logo = get_field( 'dropdown_logo' )['url'];
$alt =  get_field( 'image' )['alt'];
$title = get_field( 'image' )['title'];

//Retrieve Product Logo from Parent Page
 if ( have_rows('main', $post->post_parent
) ):?>
<?php while( have_rows('main', $post->post_parent
) ): the_row();?>
<?php if ( get_row_layout() == 'hero_layout'): ?>
<?php $product_logo = get_sub_field( 'image_right', $post->post_parent )['url']; ?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif;?>




<!-- Main Nav -->
<nav class="nav">
  <div class="nav__dropdown hide-nav">
    <ul class="nav__dropdown-hub-items">
      <!-- Query products links from products relationshop field on Front Page-->
      <?php $frontpage_id = get_option('page_on_front'); ?>

      <?php if ( have_rows('main', $frontpage_id) ):?>
      <?php while( have_rows('main', $frontpage_id) ): the_row();?>
      <?php if ( get_row_layout() == 'products'): ?>
      <?php $products = get_sub_field( 'products');?>

      <?php foreach ($products as $product):?>
      <li><a href="<?php echo get_permalink($product)?>"><?php echo get_the_title($product)?></a></li>
      <?php endforeach ;?>

      <?php endif; ?>
      <?php endwhile; ?>
      <?php endif;?>
      <!-- End Query -->

    </ul>



    <!-- CTA -->
    <?php if ($nav_cta) {
    $link_target = $nav_cta['target'] ? $nav_cta['target'] : '_self';?>
    <button class="btn btn--dropdown" <?php echo $nav_utag; ?>>
      <a <?php echo get_field('bar_utag')?> id="<?php echo wsj_link_id( 'nav', $nav_cta['title'] ); ?>"
        class="btn--primary__link" href="<?php echo $nav_cta['url'] ?>"
        target="<?php echo $link_target; ?>"><?php echo $nav_cta['title'] ?></a>
    </button>
    <?php } ;?>

  </div>

  <div class="nav__content fixed">
    <!-- Hamburger -->
    <div class="hamburger hamburger--squeeze" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </div>
    <!-- Logo -->
    <div class="brand__container brand__container--fixed">
      <figure class="brand__container__fig">
        <a id="<?php echo wsj_link_id( 'header logo', 'home' ); ?>" class="brand__container__fig--a"
          href="<?php echo get_home_url(); ?>">


          <img class="brand__logo brand__logo--scroll"
            src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.svg" alt="WSJ Pro Logo" title="WSJ Pro"
            width="100%">
        </a>
      </figure>
    </div>
    <!-- CTA -->
    <?php if ($nav_cta) {
                            $link_target = $nav_cta['target'] ? $nav_cta['target'] : '_self';?>
    <button class="btn btn--primary btn--header" <?php echo $nav_utag; ?>>
      <a <?php echo get_field('bar_utag')?> id="<?php echo wsj_link_id( 'nav', $nav_cta['title'] ); ?>"
        class="btn--primary__link" href="<?php echo $_SERVER['REQUEST_URI'] ?><?php echo $nav_cta['url'] ?>"
        target="<?php echo $link_target; ?>"><?php echo $nav_cta['title'] ?></a>
    </button>
    <?php } ;?>
  </div>
</nav>




<!-- Subnav for Product Pages -->
<div class="nav__submenu-wrapper">
  <!-- Does not display in front page -->
  <?php 
    if(!is_front_page()) { ?>
  <div class="nav__submenu">
    <!-- Does not display Features if there are no pages -->
    <?php 
    if(has_children() OR $post->post_parent) { ?>
    <div class="nav__submenu-dropdown">
      <div onclick="utag.link({'event_name':'features'})" id="<?php echo wsj_link_id( 'nav', 'features' ); ?>"
        class="nav__submenu-items"><span class="triangle"></span>Features &
        Benefits</div>
      <div class="nav__submenu-overlay"></div>
      <div class="nav__submenu-items-dropdown">
        <!-- Query to display feature links and title on product page subnav -->
        <?php    
        $child_pages_query = array(
        'post_type'   => 'page',
        'post_parent' => $post->ID,
        'orderby'     => 'menu_order'
        );
       $child_pages = new WP_Query( $child_pages_query );
       if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post();?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php
        endwhile; endif;
        wp_reset_postdata();
        ?>
        <!-- End Query -->

        <!-- Add Custom nav items in features dropdown -->
        <?php
            if( have_rows('dropdown_items') ):
              while( have_rows('dropdown_items') ) : the_row();
                $item = get_sub_field('item'); 
                $external_url = get_sub_field('external_url');
                $internal_url = 
                // Splits nav item to echo first word to match section id of module
                $output = preg_split('/(@|,|;|&)/', $item);
                ?>

        <?php if ( $external_url) : ?>

        <a class="benefits_dropdown_items" href="<?php echo $external_url; ?>"><?php echo $item ?>
        </a>

        <?php else : ?>

        <a class="benefits_dropdown_items"
          href="<?php get_permalink()?>#<?php echo strtolower($output[0])?>"><?php echo $item ?></a>

        <?php endif ?>



        <?php endwhile;
          endif;
        ?>



        <!-- Another query to display feature links and title on feature page subnav -->

        <?php 
            if($post->post_parent) {
            wp_list_pages(array(
                'title_li' => NULL,
                'orderby' => 'menu_order',
                'child_of' => $post->post_parent,
            ));


        // Add Custom nav items in features dropdown
            if( have_rows('dropdown_items', $post->post_parent) ):
            while( have_rows('dropdown_items', $post->post_parent) ) : the_row();
            $item = get_sub_field('item'); 
            // Splits nav item to echo first word to match section id of module
                $output = preg_split('/(@|,|;|&)/', $item);

            $parentUri = get_permalink( $post->post_parent )
            ?>
        <a href="<?php echo $parentUri ?>#<?php echo strtolower($output[0])?>"><?php echo $item ?></a>
        <?php endwhile;
            endif; } ?>




      </div>
    </div>
    <?php } else { ?>

    <a onclick="utag.link({'event_name':'features'})" id="<?php echo wsj_link_id( 'nav', 'pricing'); ?>"
      class="nav__submenu-items" href="<?php echo $_SERVER['REQUEST_URI'] ?>#benefits">Benefits</a>
    <?php } ?>


    <a onclick="utag.link({'event_name':'features'})" id="<?php echo wsj_link_id( 'nav', 'pricing'); ?>"
      class="nav__submenu-items" href="<?php echo $_SERVER['REQUEST_URI'] ?>#pricing">Pricing</a>
    <a onclick="utag.link({'event_name':'features'})" id="<?php echo wsj_link_id( 'nav', 'other' ); ?>"
      class="nav__submenu-items" href="#contact">Contact</a>

  </div>
  <?php } ?>

  <!-- Display product logo on feature pages - checks if there is a parent id -->
  <?php
  if ( $post->post_parent ) { ?>
  <figure class="nav__submenu-fig">
    <a href="<?php echo get_permalink( $post->post_parent ); ?>">
      <img loading="lazy" src="<?php echo  $product_logo; ?>" alt="<?php echo $alt_product; ?>"
        title="<?php echo $title_product; ?>">
    </a>
  </figure>
  <?php } ?>

</div>