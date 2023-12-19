<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
            <?php if( get_field('right_menu', $post_id) == 'Yes' ){ ?>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
               <div class="product__details__wrapp">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/blog_1.jpg" alt="" />
                  <?php the_content(); ?>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
               <div class="right__holder___product">
                  
                  <h3>Categories</h3>
                  <div class="cate__holder">
                   <?php
                    wp_nav_menu(
                    array(
                    "menu"         => "Right Menu",
                    "menu_class"   => "",
                    "container"    => "ul",
                    )
                    );
                    ?>
                  </div>
               </div>
            </div>
        <?php } else{ ?>
            <div class="col-sm-12">
               <div class="product__details__wrapp">
                  <?php the_content(); ?>
               </div>
            </div>
        <?php } ?>
         </div>
      </div>
   </div>
</div>
<?php
get_footer();
