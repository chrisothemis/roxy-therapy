<?php get_header(); ?>
<div class="container-fluid flex-grow">
  <div class="row">
    <div class="col-lg-8 pl-0 ml-0 pt-3 center">
      <h1>Sorry, we found no results for <?php echo get_search_query(); ?></h1>
    </div> <!-- col 8-->

    <div class="col-lg-3 offset-lg-1">
      <div class="pl-3 justify-content-center">
        <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="form-inline my-2 my-lg-0 pt-3 pb-3">
          <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>


        <div class="sidecat pl-3 pt-3 mr-0">
          <?php if(is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
          <?php endif; ?>
        </div> <!-- sidecat -->

      </div> <!-- justify-content-center -->
    </div> <!-- col 3-->
    
  </div> <!-- row -->
</div> <!-- cont fluid -->

<?php get_footer(); ?>
