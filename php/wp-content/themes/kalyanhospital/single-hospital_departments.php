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
               <div><?php the_title(); ?></div>
            </div>
         </div>
      </div>
   </div>
   <div class="inner__departmentdetails">
    
		  <div class="specialist">
			<div class="container">
				 <div class="col-sm-12">
            <div class="best_heart">
               <div class="row m-0">
                  <?php if( get_field('section_1', $post_id) == 'Yes' ): ?>
                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7 p-0">
                     <?php if(!empty(the_field('section_1_content', $post_id))){ ?>
                           <?php echo the_field('section_1_content', $post_id); ?>
                     <?php } ?>
                  </div>
                  <?php endif; ?>
                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                     <div class="get__solution">
                        <h3>Get Solution Now</h3>
                        <?php echo do_shortcode('[contact-form-7 id="83a39b9" title="Get Solution Now"]');?>
                     </div>
                  </div>
               </div>
            </div>
         </div> 
			  </div> 
		  </div>
        
         
        <?php if( get_field('counter_section', $post_id) == 'Yes' ): ?>
		  <div class="cities__wrap">
			  <div class="container">
				 <div class="col-sm-12">
            <div class="weservedover">
               <div class="row justify-content-center">
                  <div class="col-sm-12">
                     <h2>We Served Over</h2>
                  </div>
                  <?php
                    while( have_rows('counter_managment', $post_id) ) : the_row(); 
                  ?>
                  <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                     <div class="border__white">
                        <div class="bg__blue">
                           <div class="border__or">
                              <?php if(!empty(get_sub_field('counter_number', $post_id))){ ?>
                              <h2><?php echo get_sub_field('counter_number', $post_id); ?></h2>
                              <?php } ?>
                              <?php if(!empty(get_sub_field('counter_title', $post_id))){ ?>
                              <h4><?php echo get_sub_field('counter_title', $post_id); ?></h4>
                              <?php } ?>
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
         
   

      <?php if( get_field('are_you_facing_this_problems', $post_id) == 'Yes' ): ?>
      <div class="problems__wrapp">
         <div class="container">
			<?php if( get_field('are_you_facing_this_problems_title', $post_id) ): ?>
            <div class="col-sm-12">
               <h2><?php echo the_field('are_you_facing_this_problems_title', $post_id); ?></h2>
            </div>
			<?php endif; ?>
            <div class="row">
            <?php
              while( have_rows('are_you_facing_this_problems_managment', $post_id) ) : the_row(); 
            ?>

               <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                  <div class="box">
                     <?php if(!empty(get_sub_field('are_you_facing_this_problems_title', $post_id))){ ?>
                     <h3><?php echo get_sub_field('are_you_facing_this_problems_title', $post_id); ?></h3>
                    <?php } ?>
                    <?php if(!empty(get_sub_field('are_you_facing_this_problems_content', $post_id))){ ?>
                      <div class="testimonial-content"> <p><?php echo get_sub_field('are_you_facing_this_problems_content', $post_id); ?></p>
						  <a href="#" class="showLink">More.</a></div>
                    <?php } ?>
                     <div class="polygon__holder"></div>
                    
                  </div>
               </div>
            <?php endwhile; ?>

               
            </div>
         </div>
      </div>
      <?php endif; ?>

      <?php if( get_field('horrible_mistakes', $post_id) == 'Yes' ): ?>
      <div class="horrible__mistakes">
         <div class="container">
            <div class="col-sm-11 m-auto">
               <div class="mistakes__people">
                  <div class="row">
                     <?php if( get_field('horrible_mistakes_caption', $post_id) ): ?>
                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                        <h2><?php echo the_field('horrible_mistakes_caption', $post_id); ?></h2>
						      <p> <?php echo the_field('horrible_mistakes_content', $post_id); ?></p>
                        <a href="#" data-toggle="modal" data-target="#myModal">get started</a>
                     </div>
                     <?php endif; ?>


                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                      <?php
                       while( have_rows('horrible_mistakes_feture', $post_id) ) : the_row(); 
                        if(!empty(get_sub_field('horrible_mistakes_test', $post_id))){
                     ?>
                        <div class="category__wrap">
                           <p><?php echo get_sub_field('horrible_mistakes_test', $post_id); ?></p>
                           <div class="white__bg"></div>
                           <div class="clearfix"></div>
                        </div>
                      <?php } endwhile; ?>

                     </div>
                  </div>
               </div>
            </div>
         </div>

         <?php if( get_field('horrible_mistakes_right_image', $post_id) ): ?>
         <img src="<?php echo the_field('horrible_mistakes_right_image', $post_id); ?>" alt="" class="doc__older" />
         <?php endif; ?>
         
      </div>
      <?php endif; ?>


      <?php if( get_field('problems_people', $post_id) == 'Yes' ): ?>
      <div class="problems__people">
         <div class="container">
            <?php if( get_field('problems_people_content', $post_id) ): ?>
            <div class="col-sm-11 m-auto">
               <h2><?php echo the_field('problems_people_content', $post_id); ?></h2>
            </div>
            <?php endif; ?>
            <div class="row">


            <?php
               $i=1;
               while( have_rows('problems_people_managment', $post_id) ) : the_row(); 
                  $problems_content = get_sub_field('problems_content', $post_id);
                  $fast_cart =  substr($problems_content,0, 90);
                  $secan_cart =  substr($problems_content, 90);
                  if(!empty(get_sub_field('problems_content', $post_id))){
           ?>
               <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
              
                  <div class="cross__holder">
                     <img src="<?php echo get_template_directory_uri();?>/assets/images/cross.png" alt="" class="d-block" />
                     <div class="testimonial-content"><?php echo get_sub_field('problems_content', $post_id); ?>
                        <a href="#" class="showLink">More.</a>
                     </div>
                     <div class="line"></div>
                  
            </div>
               </div>
            <?php $i++; } endwhile; ?>


            </div>
         </div>
      </div>
      <?php endif; ?>
      <?php if( get_field('best_hospital', $post_id) == 'Yes' ): ?>

      <div class="best__hospital">
         <div class="container">
            <div class="row">
            <?php if( get_field('best_hospital_video_link', $post_id) ): ?>
               <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
                  <div class="video__wrapp">
                  <!-- <video width="100%" height="100%" controls>
                     <source src="<?php //echo get_template_directory_uri();?>/assets/images/MLB.mp4" type="video/mp4">
                  </video> -->
