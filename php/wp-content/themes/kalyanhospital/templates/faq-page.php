<?php
/**Template Name: FAQ Page
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
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8 m-auto">
               <div class="faq__wrapp">
                  <div class="accordion" id="faq">
                     <?php
                       $i=1;
                       while ( have_rows('faq_managment') ) : the_row();
                     ?>
                     <div class="card">
                        <div class="card-header" id="faqhead<?php echo $i; ?>">
                           <?php if(!empty(get_sub_field('faq_question'))){ ?>
                           <a href="#" class="btn btn-header-link di__cloblock" data-toggle="collapse" data-target="#faq<?php echo $i; ?>"
                              aria-expanded="true" aria-controls="faq<?php echo $i; ?>">
							   <div class="icon__faq">
							   <img src="<?php echo get_template_directory_uri();?>/assets/images/bluedot.png" alt="">
							   </div>
                              <div class="faq__text__holder">
								 <?php echo get_sub_field('faq_question'); ?>  
							   </div>
							  
							</a>
                           <?php } ?>
                        </div>
                        <div id="faq<?php echo $i; ?>" class="collapse <?php if($i == 1){ ?>show<?php } ?>" aria-labelledby="faqhead<?php echo $i; ?>" data-parent="#faq">
                           <?php if(!empty(get_sub_field('faq_answer'))){ ?>
                           <div class="card-body"><?php echo get_sub_field('faq_answer'); ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <?php
                       $i++; endwhile; 
                     ?>                    
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

