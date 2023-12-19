<?php
/**Template Name: Departments Page
 */
get_header();
while ( have_posts() ) : the_post(); 
$post_id = get_the_ID();
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
   <div class="inner__departmentslisting">
      <div class="container">
         <div class="row">

        
			 
			 
		<div class="departments__gridholder">
		<?php
         $argsDept = array (
         'post_type'              => 'hospital_departments',
         'post_status'            => 'publish',
         'order'                  => 'ASC',
         'posts_per_page'         => -1
         );
         $bannerDept = new WP_Query( $argsDept );
         if ( $bannerDept->have_posts() ) {
         while ( $bannerDept->have_posts() ) {
         $bannerDept->the_post();
         $image1Dept = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

         ?>
		  		<div class="departments__holder">
				  <a href="<?php echo get_permalink(); ?>">
					    <?php if($image1Dept != ''){ ?>
                  <img src="<?php echo $image1Dept['0']; ?>" alt="<?php the_title(); ?>" alt="" class="one__im">
                  <?php } else { ?>
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/no-image.jpg" alt="" class="w-100">
                  <?php } ?>
                  <div class="button__holder"><span class="car"><?php the_title(); ?></span> <span class="all__color">
				  <img src="<?php echo the_field('department_logo', $post->ID); ?>" alt=""></span></div>
				   </a>                
               </div>
		<?php }
           } else {
             ?>
             <?php  echo __( 'No Best Tours Department' );
           } wp_reset_postdata(); 
          ?>
			 
			 </div>	 
			 
			 
			 
			 
         </div>
      </div>
   </div>
</div>
<?php endwhile; // End of the loop.
get_footer();

?>