<!--  <iframe width="100%" height="100%" src="<?php echo the_field('about_us_video_link'); ?>"></iframe> -->
				   <div class="vpop" data-type="youtube" data-id="6xcG6ttMDVY" data-autoplay='true'>
					   <img src="<?php echo get_template_directory_uri();?>/assets/images/video__1.jpg" alt="">
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
              <?php if( get_field('best_hospital_content', $post_id) ): ?>
               <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                  <?php echo the_field('best_hospital_content', $post_id); ?>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
      <?php endif; ?>
      
      
      <?php if($post_id != 401){ ?>
	  
	  

      <div class="our__team">
         <div class="container">
            <div class="row justify-content-center">
               <?php if( get_field('doctor_avilibility_title', $post_id) ): ?>
               <div class="col-sm-12">
                  <h2><?php echo the_field('doctor_avilibility_title', $post_id); ?></h2>
               </div>
               <?php endif; ?>

               <?php 
                  $doctor_avilibility = get_field('doctor_avilibility', $post_id);
                  foreach( $doctor_avilibility as $doctor ):

                  $doctor_name = $doctor->post_title;
                  $doctor_id = $doctor->ID;


                  global $wpdb;
                  //$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}post WHERE ID ='".$doctor_id."' ");

                  //print_r($results);

                  $argsDoctors = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE ID = $doctor_id" );

                  $doctor_link = "http://kalyanhospital.thinksurfmedia.com/php/doctors_management/";
                  $doctorLink = $doctor_link.$argsDoctors->post_name;

                 


                  



                  //echo "<pre>";
                  //print_r($argsDoctors);
               ?>



               <?php 

               /*$argsDoctors = array (
               'post_type'              => 'doctors_management',
               'post_status'            => 'publish',
               'order'                  => 'ASC',
               'ID'                     => $doctor_id,
               'posts_per_page'         => 2
               );*/

               /*$argsDoctors = array(
                   'post_type'            => 'doctors_management',
                   'cc_search_post_title' => $doctor_name, // search post title only
                   'post_status'          => 'publish',
                   'posts_per_page'       => 2
               );*/


               /*$bannerDoctors = new WP_Query( $argsDoctors );
               if ( $bannerDoctors->have_posts() ) {
               while ( $bannerDoctors->have_posts() ) {
               $bannerDoctors->the_post();
               $image1Doctors = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );*/

               ?>

               



               <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
               <div class="box__team">
                  <a href="<?php echo $doctorLink; ?>">
                     <img src="<?php echo the_field('profile_image', $doctor_id); ?>" alt="" class="w-100">
                     <h4 class="mt-2"><?php echo $doctor_name; ?></h4>
                     <p><?php echo the_field('department_name', $doctor_id); ?></p>
                     <img src="<?php echo get_template_directory_uri();?>/assets/images/button1.png" alt="">
                  </a>
               </div>
               </div>
               <?php endforeach; ?>
<!--                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                  <div class="team__viewall">
                     <img src="<?php echo get_template_directory_uri();?>/assets/images/img_5.jpg" alt="" />
                     <a href="<?php echo site_url('/doctors'); ?>">View All Doctors</a>
                  </div>
               </div> -->
            </div>
            <!-- <div class="col-sm-12">
               <a href="#" class="get__star">get started</a>
            </div> -->
         </div>
      </div>
      
      <?php }  ?>

      <?php if( get_field('treatment_wrapp', $post_id) == 'Yes' ): ?>

      <div class="treatment__wrapp">
         <div class="container">
            <div class="row">
               <div class="tre__holder">
                  <?php if( get_field('treatment_wrapp_one_image', $post_id) ): ?>
                  <div class="img_holder">
                     <img src="<?php echo the_field('treatment_wrapp_one_image', $post_id); ?>" alt="" class="w-100" />
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('treatment_wrapp_one_title', $post_id) ): ?>
                  <div class="treatment__text">
                     <h3><?php echo the_field('treatment_wrapp_one_title', $post_id); ?></h3>
                     <?php echo the_field('treatment_wrapp_one_content', $post_id); ?>
                  </div>
                  <?php endif; ?>
               </div>
               <div class="tre__holder">
                  <?php if( get_field('treatment_wrapp_two_title', $post_id) ): ?>
                  <div class="treatment__text">
                     <h3><?php echo the_field('treatment_wrapp_two_title', $post_id); ?></h3>
                     <div class="caate__wrapp">
                        <?php echo the_field('treatment_wrapp_two_content', $post_id); ?>
                        <!-- <a href="#" class="get__star mr-0 ml-0">get started</a> -->
                     </div>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('treatment_wrapp_two_image', $post_id) ): ?>
                  <div class="img_holder">
                     <img src="<?php echo the_field('treatment_wrapp_two_image', $post_id); ?>" alt="" class="w-100" />
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>

      <?php endif; ?>

    

      <?php if( get_field('secret_tips', $post_id) == 'Yes' ): ?>
      <div class="secret__ips">
         <div class="container">
            <div class="col-sm-11 m-auto">
               <div class="secret__holder">
                  <div class="row">
                     <?php if( get_field('secret_tips_content', $post_id) ): ?>
                     <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="text__holder__one">
                           <?php echo the_field('secret_tips_content', $post_id); ?>
                           <a href="<?php echo the_field('download_expert_tips_pdf_link', $post_id); ?>">Download Expert Tips and Strategies</a>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php if( get_field('secret_tips_image', $post_id) ): ?>
                     <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="doc_im">
                           <img src="<?php echo the_field('secret_tips_image', $post_id); ?>" alt="">
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endif; ?>


    <?php //if($post_id != 163){ ?>
      <div class="faq__wrapp">
         <div class="container">
            <div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<h2>
						Frequently Asked Questions
					</h2>
				</div>
               <?php if( get_field('faq_left_image') ): ?>
