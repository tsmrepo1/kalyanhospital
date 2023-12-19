<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kalyanhospital
 */

get_header();
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
   <div class="inner__about">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
               <div class="left__panel">
                  <ul id="navi__holder">
                     <?php
                     $argsPatientCare = array (
                     'post_type'              => 'patient_care',
                     'post_status'            => 'publish',
                     'order'                  => 'ASC',
                     'posts_per_page'         => -1
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
                  <?php 
                  if ( has_post_thumbnail() ) {
                      the_post_thumbnail('full', array( 'class' => 'w-100' ));
                  }
                  ?>
                  <h3><?php the_title(); ?></h3>
               </div>

               <?php if( get_field('registration', $post_id) == 'Yes' ): ?>
                  <?php if(!empty(the_field('registration_content', $post_id))){ ?>
                  <div class="registration__holder">
                     <?php echo the_field('registration_content', $post_id); ?>
                  </div>
                  <?php } ?>
               <?php endif; ?>

               <?php if( get_field('admission', $post_id) == 'Yes' ): ?>
                  <?php if(!empty(the_field('admission_content', $post_id))){ ?>
                  <div class="registration__holder">
                     <?php echo the_field('admission_content', $post_id); ?>
                  </div>
                  <?php } ?>
               <?php endif; ?>

               <?php if( get_field('payment_deposit', $post_id) == 'Yes' ): ?>
                  <?php if(!empty(the_field('payment_deposit', $post_id))){ ?>
                  <div class="registration__holder">
                     <?php echo the_field('payment_deposit', $post_id); ?>
                  </div>
                  <?php } ?>
               <?php endif; ?>

               <?php if( get_field('consent_section', $post_id) == 'Yes' ): ?>
                  <?php if(!empty(the_field('consent_section_content', $post_id))){ ?>
                  <div class="registration__holder">
                     <?php echo the_field('consent_section_content', $post_id); ?>
                  </div>
                  <?php } ?>
               <?php endif; ?>


               
            </div>
         </div>
      </div>
   </div>
</div>
<?php
get_footer();
