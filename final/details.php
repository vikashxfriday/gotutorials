<?php 
include "common.php";
//$tutorial_subject;
//$tutorial_id;
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
   <title>Go Tutorials</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php include "support-files.html"; ?>
   <!-- css end  here-->
   <style>
   .tp-feature__icon { margin-bottom: 10px !important;}
   .img-height{ height: 100px !important;}
   .h-75 { height: 75px !important;}

   </style>
</head>

<body>


    <!-- back to top start -->
    <button class="tp-backtotop">
      <span><i class="fa-solid fa-angles-up"></i></span>
   </button>
   <!-- back to top end -->
 
 
    <!-- header area start -->
   <?php include "header.php";?>
   <!-- header area end -->


   <main>
      
      <!-- hero section  -->
      <div class="tp-hero__section pt-80 theme-bg p-relative fix">
         <div class="container">
            <div class="row">
               <div class="col-lg-9">
                  <div class="tp-hero__content pt-40">
<!--   <span class="tp-hero__subtitle text-white mb-10">Education Goal</span>-->                     
                    <h3 class="tp-hero__title text-white mb-15" style="font-size: 50px !important;">online <?=$tutorial_subject;?> Tutorials</h3>
                     <div class="tp-hero__btn-wrappper d-md-flex align-items-center">
                        <div class="hero-btn-1 mr-20 p-relative z-index-1">
						<?php /*?>
                           <a href="course.html" class="tp-btn br-0">
                              <span>Explore Coureses</span>
                              <div class="transition"></div>
                           </a>
						   <?php */?>
                        </div>
                        <div class="hero-btn-2">
						   <?php /*?>
                           <a href="#"
                              class="tp-play-btn d-flex align-items-center popup-video">

                              <i class="arrow_triangle-right"></i>
                              <span>Watch it Now</span>
                           </a>
						   <?php */?>
                        </div>
                     </div>
                  </div>
               </div>
			   <div class="col-lg-3">
			   <img src="<?=$host;?>/assets/img/icons/golang.png" alt="">
			   </div>
               
            </div>
         </div>
         <div class="tp-hero__shapes">
           
            <div class="tp-hero__shapes-4">
               <img src="<?=$host;?>/assets/img/icons/footer-up-bg.png" alt="">
            </div>
            <div class="tp-hero__shapes-5">
               <img src="<?=$host;?>/assets/img/icons/lines-shape.png" alt="">
            </div>
     
         </div>
      </div>
      <!-- hero section end  -->


     
<div class="postbox__area pt-120 pb-120">
         <div class="container">
            <div class="row">
               <div class="col-xxl-8">
                  <div class="postbox__wrapper pr-30">
                     <article class="postbox__item format-image mb-50 transition-3">
                        <div class="postbox__thumb m-img">
                              <img src="assets/img/blog/blog-big-1.jpg" alt="">
                        </div>
                        <div class="postbox__content">
                           
                           <h3 class="postbox__title">The Challenge Of Global Learning In Public Education</h3>
                           <div class="postbox__text">
                             =====================================================
                           </div>

                           
                        </div>
                     </article>
                     
                     
                  </div>
               </div>
               <div class="col-lg-4 col-12">
                  <?php include "sidebar.php"; ?>
               </div>
            </div>
         </div>
      </div>



 

   </main>

<?php include "footer.php";?>

   
</body>

</html>