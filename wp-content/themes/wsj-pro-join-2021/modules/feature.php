      <?php  
        $headline = get_sub_field( 'headline');
        $description = get_sub_field( 'description');
        $bullets = get_sub_field( 'bullets');
        $copyUnderBullets = get_sub_field( 'copy_under_bullets');
        $callout= get_sub_field( 'callout');

        
        $product_logo = get_sub_field( 'image' )['url'];
        $alt_product =  get_sub_field( 'image' )['alt'];
        $title_product = get_sub_field( 'image' )['title'];

  

        $hero_packshot = get_sub_field( 'image' )['url'];
        $alt_packshot=  get_sub_field( 'image' )['alt'];
        $title_packshot= get_sub_field( 'image' )['title'];

        $background_color = get_sub_field('background_color');
        $benefits_gray_bg = get_sub_field('benefits_gray_bg');
        ?>


      <section id="<?php echo get_sub_field('section_id');?>" class="hero"
        style="background-color: <?php echo $background_color ;?>">
        <div class="features__card <?php if(get_sub_field('image_left')) echo 'features__card--reverse'?>">

          <article class="features__detail">
            <div style="<?php if(get_sub_field('shorten_max_width')) echo 'max-width:500px;'?>">

              <h1 class="features__headline"><?php echo $headline ?></h1>
              <div class="features__description"><?php echo nl2br ($description) ?></div>
              <!-- Display bullets -->
              <?php if( have_rows('bullets') ) { ?>
              <ul class="features__bullets">
                <?php while( have_rows('bullets') ) : the_row();
                $bullet = get_sub_field('bullet'); ?>
                <li class="features__bullet">
                  <?php echo $bullet ?>
                </li>
                <?php endwhile;
                ?>
              </ul>
              <?php } ?>


              <div class="features__description"><?php echo nl2br ($copyUnderBullets) ?></div>
            </div>
          </article>


          <figure class="features__fig-packshot">
            <img loading="lazy" src="<?php echo  $hero_packshot; ?>" alt="<?php echo $alt_packshot; ?>"
              title="<?php echo $title_packshot; ?>">
          </figure>
        </div>

        <!-- Display benefits-->
        <?php if( have_rows('benefits') ) { ?>
        <div style="padding: 30px 0;<?php if($benefits_gray_bg) echo ' background-color: #f1f1f1;'?>">
          <?php while( have_rows('benefits') ) : the_row();?>
          <div class="features__benefits <?php if(get_sub_field('image_left')) echo 'features__benefits--reverse'?>">
            <div style="width:100%">&nbsp;</div>
            <div class="features__benefit">
              <?php $benefit = get_sub_field('benefit'); 
              $b_description = get_sub_field('benefit_description'); 
              $carousel = get_sub_field('image_carousel')?>
              <div class="features__benefit-title"><?php echo $benefit ?></div>
              <div class="features__description" style="padding: 10px 30px 20px;"><?php echo $b_description ?></div>
            </div>

            <?php if( $carousel ) { ?>
            <div style="width:100%; padding:0 30px;">
              <!-- Flickity HTML init -->
              <div class="carousel">

                <?php 
                foreach($carousel as $carousel_image):
                  $c_image = $carousel_image['image']['url'];
                  $c_image_alt = $carousel_image['image']['alt'];
                ?>

                <div class="carousel-cell carousel-cell-single">
                  <img class="carousel-cell-image" alt="<?php echo $c_image_alt; ?>"
                    data-flickity-lazyload="<?php echo $c_image; ?>" />
                </div>

                <?php endforeach;?>

              </div>
            </div>
            <?php } else { ?>
            <?php $b_image = get_sub_field( 'image' )['url'];
            $b_alt=  get_sub_field( 'image' )['alt'];
            $b_image_title= get_sub_field( 'image' )['title'];?>
            <figure class="features__benefit-img">
              <img loading="lazy" src="<?php echo  $b_image; ?>" alt="<?php echo $b_alt; ?>"
                title="<?php echo $b_image_title; ?>">
            </figure>
            <?php } ?>
            <div style="width:100%">&nbsp;</div>
          </div>
          <?php endwhile;
          ?>
        </div>
        <?php } ?>

        <?php if($callout) {?>
        <aside class="features__callout">
          <p><?php echo $callout ?>
          </p>
        </aside>
        <?php } ?>
      </section>
