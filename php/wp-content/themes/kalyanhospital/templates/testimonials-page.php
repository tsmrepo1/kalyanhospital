<?php
/**Template Name: Testimonials Page
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
           $i=1;
           while ( have_rows('testimonial_managment') ) : the_row();
            $review_content = get_sub_field('review_content');
            $fast_cart =  substr($review_content,0, 200);
            $secan_cart =  substr($review_content, 200);
          ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
               <div class="testimonial__item">
                  <div class="star__wrapp">
                     <ul>
                        <?php if( get_sub_field('rating_number') == 1 ){ ?>
                        <li><i class="fa-solid fa-star"></i></li>
                        <?php } ?>
                        <?php if( get_sub_field('rating_number') == 2 ){ ?>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <?php } ?>
                        <?php if( get_sub_field('rating_number') == 3 ){ ?>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <?php } ?>
                        <?php if( get_sub_field('rating_number') == 4 ){ ?>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <?php } ?>
                        <?php if( get_sub_field('rating_number') == 5 ){ ?>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <?php } ?>
                     </ul>
                  </div>
				   <div class="testimonial-content">
					  <p><?php echo get_sub_field('review_content'); ?></p>
					   <a href="#" class="showLink">See more.</a>
				   </div>

<!--                   <div id="example" class="more">
                     <p><?php echo $secan_cart; ?></p>
                     <p><a href="#" id="example-hide" class="hideLink" onclick="showHide('example');return false;">Hide this content.</a></p>
                  </div> -->
                  <div class="testimonial__item__bottom">
                     <div class="title">
                      <?php if(!empty(get_sub_field('client_image'))){ ?>
                        <div class="ione">
                           <img src="<?php echo get_sub_field('client_image'); ?>" alt="">
                        </div>
                        <?php } ?>
                        <div class="testi__text">
                          <?php if(!empty(get_sub_field('client_name'))){ ?>
                            <h3><?php echo get_sub_field('client_name'); ?></h3>
                          <?php } ?>
                          <?php if(!empty(get_sub_field('client_location'))){ ?>
                           <span><?php echo get_sub_field('client_location'); ?></span>
                          <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <?php
              $i++; endwhile; 
            ?>
           
         </div>
      </div>
   </div>
</div>
<?php endwhile; // End of the loop.
get_footer();

?>

