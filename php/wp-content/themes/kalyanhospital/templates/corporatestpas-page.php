<?php
/**Template Name: Corporates TPS Page
 */
get_header();
while ( have_posts() ) : the_post(); 
?>
<div class="main__body__wrapp main__body__wrapp__inner">
   <div class="banner__holder">
      <div class="main__banner header__banner__inner">
         <div class="image__box">
            <?php if( get_field('inner_banner_section', $post_id) ){ ?>
                <img alt="" src="<?php echo the_field('inner_banner_section', $post_id); ?>" />
            <?php }else{?>
                <img alt="" src="<?php echo get_template_directory_uri();?>/assets/images/innerbanner.jpg" />
            <?php } ?>
         </div>
         <div class="banner__content">
            <div class="banner__content__inner">
               <h1><?php the_title(); ?></h1>
            </div>
         </div>
      </div>
   </div>
   <div class="inner__about">
      <div class="container">
         <div class="row">
          <?php
            while( have_rows('corporates_tps') ) : the_row();
            if(!empty(get_sub_field('corporates_tps_image'))){ 
          ?>
            <div class="col-sm-12 col-md-3 col-lg-6 col-xl-2">
               <div class="logo__box">
                  <div class="logo__box__im">
                     <img src="<?php echo get_sub_field('corporates_tps_image'); ?>" alt="">
                  </div>
                  <div class="logo__box__text">
                     <?php echo get_sub_field('corporates_tps_title'); ?>
                  </div>
               </div>
            </div>
            <?php } ?>
          <?php endwhile; ?>           
         </div>
      </div>
   </div>
</div>

<?php endwhile; // End of the loop.
get_footer();

?>

