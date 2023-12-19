<?php
/**Template Name: Doctors Page
 */
get_header();
while ( have_posts() ) : the_post(); 
?>
<div class="main__body__wrapp main__body__wrapp__inner">
   <div class="banner__holder">
      <div class="main__banner header__banner__inner">
         <div class="image__box">
            <img alt="" src="<?php echo get_template_directory_uri();?>/assets/images/innerbanner.jpg" />
         </div>
         <div class="banner__content">
            <div class="banner__content__inner">
               <h1>Doctors</h1>
            </div>
         </div>
      </div>
   </div>
   

   <div class="doctor__select">
   <div class="container">
      <div class="row">
         <div class="select__all">
            <div class="atoz">
               <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Alphabetical Order
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="http://kalyanhospital.thinksurfmedia.com/php/doctors/doctors-category/?category=ASC">Short By ( A - Z )</a>
                     <a class="dropdown-item" href="http://kalyanhospital.thinksurfmedia.com/php/doctors/doctors-category/?category=DSC">Short By ( Z - A )</a>
                  </div>
               </div>
            </div>
            <div class="atoz">
               <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Select Department
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?php
                  $link = "http://kalyanhospital.thinksurfmedia.com/php/doctors/doctors-category/?category=";
                  $terms = get_terms(
                  array(
                  'taxonomy'   => 'doctors_category', 
                  'hide_empty' => false,
                  'order'      => 'asc'
                  )
                  );
                  foreach ($terms as $term) {
                  $cat_link = get_category_link($term->term_id);

                  $cat_link = $link.$term->name;
                  ?>
                  <a class="dropdown-item" href="<?php echo $cat_link; ?>"><?php echo $term->name; ?></a>
                  <?php  } ?>
                  </div>
               </div>
            </div>
            <div class="search__holder__blog doctor__search">
               <!-- <input type="text">
               <input type="submit"> -->
               <?php echo do_shortcode('[ivory-search id="368" title="AJAX Search Form"]');?>
            </div>
         </div>
      </div>
   </div>
</div>



   <div class="inner__doctor">
      <div class="container">
         <div class="row">
         <?php
         $argsDoctors = array (
         'post_type'              => 'doctors_management',
         'post_status'            => 'publish',
         'order'                  => 'ASC',
         'posts_per_page'         => -1
         );
         $bannerDoctors = new WP_Query( $argsDoctors );
         if ( $bannerDoctors->have_posts() ) {
         while ( $bannerDoctors->have_posts() ) {
         $bannerDoctors->the_post();
         $image1Doctors = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

         ?>
            <div class="col-sm-3">
               <div class="box__team">
                  <a href="<?php echo get_permalink(); ?>">
                     <img src="<?php echo the_field('profile_image', $post->ID); ?>" alt="" class="w-100">
                     <h4 class="mt-2 text-dark"><?php the_title(); ?></h4>
                     <p class="text-dark"><?php echo the_field('department_name', $post->ID); ?></p>
                     <img src="<?php echo get_template_directory_uri();?>/assets/images/button1.png" alt="">
                  </a>
               </div>
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
<?php endwhile; // End of the loop.
get_footer();

?>

