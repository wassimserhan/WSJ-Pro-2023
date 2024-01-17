       <?php if(get_row_layout()=='pricing'): 
         $section_name = get_sub_field( 'section_name');     
        $pricing_plans = get_sub_field( 'pricing_plans');
        $footnotes = get_sub_field( 'footnotes');
        $pricing_plan_count = count ($pricing_plans);
        $gray_bg = get_sub_field( 'gray_background' );
        ?>

       <section id="pricing" class="pricing" style="<?php if($gray_bg) echo 'background-color: #f1f1f1;'?>">
         <div class="pricing__max-width"">
         <h2 class=" contact__headline"><?php echo $section_name ?></h2>

           <!-- Desktop Bar -->
           <?php if( $pricing_plan_count > 1) : ?>
           <div class="pricing-bar">
             <?php $i=0; foreach ($pricing_plans as $post): ?>
             <?php setup_postdata($post);?>
             <div class="pricing-bar__option">
               <?php echo the_title(); ?>
             </div>
             <?php $i++ ;?>
             <?php wp_reset_postdata(); endforeach; ?>
           </div>
           <?php endif ;?>

           <!-- Mobile Dropdown -->
           <?php 
           $count = count( get_sub_field( 'pricing_plans' ) );
     

           ;?>

           <?php if ( $count > 1 ) { ;?>

           <div class="custom-select-wrapper">
             <div class="custom-select">
               <div class="custom-select__trigger"><span><?php echo get_sub_field( 'pricing_select_label' )?></span>
                 <div class="arrow-pricing"></div>
               </div>

               <div class="custom-options">
                 <?php $j=0; foreach ($pricing_plans as $post): ?>
                 <?php setup_postdata($post);?>
                 <span class="custom-option selected" value="<?php echo $j ;?>"> <?php echo the_title(); ?></span>

                 <?php $j++ ;?>
                 <?php wp_reset_postdata(); endforeach; ?>
               </div>
             </div>
           </div>

           <?php } ;?>



           <!-- Pricing Tiers -->
           <?php foreach ($pricing_plans as $post): ?>
           <?php setup_postdata($post);?>
           <div class="pricing-card">
             <?php 

             $numtiers = count (get_field( 'tier') );
               if ( have_rows('tier') ): 
                  while( have_rows('tier') ): the_row();
              
                  ?>

             <?php
            $pricing_utag = get_sub_field( 'pricing_utag' );

            ;?>

             <div class="pricing-card__item">
               <h3 class="pricing-card__title"> <?php echo get_sub_field('headline'); ?></h3>
               <div class="pricing-card__highlights">
                 <div class="pricing-card__fee-discount"><?php echo get_sub_field('strikethrough_price'); ?></div>
                 <?php if(get_sub_field('strikethrough_price')) {;?>
                 <hr class="pricing-card__line"><?php } ;?>
                 <div class="pricing-card__fee"><?php echo get_sub_field('price') ?></div>
                 <div class="pricing-card__detail"><?php echo get_sub_field('highlight') ?></div>

                 <div class="pricing-card__date"><?php echo get_sub_field('date') ;?></div>


               </div>


               <div class="pricing-card__benefits-wrapper">
                 <?php if ( have_rows('benefits') ): 
                   	while( have_rows('benefits') ): the_row();?>
                 <ul class="pricing-card__benefits">
                   <li class="pricing-card__benefit">
                     <?php echo get_sub_field( 'benefit' ) ?></li>
                 </ul>
                 <?php endwhile; endif; ?>
               </div>

               <!-- CTA -->
               <?php $cta = get_sub_field( 'cta');
                   if ($cta): ?>
               <?php $link_target = $cta['target'] ? $cta['target'] : '_self';?>
               <button data-name="<?php echo strtolower(str_replace(' ', '', get_the_title()));?>"
                 class="btn btn--pricing" <?php echo $pricing_utag; ?>>
                 <a class="btn-pricing" href="<?php echo $cta['url']; ?>"
                   target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a>
               </button>
               <?php endif ;?>

             </div>
             <?php endwhile; endif; ?>
           </div>
           <?php wp_reset_postdata(); endforeach; ?>

           <div class="pricing-card__footnotes">
             <?php echo nl2br($footnotes)?>

           </div>

         </div>

       </section>





       <?php endif ;?>