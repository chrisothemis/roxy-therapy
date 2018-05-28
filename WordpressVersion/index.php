<?php get_header(); ?>

    <div class="container-fluid flex-grow pt-5">
      <div class="row p-3">

        <div class="col-lg-6">
          <div class="container animated bounceInLeft">
          
          <?php while(have_posts()) : the_post(); ?>
 
               <?php the_content(); ?>
    
          <?php endwhile ; ?>

          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="d-none d-md-block">
            <?php echo do_shortcode('[metaslider id="21"]'); ?>
          </div>
    </div> <!-- col slider-->
        
         
      </div> <!-- row -->

    </div> <!-- container-fluid-->

    <?php get_footer(); ?>