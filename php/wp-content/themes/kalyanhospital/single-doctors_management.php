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
               <h1>Doctors</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="inner__doctor">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
               <div class="big__image">
                  <img src="<?php echo the_field('profile_image', $post_id); ?>" alt="" class="w-100" />
                  <div class="otolaryngologists">
                     <h2><?php the_title(); ?></h2>
                     <p><?php echo the_field('department_name', $post_id); ?></p>
                     <div class="doctor__social footer__social">
                     <?php
                       while( have_rows('social_media_managment', $post_id) ) : the_row(); 
                        if(!empty(get_sub_field('media_link', $post_id))){
                     ?>
                        <a href="<?php echo get_sub_field('media_link', $post_id); ?>"><i class="fa-brands fa-<?php echo get_sub_field('media_icon_name', $post_id); ?>"></i></a>
                     <?php } endwhile; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7">
               <div class="dr__holder">
                  <h4><?php the_title(); ?></h4>
                  <p><?php echo the_field('profile_content', $post_id); ?></p>
               </div>
               <div class="faq__wrapp mt-3 pt-0">
                  <div class="accordion" id="faq">
                     <?php
                       $i=1;
                       while( have_rows('faq_managment', $post_id) ) : the_row(); 
                     ?>
                     <div class="card">
                        <div class="card-header" id="faqhead1">
                           <a href="#" class="btn btn-header-link di__cloblock" data-toggle="collapse" data-target="#faq<?php echo $i; ?>"
                              aria-expanded="true" aria-controls="faq<?php echo $i; ?>">
							   <div class="icon__faq"><img src="<?php echo get_template_directory_uri();?>/assets/images/bluedot.png" alt=""></div>
							   <div class="faq__text__holder">
								<?php echo get_sub_field('doctor_faq_question', $post_id); ?>   
							   </div>
							   
							</a>
                        </div>
                        <div id="faq<?php echo $i; ?>" class="collapse <?php if($i == 1){ ?>show<?php } ?>" aria-labelledby="faqhead<?php echo $i; ?>" data-parent="#faq">
                           <div class="card-body"><?php echo get_sub_field('faq_content', $post_id); ?></div>
                        </div>
                     </div>
                     <?php $i++; endwhile; ?>                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="bookanappointment">
      <div class="container">
         <div class="">
            <div class="col-sm-12">
               <h2>Book an Appointment</h2>
            </div>            
            <?php echo do_shortcode('[contact-form-7 id="41a4c9e" title="Dr Post Type Book an Appointment"]');?>       
         </div>
      </div>
   </div>
</div>
<?php
get_footer();
