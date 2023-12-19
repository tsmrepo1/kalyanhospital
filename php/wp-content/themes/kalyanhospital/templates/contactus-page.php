<?php
/**Template Name: Contact Us Page
 */
get_header();
while ( have_posts() ) : the_post(); 
$post_id = get_the_ID();
?><div class="main__body__wrapp main__body__wrapp__inner">
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
   <div class="inner__contact">
      <div class="container">
         <div class="row">
           <?php if( get_field('contact_address_1_show') == 'Yes' ): ?>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
               <div class="contact__box">
                  <?php if( get_field('phone_no_1', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-phone"></i> Phone</h4>
                     <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_no_1', $post_id)); ?>"><?php echo the_field('phone_no_1', $post_id); ?></a>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('email_1', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-envelope"></i> Email</h4>
                     <a href="mailto:<?php echo the_field('email_1', $post_id); ?>"><?php echo the_field('email_1', $post_id); ?></a>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('contact_address_1', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-location-dot"></i> Address</h4>
                     <p><?php echo the_field('contact_address_1', $post_id); ?></p>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('contact_address_map_link_1', $post_id) ): ?>
                  <div class="map">
                     <iframe
                        src="<?php echo the_field('contact_address_map_link_1', $post_id); ?>"
                        width="100%"
                        height="178"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <?php endif; ?>
            <?php if( get_field('contact_address_2_show', $post_id) ): ?>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
               <div class="contact__box">
                  <?php if( get_field('phone_no_2', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-phone"></i> Phone</h4>
                     <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_no_2', $post_id)); ?>"><?php echo the_field('phone_no_2', $post_id); ?></a>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('email_2', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-envelope"></i> Email</h4>
                     <a href="mailto:<?php echo the_field('email_2', $post_id); ?>"><?php echo the_field('email_2', $post_id); ?></a>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('contact_address_2', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-location-dot"></i> Address</h4>
                     <p><?php echo the_field('contact_address_2', $post_id); ?></p>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('contact_address_map_link_2', $post_id) ): ?>
                  <div class="map">
                     <iframe
                        src="<?php echo the_field('contact_address_map_link_2', $post_id); ?>"
                        width="100%"
                        height="178"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <?php endif; ?>
            <?php if( get_field('contact_address_3_show', $post_id) ): ?>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
               <div class="contact__box">
                  <?php if( get_field('phone_no_3', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-phone"></i> Phone</h4>
                     <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_no_3', $post_id)); ?>"><?php echo the_field('phone_no_3', $post_id); ?></a>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('email_1', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-envelope"></i> Email</h4>
                     <a href="mailto:<?php echo the_field('email_3', $post_id); ?>"><?php echo the_field('email_3', $post_id); ?></a>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('contact_address_3', $post_id) ): ?>
                  <div class="con__one">
                     <h4><i class="fa-solid fa-location-dot"></i> Address</h4>
                     <p><?php echo the_field('contact_address_3', $post_id); ?></p>
                  </div>
                  <?php endif; ?>
                  <?php if( get_field('contact_address_map_link_3', $post_id) ): ?>
                  <div class="map">
                     <iframe
                        src="<?php echo the_field('contact_address_map_link_3', $post_id); ?>"
                        width="100%"
                        height="178"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <?php endif; ?>

         </div>
         <div class="row">
            <div class="col-sm-10 m-auto">
               <div class="form__contact">
                  <div class="row">
                     <?php if( get_field('contact_us_form_left_image') ): ?>
                     <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7 p-0">
                        <img src="<?php echo the_field('contact_us_form_left_image'); ?>" alt="" class="bg__one">
                     </div>
                     <?php endif; ?>
                     <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 p-0">
                        <div class="get__in">
                           <?php if( get_field('contact_us_form_content') ): ?>
                              <?php echo the_field('contact_us_form_content'); ?>
                           <?php endif; ?>
                              <!-- <div class="mb-3 mt-4">
                                 <label for="exampleInputEmail1" class="form-label">Name</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3 mt-4">
                                 <label for="exampleInputEmail1" class="form-label">Email</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3 mt-4">
                                 <label for="exampleInputEmail1" class="form-label">Phone</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3 mt-4">
                                 <label for="exampleInputEmail1" class="form-label">Message</label>
                                 <textarea name="" id="" cols="30" rows="10" class="form-control comment"></textarea>
                              </div>
                              <button type="submit" class="btn btn-light mt-3 login">Submit</button> -->
                           <?php echo do_shortcode('[contact-form-7 id="c13980b" title="Contact form 1"]');?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php endwhile; // End of the loop.
get_footer();

?>

