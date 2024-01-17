<?php 
$select_layout = get_sub_field('select_layout');
$data_headline = get_sub_field('headline');
$background_color = get_sub_field('background_color');
$description = get_sub_field('description');
$image = get_sub_field( 'image' )['sizes']['large'];
$alt =  get_sub_field( 'image' )['alt'];
$cta = get_sub_field( 'cta' );
$gray_bg = get_sub_field( 'gray_background' );

?>

<section class="data-section" style="<?php if($gray_bg) echo 'background-color: #f1f1f1;'?>">
  <?php if($data_headline) : ?>
  <div class="data-section__intro">
    <h2 class="data-section__headline">
      <?php echo $data_headline; ?>
    </h2>
    <?php if($description) { ?>
    <article class="data-section__wrapper--intro single-col-width center-text">
      <div class="data-section__wrapper--intro__paragraph">
        <?php echo $description; ?>
      </div>
    </article>
    <?php } ?>

    <?php if($image) { ?>
    <img class="lazyload data-section__image-wide data-section__image" data-src="<?php echo $image; ?>"
      alt="<?php echo $alt; ?>" />
    <?php } ?>

  </div>
  <?php endif; ?>


  <section class="data-section__wrapper">

    <!-- Layout Choices -->


    <?php 
            if ($select_layout== 'columns'): ?>

    <?php 
                $columns = get_sub_field('columns');
                $column_text_align = get_sub_field('column_text_align');
                $text_align = 'left-text';
                if ($column_text_align == 'center') {
                    $text_align = 'center-text';
                }
                $custom_column_width = '';
                if (count($columns) == 1) {
                    $custom_column_width = 'single-col-width';
                }
                elseif (count($columns) == 2) {
                    $custom_column_width = 'two-col-width';
                }
                $column_option = get_sub_field('column_option');
                foreach($columns as $column):
                ?>

    <article class="data-section__wrapper--article <?php echo $custom_column_width; ?> <?php echo $text_align; ?>">



      <?php if ($column['image'] && $column_option == 'image'): ?>
      <div class="data-section__wrapper--article__icon">
        <img class="lazyload data-section__wrapper--article__icon--img"
          data-src="<?php echo $column['image']['url']; ?>" alt="<?php echo $column['image']['alt']; ?>" />
      </div>
      <?php endif; ?>
      <?php if ($column['title']): ?>
      <h3 class="data-section__wrapper--article__headline">
        <?php echo $column['title']; ?>
      </h3>
      <?php endif; ?>

      <p class="data-section__wrapper--article__paragraph">
        <?php echo $column['description']; ?>
      </p>

      <figure>
        <img class="lazyload data-section__image-wide" data-src="<?php echo $column['image_wide']['url']; ?>"
          alt="<?php echo $column['image_wide']['alt']; ?>" />
      </figure>


      <?php if($column['cta']['title']) { ?>
      <button class="btn btn--data"> <a <?php echo get_sub_field('hero_utag')?> class="btn--hero__link"
          href="<?php echo $column['cta']['url']; ?>"
          target="<?php echo $column['cta']['target']; ?>"><?php echo $column['cta']['title']; ?></a></button>
      <?php } ;?>



    </article>


    <?php endforeach;?>


    <?php endif; ?>




  </section>

  <?php if($cta) { ?>
  <button class="btn btn--data"> <a <?php echo get_sub_field('hero_utag')?> class="btn--hero__link"
      href="<?php echo $cta['url']; ?>"
      target="<?php echo $column['cta']['target']; ?>"><?php echo $cta['title']; ?></a></button>
  <?php } ;?>

</section>