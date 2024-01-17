<?php 
$select_layout = get_sub_field('select_layout');
$benefits_headline = get_sub_field('headline');
$number_of_benefits = count(get_sub_field("benefits"));
$flexWidth = $number_of_benefits <= 4 ? '869px' : '1150px';
$gray_bg = get_sub_field( 'gray_background' );


?>

<section id="benefits" class="benefits-section" style="<?php if($gray_bg) echo 'background-color: #f1f1f1;'?>">
  <div class="benefits-section__intro">
    <h2 class="benefits-section__headline">
      <?php echo $benefits_headline; ?>
    </h2>
  </div>
  <section class="benefits-section__wrapper" style="max-width:<?php echo $flexWidth ;?>">


    <?php 
    $benefits = get_sub_field('benefits');
    foreach($benefits as $benefit):
    ?> <?php 
    // Determine if a benefit is linkable and if a page link or external url
    $link = $benefit['page_link'] ? $benefit['page_link']  : $benefit['external_url'];
    if($benefit['page_link'] or $benefit['external_link']) { ?> <a style="color: #000" href="<?php echo $link ?>">
      <?php } ?>


      <article class="benefits-section__wrapper--article">
        <div class="benefits-section__wrapper--article__icon">
          <img class="lazyload benefits-section__wrapper--article__icon--img"
            data-src="<?php echo $benefit['image']['url']; ?>" alt="<?php echo $benefit['image']['alt']; ?>" />
        </div>
        <hr class="benefits-section__wrapper--article__line">
        <h3 class="benefits-section__wrapper--article__headline">
          <?php echo $benefit['title']; ?>
        </h3>
        <p class="benefits-section__wrapper--article__paragraph">
          <?php echo $benefit['description']; ?>
        </p>
      </article>
      <?php if(benefit['page_link'] or $benefit['external_link']) { ?>
    </a>
    <?php } ?>

    <?php endforeach;?>
  </section>
</section>