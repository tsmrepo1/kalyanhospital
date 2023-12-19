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
           <div class="no-data-found">
                No Data Found
                </div>
         </div>
      </div>
   </div>
  
</div>
<?php
get_footer();
