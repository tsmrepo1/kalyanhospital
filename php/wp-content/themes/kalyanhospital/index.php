<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kalyanhospital
 */

get_header();
?>
<div class="main__body__wrapp main__body__wrapp__inner">
   <div class="banner__holder">
      <div class="main__banner header__banner__inner">
         <div class="image__box">
            <img alt="" src="<?php echo get_template_directory_uri();?>/assets/images/innerbanner.jpg" />
         </div>
         <div class="banner__content">
            <div class="banner__content__inner">
               <h1>Blog</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="inner__about">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="blog__one">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/blog.jpg" alt="">
                        <p>Jun 03, 2023  |   Heath Care</p>
                        <a href="#">How to handle patient body in MRI</a>
                        We are provide excellent medical advices for your
                        good health and we…
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="blog__one">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/blog.jpg" alt="">
                        <p>Jun 03, 2023  |   Heath Care</p>
                        <a href="#">How to handle patient body in MRI</a>
                        We are provide excellent medical advices for your
                        good health and we…
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="blog__one">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/blog.jpg" alt="">
                        <p>Jun 03, 2023  |   Heath Care</p>
                        <a href="#">How to handle patient body in MRI</a>
                        We are provide excellent medical advices for your
                        good health and we…
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="blog__one">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/blog.jpg" alt="">
                        <p>Jun 03, 2023  |   Heath Care</p>
                        <a href="#">How to handle patient body in MRI</a>
                        We are provide excellent medical advices for your
                        good health and we…
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="blog__one">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/blog.jpg" alt="">
                        <p>Jun 03, 2023  |   Heath Care</p>
                        <a href="#">How to handle patient body in MRI</a>
                        We are provide excellent medical advices for your
                        good health and we…
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="blog__one">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/blog.jpg" alt="">
                        <p>Jun 03, 2023  |   Heath Care</p>
                        <a href="#">How to handle patient body in MRI</a>
                        We are provide excellent medical advices for your
                        good health and we…
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
               <div class="right__panel">
                  <div class="blog__searchholder">
                     <h3>Search</h3>
                     <div class="search__holder__blog">
                        <input type="text">
                        <input type="submit">
                     </div>
                     <h3>Categories</h3>
                     <div class="cate__holder">
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                        <a href="#"><i class="fa-solid fa-stop"></i> Medical Specialties</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
get_footer();
