        <?php if(get_row_layout()=='contact'): 
        $section_name = get_sub_field( 'section_name');           
        $headline = get_sub_field( 'headline');
        $copy = get_sub_field( 'copy');
        $gray_bg = get_sub_field( 'gray_background' );
        ?>

        <section id="contact" class="contact" style="<?php if($gray_bg) echo 'background-color: #f1f1f1;'?>">
          <div class="contact__max-width">
            <h2 class="contact__headline"><?php echo $section_name ?></h2>
            <div class="contact__copy"><?php echo $copy ?></div>
          </div>
        </section>

        <?php endif ;?>