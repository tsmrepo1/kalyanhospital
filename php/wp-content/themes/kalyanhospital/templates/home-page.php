<?php
/**Template Name: Home Page
 * The template for displaying all single posts
 *
 *  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
get_header();
while ( have_posts() ) : the_post(); 
$post_id = get_the_ID();
?>
<div class="main__body__wrapp">
   <div class="banner__holder">
      <div class="container">
         <div class="row">
            <div class="main__banner">
               <div
                  class="theme_carousel owl-theme owl-carousel"
                  data-options='{"loop":true, "margin":25, "autoheight":true, "lazyload":true, "nav":false, "dots":true, "autoplay":true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'
                  >

                  <?php
                     while( have_rows('banner_management') ) : the_row(); 
                  ?>
                  <div class="slide-item">
                     <?php if(!empty(get_sub_field('slider_image'))){ ?>
                     <div class="image__box"><img src="<?php echo get_sub_field('slider_image'); ?>" alt="" /></div>
                     <?php } ?>
					 <?php if(!empty(get_sub_field('mobile_slider_image'))){ ?>
					  <div class="image__box_mobile"><img src="<?php echo get_sub_field('mobile_slider_image'); ?>" alt="" /></div>
					 <?php } ?>
					 
                  </div>
                  <?php endwhile; ?>            

               </div>
            </div>
         </div>
      </div>
   </div>

   <?php if( get_field('emergency_cases') == 'Yes' ): ?>
   <div class="bookapp__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
               <div class="form__wrapp">
                  <h1>Book An Appointment Today!</h1>                  
                     <?php echo do_shortcode('[contact-form-7 id="c415487" title="Book Appointment"]');?>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
               <div class="add__holder">
                  <h3>Emergency Cases</h3>
                  <div class="contact__info__wrapp">
                     <div class="phone__wrapp__holder">
                        <?php if( get_field('icon') ): ?>
                           <div class="icon__box">
                              <img src="<?php echo the_field('icon'); ?>" alt="">
                           </div>
                        <?php endif; ?>
                        <?php if( get_field('call_now_no') ): ?>
                           <div class="num__wrapp">
                              <p>CALL Now</p>
							   <a href="tel: <?php echo the_field('call_now_no'); ?>"><span> <?php echo the_field('call_now_no'); ?></span></a>
                           </div>
                        <?php endif; ?>
                     </div>
                  </div>
                  <?php if( get_field('call_now_content') ): ?>
                     <p><?php echo the_field('call_now_content'); ?></p>
                  <?php endif; ?>
                  <?php if( get_field('call_us_page_link') ): ?>
                  <a href="<?php echo the_field('call_us_page_link'); ?>" class="contact__us__mainpage">Contact Us</a>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>

   <?php if( get_field('department_excellence') == 'Yes' ): ?>
   <div class="department__excellence">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h2>Department of Excellence</h2>
            </div>
            <?php
			$department_of_excellence = get_field('department_of_excellence', $post_id);
			foreach( $department_of_excellence as $department ):
			 
			 $department_name = $department->post_title;
             $department_id = $department->ID;
			 
			 $argsDepartment = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE ID = $department_id" );
			 $departments_link = "http://kalyanhospital.thinksurfmedia.com/php/hospital_departments/";
			 $departmentsLink = $departments_link.$argsDepartment->post_name;

            ?>
            <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
               <div class="icon__wrapp">
                  <img src="<?php echo the_field('department_logo', $department_id); ?>" alt="">
                  <a href="<?php echo $departmentsLink; ?>"><?php echo $department_name; ?></a>
               </div>
            </div>
            <?php endforeach; ?>          
         </div>
      </div>
   </div>
   <?php endif; ?>


   <div class="healthcare">
      <div class="container">
         <div class="row">

            <?php if( get_field('a_great_place_of_medical_hospital') == 'Yes' ): ?>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
               <div class="text__holder">
                  <?php if( get_field('a_great_place_of_medical_hospital_content') ): ?>
                     <?php echo the_field('a_great_place_of_medical_hospital_content'); ?>
                  <?php endif; ?>
                  <?php if( get_field('about_us_page_link') ): ?>
                  <a href="<?php echo the_field('about_us_page_link'); ?>">Know More</a>
                  <?php endif; ?>
               </div>
            </div>
            <?php endif; ?>


            <div class="col-sm-6 col-md-12 col-lg-4 col-xl-4 d-sm-none d-lg-block">
               <div class="im__holder">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/img_2-1.webp" alt="">
               </div>
            </div>

            
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2">
               <?php
                 while( have_rows('collom_1') ) : the_row(); 
               ?>
               <div class="counter__holder">
                  <?php if(!empty(get_sub_field('collom_1_h3'))){ ?>
                     <h3><?php echo get_sub_field('collom_1_h3'); ?></h3>
                  <?php } ?>
                  <?php if(!empty(get_sub_field('collom_1_h4'))){ ?>
                  <h4><?php echo get_sub_field('collom_1_h4'); ?></h4>
                  <?php } ?>
               </div>
               <?php endwhile; ?>              
            </div>

            
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2">
               <?php
                 while( have_rows('collom_2') ) : the_row(); 
               ?>
               <div class="counter__holder <?php if(empty(get_sub_field('collom_2_h3'))){ ?>papa<?php } ?>">
                  <?php if(!empty(get_sub_field('collom_2_h3'))){ ?>
                     <h3><?php echo get_sub_field('collom_2_h3'); ?></h3>
                  <?php } ?>
                  <?php if(!empty(get_sub_field('collom_2_h4'))){ ?>
                  <h4 <?php if(empty(get_sub_field('collom_2_h3'))){ ?>class="papa"<?php } ?>><?php echo get_sub_field('collom_2_h4'); ?></h4>
                  <?php } ?>
               </div>
               <?php endwhile; ?> 
            </div>

             
         </div>
      </div>
   </div>

<?php if( get_field('about_us_section') == 'Yes' ): ?>
   <div class="about__holder">
      <div class="container">
         <div class="row">
            <?php if( get_field('about_us_video_link') ): ?>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <div class="video__wrapp">
                  <!-- <video width="100%" height="100%" controls>
                     <source src="<?php //echo get_template_directory_uri();?>/assets/images/MLB.mp4" type="video/mp4">
                  </video> -->
<!--  <iframe width="100%" height="100%" src="<?php echo the_field('about_us_video_link'); ?>"></iframe> -->
				   <div class="vpop" data-type="youtube" data-id="6xcG6ttMDVY" data-autoplay='true'>
					   <img src="<?php echo get_template_directory_uri();?>/assets/images/video__1.webp" alt="">
					   <i class="fa-solid fa-circle-play"></i>
				   </div>
				   
               </div>
            </div>
			 <div id="video-popup-overlay"></div>

			<div id="video-popup-container">
			  <div id="video-popup-close" class="fade">&#10006;</div>
			  <div id="video-popup-iframe-container">
				<iframe id="video-popup-iframe" src="<?php echo the_field('about_us_video_link'); ?>" width="100%" height="100%" frameborder="0"></iframe>
			  </div>
			</div>
            <?php endif; ?>
            <?php if( get_field('about_us_content') ): ?>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <div class="about__text">
                  <?php echo the_field('about_us_content'); ?>
				   <a href="<?php echo the_field('about_us_page_link'); ?>" class="learn__more">Know More</a>
               </div>
            </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <?php endif; ?>

   <?php if( get_field('below_abou_us_section') == 'Yes' ): ?>
   <div class="counter__one">
      <div class="container">
         <div class="row text-center">
            <?php
              while( have_rows('below_abou_us') ) : the_row();
               if(!empty(get_sub_field('below_abou_us_name'))){ 
            ?>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
               <div class="counter">
                  <h2 class="timer count-title count-number" data-to="<?php echo get_sub_field('below_abou_us_data_no'); ?>" data-speed="1500"></h2>
                  <p class="count-text"><?php echo get_sub_field('below_abou_us_name'); ?></p>
               </div>
            </div>
            <?php } endwhile; ?>
         </div>
      </div>
   </div>
   <?php endif; ?>

<?php if( get_field('testimonial_section') == 'Yes' ): ?>
   <div class="happy__patients">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h2>our happy patients</h2>
            </div>
            <div class="col-sm-12">
               <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 25, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "2" } , "1000":{ "items" : "3" }}}'>
                  <?php
                    while( have_rows('testimonial_managment', 126) ) : the_row(); 
                  ?>
                  <div class="slide-item">
                     <div class="testimonial__item">
                        <?php if(!empty(get_sub_field('review_content', 126))){ ?>
                        <div class="star__wrapp">
                           <ul>
                              <?php if( get_sub_field('rating_number', 126) == 1 ){ ?>
                              <li><i class="fa-solid fa-star"></i></li>
                              <?php } ?>
                              <?php if( get_sub_field('rating_number', 126) == 2 ){ ?>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <?php } ?>
                              <?php if( get_sub_field('rating_number', 126) == 3 ){ ?>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <?php } ?>
                              <?php if( get_sub_field('rating_number', 126) == 4 ){ ?>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <?php } ?>
                              <?php if( get_sub_field('rating_number', 126) == 5 ){ ?>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <li><i class="fa-solid fa-star"></i></li>
                              <?php } ?>
                           </ul>
                        </div>
                        <div class="testimonial-content">
                        <p><?php echo get_sub_field('review_content', 126); ?></p>
                         <a href="#" class="showLink">View More</a>
                       </div>
                        <?php } ?>
                        <div class="testimonial__item__bottom">
                           <div class="title">
                              <?php if(!empty(get_sub_field('client_image', 126))){ ?>
                              <div class="ione">
                                 <img src="<?php echo get_sub_field('client_image', 126); ?>" alt="">
                              </div>
                              <?php } ?>
                              <div class="testi__text">
                                 <?php if(!empty(get_sub_field('client_name', 126))){ ?>
                                     <h3><?php echo get_sub_field('client_name', 126); ?></h3>
                                 <?php } ?>
                                 <?php if(!empty(get_sub_field('client_location', 126))){ ?>
                                    <span><?php echo get_sub_field('client_location', 126); ?></span>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>

   <?php if( get_field('book_appointment_section') == 'Yes' ): ?>
   <div class="looking__wrapp">
      <div class="container">
         <div class="row">
<!--             <div class="col-sm-12">
               <img src="<?php echo get_template_directory_uri();?>/assets/images/log_2.png" alt="" class="log__holder m-auto d-block">
            </div> -->
            <div class="col-sm-10 m-auto">
               <?php if( get_field('book_appointment_content') ): ?>
                  <?php echo the_field('book_appointment_content'); ?>
               <?php endif; ?>
               <a href="<?php echo site_url('/contact-us'); ?>">Book An Appointment</a>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   
</div>
<?php endwhile; 
get_footer();
?>


