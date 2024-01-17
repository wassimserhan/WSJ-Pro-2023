<?php if(get_sub_field('popup_on')) {?>
<section class="popup-overlay">
  <aside id="popup" class="popup">
    <button class="popup-close">X</button>
    <img src="<?php echo get_sub_field("popup_image")['url']?>" alt="<?php echo get_sub_field("popup_image")['alt']?>"
      title="<?php echo get_sub_field("popup_image")['title']?>">
    <!-- CTA -->
    <?php 
            $ctaAction = get_sub_field( 'cta_action');
            $ctaText = get_sub_field( 'cta_text');
            $ctaUrl = get_sub_field( 'cta_url');;  
            ?>
    <button id="btn--popup" class="btn btn--popup"
      data-name="<?php echo strtolower(str_replace(' ', '', get_the_title()));?>"
      data-action="<?php echo $ctaAction ;?>" data-action="<?php echo $ctaUrl ;?>">
      <?php if($ctaAction === 'url') {?>
      <a class="btn--popup__link" href="<?php echo $ctaUrl ?>" target="_self"><?php echo $ctaText ?></a>
      <?php } ?>
      <?php if($ctaAction != 'url') {?>
      <?php echo $ctaText ?>
      <?php } ?>
    </button>


    <!-- CTA -->
  </aside>
</section>
<?php } ?>