<!--                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                  <div class="faq__im">
                     <img src="<?php echo the_field('faq_left_image'); ?>" alt="" class="w-100 h-100">
                  </div>
               </div> -->
               <?php endif; ?>
               <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 m-auto">
                  <div class="accordion" id="faq">
                  <?php
                     $i=1;
                     while( have_rows('faq_managment', $post_id) ) : the_row(); 
                  ?>
                     <div class="card">
                        <?php if(!empty(get_sub_field('faq_question', $post_id))){ ?>
                        <div class="card-header" id="faqhead<?php echo $i; ?>">
                           <a href="#" class="btn btn-header-link di__cloblock" data-toggle="collapse" data-target="#faq<?php echo $i; ?>"
                              aria-expanded="true" aria-controls="faq1">
							   <div class="icon__faq"><img src="<?php echo get_template_directory_uri();?>/assets/images/bluedot.png" alt=""> </div>
							   <div class="faq__text__holder">
								 <?php echo get_sub_field('faq_question', $post_id); ?>   
							   </div>
							  
							</a>
                        </div>
                        <?php } ?>
                        <div id="faq<?php echo $i; ?>" class="collapse <?php if($i==1){ ?>show<?php } ?>" aria-labelledby="faqhead<?php echo $i; ?>" data-parent="#faq">
                        <?php if(!empty(get_sub_field('faq_answer', $post_id))){ ?>
                           <div class="card-body"><?php echo get_sub_field('faq_answer', $post_id); ?></div>
                        <?php } ?>
                        </div>
                     </div>
                     <?php $i++; endwhile; ?>                    
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php //} ?>
      
   </div>
</div>
<?php
get_footer();
