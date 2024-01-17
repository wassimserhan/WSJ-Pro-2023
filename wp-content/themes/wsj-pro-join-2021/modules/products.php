<?php 
  $products = get_sub_field( 'products');
?>
<section class="products">
  <section class="products__max-width">
    <h2 class="products__headline">Choose a Tool Tailored for Your Industry</h2>
    <div class="products__items">

      <?php if( $products ): ?>
      <?php foreach ($products as $product):
        $logo = get_field('logo', $product)['url'];
        $logo_alt =  get_sub_field( 'icon' )['alt'];
        $logo_title = get_sub_field( 'icon' )['title'];
        $copy = get_field('copy', $product);
        $cta = get_field('cta', $product);?>

      <div class="products__item">
        <figure class="products__logo">
          <img src="<?php echo $logo ;?>" alt="">
        </figure>
        <div class="products__copy">
          <?php echo $copy ;?>
        </div>
        <!-- CTA -->
        <div class="btn--container">

          <button class="btn btn--products btn--products-sign"
            data-name="<?php echo strtolower(str_replace(' ', '', get_the_title($product)));?>">Sign In</button>

          <?php if ($cta) {
          $link_target = $cta['target'] ? $cta['target'] : '_self';?>
          <button class="btn btn--products btn--products-learn">
            <a <?php echo get_sub_field('hero_utag')?> class="btn--products__link" href="<?php echo $cta['url'] ?>"
              target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a>
          </button>
          <?php } ;?>


        </div>
        <!-- CTA -->
      </div>
      <?php endforeach ;?>
      <?php endif;?>
    </div>

    <h2 class="products__contact">Questions or feedback? Email <a href="mailto:wsjprosupport@dowjones.com"
        class="products__contact--email">wsjprosupport@dowjones.com</a></h2>
  </section>
</section>