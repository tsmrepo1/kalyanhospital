<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kalyanhospital
 */
$post_id = get_the_ID();
?>
<footer class="footer__wrap">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4">
            <div class="footer__box">
               <?php if( get_field('footer_logo', 'options') ): ?>
               <a href="<?php echo home_url(); ?>">
               <img src="<?php the_field('footer_logo', 'options'); ?>" alt="">
               </a>
               <?php endif; ?>
               <?php if( get_field('footer_content', 'options') ): ?>
                  <?php the_field('footer_content', 'options'); ?>
               <?php endif; ?>
               
               <?php echo do_shortcode('[newsletter_form]');?>
               <div class="footer__social">
                  <?php
                   while( have_rows('social_media_managment', 'options') ) : the_row(); 
                  ?>
                     <a href="<?php echo get_sub_field('media_link', 'options'); ?>"><i class="fa-brands fa-<?php echo get_sub_field('media_name', 'options'); ?>"></i></a>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
            <div class="footer__boxtwo">
               <h3>Link</h3>               
               <?php
               wp_nav_menu(
               array(
               "menu"         => "Footer Menu",
               "menu_class"   => "",
               "container"    => "ul",
               )
               );
               ?>
            </div>
         </div>
         <?php if( get_field('contact_address_1_show', 18) == 'Yes' ): ?>
         <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
            <div class="footer__boxtwo contactone">
               <h3>Kalyan Hospital, Morar</h3>
               <?php if( get_field('phone_no_1',  18) ): ?>
               <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_no_1',  18)); ?>">
                  <i class="fa-solid fa-phone"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('phone_no_1',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('email_1',  18) ): ?>
               <a href="mailto:<?php echo str_replace(array(" ","-"),'',get_field('email_1',  18)); ?>">
                  <i class="fa-solid fa-envelope"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('email_1',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('contact_address_1',  18) ): ?>
               <a href="#">
                  <i class="fa-solid fa-location-dot"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('contact_address_1',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('contact_address_map_link_1',  18) ): ?>
               <div class="map__holder">
                  <iframe src="<?php echo the_field('contact_address_map_link_1',  18); ?>" width="100%" height="125" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
               <?php endif; ?>
            </div>
         </div>
         <?php endif; ?>
         <?php if( get_field('contact_address_2_show',  18) ): ?>
         <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
            <div class="footer__boxtwo contactone">
               <h3>Kalyan Hospital, Padao</h3>
               <?php if( get_field('phone_no_2',  18) ): ?>
               <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_no_2',  18)); ?>">
                  <i class="fa-solid fa-phone"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('phone_no_2',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('email_2',  18) ): ?>
               <a href="mailto:<?php echo the_field('email_2',  18); ?>">
                  <i class="fa-solid fa-envelope"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('email_2',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('contact_address_2',  18) ): ?>
               <a href="#">
                  <i class="fa-solid fa-location-dot"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('contact_address_2',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('contact_address_map_link_2',  18) ): ?>
               <div class="map__holder">
                  <iframe src="<?php echo the_field('contact_address_map_link_2',  18); ?>" width="100%" height="125" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
               <?php endif; ?>
            </div>
         </div>
         <?php endif; ?>
         <?php if( get_field('contact_address_3_show',  18) ): ?>
         <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
            <div class="footer__boxtwo contactone">
               <h3>Kalyan IVF Centre</h3>
               <?php if( get_field('phone_no_3',  18) ): ?>
               <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_no_3',  18)); ?>">
                  <i class="fa-solid fa-phone"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('phone_no_3',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('email_1',  18) ): ?>
               <a href="mailto:<?php echo the_field('email_3', $post_id); ?>">
                  <i class="fa-solid fa-envelope"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('email_3',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('contact_address_3',  18) ): ?>
               <a href="#">
                  <i class="fa-solid fa-location-dot"></i>
                  <div class="clearfix"></div>
                  <?php echo the_field('contact_address_3',  18); ?>
               </a>
               <?php endif; ?>
               <?php if( get_field('contact_address_map_link_3',  18) ): ?>
               <div class="map__holderholdet">
                  <iframe src="<?php echo the_field('contact_address_map_link_3',  18); ?>" width="100%" height="125" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
               <?php endif; ?>
            </div>
         </div>
         <?php endif; ?>
      </div>
   </div>
   <div class="downfooter">
      <div class="container">
         <div class="row">
<!--             <div class="col-sm-6">
               <div class="Privacy">
                  <?php
                  wp_nav_menu(
                  array(
                  "menu"         => "Below Footer Menu",
                  "menu_class"   => "",
                  "container"    => "ul",
                  )
                  );
                  ?>
               </div>
            </div> -->
            <div class="col-sm-12">
               <div class="copy">
                  <p>© Kalyanhospital | All Rights Reserved </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- The Modal -->
<div class="modal" id="myModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">MAKE APPOINTMENT</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <?php echo do_shortcode('[contact-form-7 id="6f36601" title="MAKE APPOINTMENT"]');?>
         
         <!-- Modal footer -->
      </div>
   </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/2d537fef4a.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/core.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/owl.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/script.js"></script>


<script src="<?php echo get_template_directory_uri();?>/assets/js/swiper.min.js"></script>


