<?php get_header(); ?>

<div class="container-fluid flex-grow pt-4">
  <div class="row">

      <div class="col-lg-8">
        <ul class="list-unstyled">
          <!-- COUNT RESULTS -->
          <div class="results">
                  <?php
                  /* Search Count */
                  $allsearch = &new WP_Query("s=$s&showposts=-1"); 
                  $key = wp_specialchars($s, 1);
                  $count = $allsearch->post_count; 
                  wp_reset_query(); ?>

            </div>
            <!-- / COUNT RESULTS -->
          <?php if($allsearch->have_posts()) : ?>
          <?php while ($allsearch->have_posts()) : $allsearch->the_post(); ?>
            <li class="media">
              <?php the_post_thumbnail('thumbnail' , array(
                'class' => 'mr-3 d-none d-md-block'
              )); ?>
              <div class="media-body">
                <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-outline-info" role="button" aria-pressed="true">
                  Read more
                </a>
              </div>
            </li>
            <?php endwhile; ?>
            <?php else : ?>
            <h1 class="pt-5">Sorry, we found no results for <?php echo get_search_query(); ?></h1>
            <?php endif; ?>  
        </ul>
      
          <?php if (function_exists("roxy_pagination"))
            {
                roxy_pagination($the_query->max_num_pages);
            }
          ?> 
      
    </div> <!-- col8 -->

    <div class="col-lg-3 offset-lg-1">
        
          <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="form-inline my-2 my-lg-0 pt-3 pb-3">
            <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
          </form>


        <div class="sidecat">
          <?php if(is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
          <?php endif; ?>
        </div> <!-- sidecat -->
      
    
      </div><!-- col3 -->

  </div> <!-- row -->
</div> <!-- cont fluid-->

<?php get_footer(); ?>