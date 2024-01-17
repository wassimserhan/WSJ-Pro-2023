      <?php  
        $select = get_sub_field( 'select_layout');
        $headline = get_sub_field( 'headline');
        $details = get_sub_field( 'details');
        $copy = get_sub_field( 'details');
         $bullets = get_sub_field('bullets');
        $cta = get_sub_field( 'cta');
        $intro_copy = get_sub_field( 'intro_copy');
        $cta_intro = get_sub_field( 'cta_intro');
        $stats = get_sub_field( 'stats');
        $hero_image = get_sub_field( 'image' )['sizes']['large'];
        $alt =  get_sub_field( 'image' )['alt'];
        $title = get_sub_field( 'image' )['title'];
         $hero_image_right = get_sub_field( 'image_right' )['sizes']['large'];
         $alt_r =  get_sub_field( 'image' )['alt'];
        $title_r = get_sub_field( 'image' )['title'];
        $hero_pattern = get_sub_field( 'hero_pattern' )['sizes']['large'];
        $hero_packshot = get_sub_field( 'hero_packshot' )['sizes']['large'];
        $gray_bg = get_sub_field( 'gray_background' );
    
        ?>


      <section id="newsletters" class="newsletters" style="<?php if($gray_bg) echo 'background-color: #f1f1f1;'?>">

        <h1 class=" newsletters__headline"><?php echo $headline ?></h1>
        <div class="newsletters__card">

          <figure class="newsletters__fig-info">
            <img loading="lazy" src="<?php echo  $hero_image_right; ?>" alt="<?php echo $alt_r; ?>"
              title="<?php echo $title_r; ?>">
          </figure>

          <article class="newsletters__detail" style="<?php echo get_sub_field('margin_top')?>">

            <div class="newsletters__copy"><?php echo nl2br ($details) ?></div>

            <?php if($bullets): ?>


            <ol class="newsletters__bullet-list">
              <?php foreach ( $bullets as $bullet ): ?>
              <li class="newsletters__bullet">
                <?php if($bullet['bullet_title']) :?>
                <span class="newsletters__bullet-title"><?php echo $bullet['bullet_title'];?></span>

                <?php endif; ?>

                <?php echo $bullet['bullet'];?>
              </li>
              <?php endforeach;?>
            </ol>


            <?php endif; ?>



            <!-- CTA -->
            <?php if ($cta) {
                            $link_target = $cta['target'] ? $cta['target'] : '_self';?>
            <button class="btn btn--newsletters">
              <a <?php echo get_sub_field('hero_utag')?> class="btn--newsletters__link" href="<?php echo $cta['url'] ?>"
                target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a>
            </button>
            <?php } ;?>

            <!-- CTA -->

          </article>

        </div>


      </section>