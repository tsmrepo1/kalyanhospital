<?php
/**Template Name: Patient Care Page
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
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
               <div class="left__panel">
                  <ul>
                     <?php
                     $argsPatientCare = array (
                     'post_type'              => 'patient_care',
                     'post_status'            => 'publish',
                     'order'                  => 'ASC',
                     'posts_per_page'         => 2
                     );
                     $bannerPatientCare = new WP_Query( $argsPatientCare );
                     if ( $bannerPatientCare->have_posts() ) {
                     while ( $bannerPatientCare->have_posts() ) {
                     $bannerPatientCare->the_post();
                     $image1PatientCare = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                     ?>
                     <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
                     <?php }
                     } else {
                     ?>
                     <?php  echo __( 'No Data Found' );
                     } wp_reset_postdata(); 
                     ?>
                  </ul>
               </div>
            </div>
            <div class="col-sm-12 col-sm-9 col-lg-9 col-xl-9">
               <div class="care__holder">
                  <!-- <img src="<?php echo get_template_directory_uri();?>/assets/images/bg__2.jpg" alt="" class="w-100" /> -->
                  <?php 
                  if ( has_post_thumbnail() ) {
                      the_post_thumbnail('full', array( 'class' => 'w-100' ));
                  }
                  ?>
               </div>
               <div class="registration__holder">
                  <?php the_content(); ?>
               </div>               
            </div>
         </div>
      </div>
   </div>
</div>
<?php endwhile; // End of the loop.
get_footer();

?>

