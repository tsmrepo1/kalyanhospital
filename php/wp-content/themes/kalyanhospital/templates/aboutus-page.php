<?php
/**Template Name: About Us Page
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
               <div><?php the_title(); ?></div>
            </div>
         </div>
      </div>
   </div>
   <div class="inner__about">
      <div class="container">
         <div class="row">
             <?php if( get_field('welcome_image') ): ?>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
               <div class="img-reponsive">
                  <img src="<?php echo the_field('welcome_image'); ?>" alt="" />
               </div>
            </div>
            <?php endif; ?>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <?php if( get_field('welcome_content') ): ?>
               <div class="about__maintext">
                <?php echo the_field('welcome_content'); ?>
               </div>
            <?php endif; ?>
            <?php if( get_field('established_section') == 'Yes' ): ?>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="established d-flex">
                        <div class="icon__about">
                           <img src="<?php echo the_field('established_image'); ?>" alt="" />
                        </div>
                        <div class="establishedtext">
                           <?php echo the_field('established_content'); ?>
                        </div>
                     </div>
                  </div>
				   <div class="col-sm-6">
                     <div class="established d-flex">
                        <div class="icon__about">
                           <img src="<?php echo the_field('established_image_2'); ?>" alt="" />
                        </div>
                        <div class="establishedtext">
                           <?php echo the_field('established_content_2'); ?>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
               <?php if( get_field('counter_section') == 'Yes' ): ?>
               <div class="servedover">
                  <h5>We Served Over</h5>
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="text__one">
                           <h2>16</h2>
                           <p>Lakh People From</p>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="text__one">
                           <h2>14</h2>
                           <p>Countries</p>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="text__one border-0">
                           <h2>50</h2>
                           <p>Cities</p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
   <?php if( get_field('our_mission_section') == 'Yes' ): ?>
   <div class="about__holder ourmission">
      <div class="container-fluid m-0 p-0">
         <div class="row m-0">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
               <div class="about__textone">
                   <?php if( get_field('our_vision') ): ?>
                     <?php echo the_field('our_vision'); ?>
                   <?php endif; ?>
                  <h2 class="pt-3">Our Core Values</h2>
                  <div class="text__holderabout">
                     <?php if( get_field('excellence') ): ?>
                         <?php echo the_field('excellence'); ?>
                     <?php endif; ?>
                  </div>
                  <div class="text__holderabout">
                      <?php if( get_field('compassion') ): ?>
                         <?php echo the_field('compassion'); ?>
                     <?php endif; ?>
                  </div>
                  <div class="text__holderabout">
                     <?php if( get_field('innovation') ): ?>
                         <?php echo the_field('innovation'); ?>
                     <?php endif; ?>
                  </div>
                  <div class="text__holderabout">
                     <?php if( get_field('integrity') ): ?>
                         <?php echo the_field('integrity'); ?>
                     <?php endif; ?>
                  </div>
                  <div class="text__holderabout">
                     <?php if( get_field('collaboration') ): ?>
                         <?php echo the_field('collaboration'); ?>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
               <div class="video__wrapp">
                <a href="#" class="video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/NFWSFbqL0A0" data-target="#myModal">
                    <?php if( get_field('video_image') ): ?>
                    <img src="<?php echo the_field('video_image'); ?>" alt=""/>
                    <?php endif; ?>
                </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('brand_logo') == 'Yes' ): ?>
   <div class="brand__wrapp">
      <div class="container">
         <div class="row">
            <div class="brand__logo">
               <img src="<?php echo get_template_directory_uri();?>/assets/images/logo1.png" alt="" />
               <img src="<?php echo get_template_directory_uri();?>/assets/images/logo2.png" alt="" />
               <img src="<?php echo get_template_directory_uri();?>/assets/images/logo3.png" alt="" />
               <img src="<?php echo get_template_directory_uri();?>/assets/images/logo4.png" alt="" />
               <img src="<?php echo get_template_directory_uri();?>/assets/images/logo5.png" alt="" />
               <img src="<?php echo get_template_directory_uri();?>/assets/images/logo6.png" alt="" />
				
			
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('founder_section') == 'Yes' ): ?>
   <div class="founder__wrapp position-relative pt-4">
      <div class="container">
         <div class="row">
            <?php if( get_field('founder_image') ): ?>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
               <div class="im__holder google__im">
                  <img src="<?php echo the_field('founder_image'); ?>" alt="" />
               </div>
            </div>
            <?php endif; ?>
        <?php if( get_field('founder_content') ): ?>
         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 m-auto">
               <div class="comment__wrapp">
                  <?php echo the_field('founder_content'); ?>
               </div>
            </div> 
        <?php endif; ?>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('milestones_section') == 'Yes' ): ?>
   <div class="milestones__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h2>Innovations & Milestones</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <section class="main-timeline-section">
                  <div class="conference-center-line"></div>
                  <div class="conference-timeline-content">
                     <div class="timeline-article timeline-article-top">
                        <div class="content-date year_two">
                           <span><?php echo the_field('milestones_year_1'); ?></span>
                        </div>
                        <div class="meta-date crl__holder"></div>
                        <div class="content-box yeartext__holderoneut">
                           <img src="<?php echo the_field('milestones_logo_image_1'); ?>" alt="" class="year__icon">
                           <div class="text__holder__year">
                              <?php echo the_field('milestones_content_1'); ?>
                           </div>
                        </div>
                     </div>
                     <div class="timeline-article timeline-article-bottom">
                        <div class="content-date">
                           <span><?php echo the_field('milestones_year_2'); ?></span>
                        </div>
                        <div class="meta-date"></div>
                        <div class="content-box yeartext__holderone">
                           <img src="<?php echo the_field('milestones_logo_image_2'); ?>" alt="" class="year__icon">
                           <div class="text__holder__year">
                              <?php echo the_field('milestones_content_2'); ?>
                           </div>
                        </div>
                     </div>
                     <div class="timeline-article timeline-article-top">
                        <div class="content-date year_one">
                           <span><?php echo the_field('milestones_year_3'); ?></span>
                        </div>
                        <div class="meta-date crial"></div>
                        <div class="content-box yeartext__holder">
                           <img src="<?php echo the_field('milestones_logo_image_3'); ?>" alt="" class="year__icon">
                           <div class="text__holder__year">
                              <?php echo the_field('milestones_content_3'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('surgical_section') == 'Yes' ): ?>
   <div class="surgical__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <?php echo the_field('surgical_title'); ?>
            </div>
            
            <?php
                while( have_rows('surgical_managment') ) : the_row(); 
             ?>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
               <div class="sur__number border-0">
                  <?php echo get_sub_field('surgical_caption'); ?>
               </div>
            </div>
            <?php endwhile; ?>
            
            
            <div class="col-sm-10 m-auto">
               <?php echo the_field('surgical_content'); ?>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('our_team') == 'Yes' ): ?>
   <div class="our__team">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-sm-12">
               <h2>Our Team</h2>
            </div>
            <?php
                while( have_rows('our_team_managment') ) : the_row(); 
            ?>
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
               <div class="box__team">
                  <a href="<?php echo get_sub_field('profile_link'); ?>">
                     <img src="<?php echo get_sub_field('team_image'); ?>" alt="" class="w-100">
                     <h4 class="mt-2"><?php echo get_sub_field('team_name'); ?></h4>
                     <p><?php echo get_sub_field('team_degignation'); ?></p>
                     <img src="<?php echo get_template_directory_uri();?>/assets/images/arrow.jpg" alt="">
                  </a>
               </div>
            </div>
            <?php endwhile; ?>
            
            
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
               <div class="team__viewall">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/img_5.jpg" alt="">
                  <a href="/php/doctors/">View All Doctors</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('happy_patients') == 'Yes' ): ?>
<!--    <div class="happy__patients">
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
   </div> -->
   <?php endif; ?>
</div>
<?php endwhile; // End of the loop.
get_footer();
?>