<script src="<?php echo get_template_directory_uri();?>/assets/js/core.js"></script>

<script>
document.addEventListener('DOMContentLoaded',()=>{
	document.querySelectorAll('#navi__holder li a').forEach(el=>{
 if(el.href === window.location.href){

	el.classList.add('active')
} else {

	el.classList.remove('active')
}

})
})
</script>


<script>
   (function () {
     $(".hamburger-menu").on("click", function () {
       $(".bar").toggleClass("animate");
     });
   })();
</script>
<script>
function showHide(shID) {
if (document.getElementById(shID)) {
if (document.getElementById(shID+'-show').style.display != 'none') {
   document.getElementById(shID+'-show').style.display = 'none';
   document.getElementById(shID).style.display = 'block';
}
else {
   document.getElementById(shID+'-show').style.display = 'inline';
   document.getElementById(shID).style.display = 'none';
}
}
}
</script>
<!--video js -->
<script>
	$(".vpop").on('click', function(e) {
  e.preventDefault();
  $("#video-popup-overlay,#video-popup-iframe-container,#video-popup-container,#video-popup-close").show();
  
  var srchref='',autoplay='',id=$(this).data('id');
  if($(this).data('type') == 'vimeo') var srchref="//player.vimeo.com/video/";
  else if($(this).data('type') == 'youtube') var srchref="https://www.youtube.com/embed/j_yUXuPhV64?si=ThK1SsBq2jzXot9z";
  
  if($(this).data('autoplay') == true) autoplay = '?autoplay=1';
  
  $("#video-popup-iframe").attr('src', srchref+id+autoplay);
  
  $("#video-popup-iframe").on('load', function() {
    $("#video-popup-container").show();
  });
});

$("#video-popup-close, #video-popup-overlay").on('click', function(e) {
  $("#video-popup-iframe-container,#video-popup-container,#video-popup-close,#video-popup-overlay").hide();
  $("#video-popup-iframe").attr('src', '');
});
</script>
<!--Video end  -->
<script>
   $(document).ready(function() {   
   // Gets the video src from the data-src on each button   
   var $videoSrc;  
   $('.video-btn').click(function() {
   $videoSrc = $(this).data( "src" );
   });
   console.log($videoSrc);
   // when the modal is opened autoplay it  
   $('#myModal').on('shown.bs.modal', function (e) {   
   $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");   
   }) 
   $('#myModal').on('hide.bs.modal', function (e) {   
   $("#video").attr('src',$videoSrc); 
   })      
   });
</script>
<!-- counter -->
<script>
   (function ($) {
   $.fn.countTo = function (options) {
   options = options || {};   
   return $(this).each(function () {
   // set options for current element
   var settings = $.extend({}, $.fn.countTo.defaults, {
   from:            $(this).data('from'),
   to:              $(this).data('to'),
   speed:           $(this).data('speed'),
   refreshInterval: $(this).data('refresh-interval'),
   decimals:        $(this).data('decimals')
   }, options);   
   // how many times to update the value, and how much to increment the value on each update
   var loops = Math.ceil(settings.speed / settings.refreshInterval),
   increment = (settings.to - settings.from) / loops;   
   // references & variables that will change with each update
   var self = this,
   $self = $(this),
   loopCount = 0,
   value = settings.from,
   data = $self.data('countTo') || {};   
   $self.data('countTo', data);   
   // if an existing interval can be found, clear it first
   if (data.interval) {
   clearInterval(data.interval);
   }
   data.interval = setInterval(updateTimer, settings.refreshInterval);   
   // initialize the element with the starting value
   render(value);   
   function updateTimer() {
   value += increment;
   loopCount++;   
   render(value);   
   if (typeof(settings.onUpdate) == 'function') {
   settings.onUpdate.call(self, value);
   }   
   if (loopCount >= loops) {
   // remove the interval
   $self.removeData('countTo');
   clearInterval(data.interval);
   value = settings.to;   
   if (typeof(settings.onComplete) == 'function') {
   settings.onComplete.call(self, value);
   }
   }
   }   
   function render(value) {
   var formattedValue = settings.formatter.call(self, value, settings);
   $self.html(formattedValue);
   }
   });
   };
   
   $.fn.countTo.defaults = {
   from: 0,               // the number the element should start at
   to: 0,                 // the number the element should end at
   speed: 1000,           // how long it should take to count between the target numbers
   refreshInterval: 100,  // how often the element should be updated
   decimals: 0,           // the number of decimal places to show
   formatter: formatter,  // handler for formatting the value before rendering
   onUpdate: null,        // callback method for every time the element is updated
   onComplete: null       // callback method for when the element finishes updating
   };
   
   function formatter(value, settings) {
   return value.toFixed(settings.decimals);
   }
   }(jQuery));
   
   jQuery(function ($) {
   // custom formatting example
   $('.count-number').data('countToOptions', {
   formatter: function (value, options) {
   return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
   }
   });   
   // start all the timers
   $('.timer').each(count);     
   function count(options) {
   var $this = $(this);
   options = $.extend({}, options || {}, $this.data('countToOptions') || {});
   $this.countTo(options);
   }
   });
</script>

<?php wp_footer(); ?>
</body>
</html>
