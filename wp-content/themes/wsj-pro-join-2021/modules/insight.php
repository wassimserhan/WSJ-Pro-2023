<?php 
$headline = get_sub_field('headline');
$description = get_sub_field('description');
$bullets = get_sub_field('bullets');
$cta = get_sub_field('cta');
$gray_bg = get_sub_field( 'gray_background' );
$nav_item = get_sub_field( 'nav_item_name' );
?>

<section id="<?php echo $nav_item ?>" class="insight" style="<?php if($gray_bg) echo 'background-color: #f1f1f1;'?>">
  <section class="max-width">


    <h2 class="insight__headline">
      <?php echo $headline; ?>
    </h2>


    <section class="insight__wrapper">
      <article class="insight__wrapper--intro single-col-width center-text">
        <div class="insight__wrapper--article__paragraph">
          <?php echo $description; ?>
          <?php if($bullets): ?>
          <ol
            class="insight__wrapper--article__bullet-list <?php if (is_page('venture-capital') ) echo "insight__wrapper--article__bullet-list--vc" ;?> ">
            <?php foreach ( $bullets as $bullet ): ?>
            <li
              class="insight__wrapper--article__bullet <?php if (is_page('venture-capital') ) echo "insight__wrapper--article__bullet--vc" ;?>">
              <?php echo $bullet['bullet'];?>
            </li>
            <?php endforeach;?>
          </ol>
          <?php endif; ?>
        </div>
        <?php if($cta) { ?>
        <button class="btn btn--intro"> <a <?php echo get_sub_field('hero_utag')?> class="btn--hero__link"
            href="<?php echo $cta['url']; ?>"
            target="<?php echo $cta['target']; ?>"><?php echo $cta['title']; ?></a></button>
        <?php } ;?>
      </article>
    </section>

  </section>
</section>