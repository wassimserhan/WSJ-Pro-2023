      <?php  
        $headline = get_sub_field( 'headline');
        $details = get_sub_field( 'details');
        $copy = get_sub_field( 'details');
        $cta = get_sub_field( 'cta');
        
        $product_logo = get_sub_field( 'image_right' )['url'];
        $alt_product =  get_sub_field( 'image_right' )['alt'];
        $title_product = get_sub_field( 'image_right' )['title'];

        $product_logo_stacked = get_sub_field( 'image_right_stacked' )['url'];
        $alt_product_stacked =  get_sub_field( 'image_right_stacked' )['alt'];
        $title_product_stacked = get_sub_field( 'image_right_stacked' )['title'];

        $hero_packshot = get_sub_field( 'hero_packshot' )['url'];
        $alt_packshot=  get_sub_field( 'hero_packshot' )['alt'];
        $title_packshot= get_sub_field( 'hero_packshot' )['title'];
        $gray_bg = get_sub_field( 'gray_background' );
        ?>


      <section id="<?php echo get_sub_field('section_id');?>" class="hero-info"
        style="<?php if($gray_bg) echo 'background-color: #f1f1f1;'?>">
        <div class="hero-info__card">
          <figure class="hero-info__fig-packshot">
            <img loading="lazy" src="<?php echo  $hero_packshot; ?>" alt="<?php echo $alt_packshot; ?>"
              title="<?php echo $title_packshot; ?>">
          </figure>

          <article class="hero-info__detail" style="<?php echo get_sub_field('margin_top')?>">
            <figure class="hero-info__fig-info">
              <img class="hero-info__fig-info-horizontal" loading="lazy" src="<?php echo  $product_logo; ?>"
                alt="<?php echo $alt_product; ?>" title="<?php echo $title_product; ?>">

              <img class="hero-info__fig-info-mobile" loading="lazy" src="<?php echo  $product_logo_stacked; ?>"
                alt="<?php echo $alt_product_stacked; ?>" title="<?php echo $title_product_stacked; ?>">

            </figure>
            <h1 class="hero-info__headline"><?php echo $headline ?></h1>
            <div class="hero-info__description"><?php echo nl2br ($details) ?></div>

            <!-- CTA -->
            <?php if ($cta) {
                            $link_target = $cta['target'] ? $cta['target'] : '_self';?>
            <button class="btn btn--hero">
              <a <?php echo get_sub_field('hero_utag')?> class="btn--hero__link" href="<?php echo $cta['url'] ?>"
                target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a>
            </button>
            <?php } ;?>

            <!-- CTA -->

          </article>
        </div>
      </section>