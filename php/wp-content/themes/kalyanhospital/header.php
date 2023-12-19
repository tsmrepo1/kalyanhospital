<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kalyanhospital
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri();?>/assets/css/custom-style.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri();?>/assets/css/owl.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri();?>/assets/css/responsive.css" rel="stylesheet" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="static-top">
   <div class="header__top">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5">
               <div class="top__nav">
                  <!-- <ul>
                     <li><a href="#">Testimonials</a></li>
                     <li><a href="doctor.html">Doctors</a></li>
                     <li><a href="faq.html">FAQ</a></li>
                     <li><a href="#"> IVF </a></li>
                     <li><a href="#">Pathology</a></li>
                  </ul> -->
                  <?php
                  wp_nav_menu(
                  array(
                  "menu"         => "Top Menus",
                  "menu_class"   => "",
                  "container"    => "ul",
                  )
                  );
                  ?>
               </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2 ml-auto">
               <div class="make">
                  <a href="#" data-toggle="modal" data-target="#myModal">MAKE APPOINTMENT</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <nav class="navbar navbar-expand-lg">
      <div class="container main__header__content">
         <a class="navbar-brand" href="<?php echo home_url(); ?>">
         	<?php
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
              if ( has_custom_logo() ) {
                  echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" alt="logo" class="lazyloaded">';
              } else {
                  echo '<h1>' . get_bloginfo('name') . '</h1>';
              }
            ?>
         </a>
         <button
            class="navbar-toggler navbar-toggler-right hamburger-menu order-2"
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
            aria-controls="navbarResponsive"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
         <span class="bar"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- <ul class="navbar-nav">
               <li><a href="index.html">Home</a></li>
               <li><a href="#">Patient Care</a></li>
               <li><a href="departments-listing.html">Departments</a></li>
               <li><a href="#">Corporates & TPAs</a></li>
               <li><a href="about.html">About</a></li>
               <li><a href="blog.html">Blog</a></li>
               <li><a href="contact.html">Contact Us</a></li>
            </ul> -->
            <?php
                  wp_nav_menu( array(
                  'theme_location'  => 'menu-1',
                  'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                  'container'       => '',
                  'container_class' => '',
                  'container_id'    => '',
                  'menu_class'      => 'navbar-nav',
                  'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'          => new WP_Bootstrap_Navwalker(),
                  ) );
              ?>
         </div>
         <div class="nav__holder">
            <div class="contact__info">
               <div class="phone__wrapp">
                     <div class="icon__box">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/phone.webp" alt="">
                     </div>
                     <?php if( get_field('header_phone_no', 'options') ): ?>
                     <div class="num__wrapp">
                        <p>CALL Now</p>
                        <a href="tel:+ <?php echo str_replace(array(" ","-"),'',get_field('header_phone_no', 'options')); ?>"> <span><?php the_field('header_phone_no', 'options'); ?></span></a>
                     </div>
                     <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </nav>
</header>

