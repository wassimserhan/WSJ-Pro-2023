<?php if(get_row_layout()=='divider'): 
$dividerColor = get_sub_field( 'divider_color')
     ?>

<div class="section-divider" style="background-color: <?php echo $dividerColor; ?>; height: 25px;"></div>


<?php endif ;?>