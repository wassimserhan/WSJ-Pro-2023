      <?php if(get_row_layout()=='hero_hub'): 
        $select = get_sub_field( 'select_layout');
        $headline = get_sub_field("headline");
        $details = get_sub_field("details");
        $copy = get_sub_field("copy");
        $cta = get_sub_field( 'cta');
        $stats = get_sub_field( 'stats');
        $hero_image = get_sub_field( 'image' )['sizes']['large'];
        $alt =  get_sub_field( 'image' )['alt'];
        $title = get_sub_field( 'image' )['title'];
        $hero_image_right = get_sub_field( 'image_right' )['sizes']['large'];
        $alt_r =  get_sub_field( 'image' )['alt'];
        $title_r = get_sub_field( 'image' )['title'];
        ?>


      <section id="<?php echo get_sub_field('section_id');?>" class="hero-hub">
        <figure class="hero-hub__fig">
          <img loading="lazy" src="<?php echo $hero_image; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>">
          <div
            style="background-color: rgba(<?php echo get_sub_field('rgb_color')?>, <?php echo get_sub_field('opacity')?>)"
            class="hero-hub__overlay">

            <article class="hero-hub__overlay-text" style="">
              <div>
                <h1 class="hero-hub__headline hero-hub__headline--overlay"><?php echo $headline; ?>
                </h1>

                <h2 class="hero-hub__date hero-hub__date--overlay"><?php echo nl2br($details)?></h2>
                <p class="hero-hub__overlay-intro"><?php echo nl2br($copy); ?></p>
                <?php if ($cta) { ?>
                <button class="btn btn--hero-hub"> <a <?php echo get_sub_field('hero_utag')?>
                    class="btn--hero-hub__link" href="<?php echo $cta['url'] ?>"
                    target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a></button>
                <?php } ;?>
              </div>
            </article>
        </figure>
      </section>
      <?php endif; ?>