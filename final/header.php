<!-- header area start -->
   <header>
      <div class="tp-header__area tp-header__transparent">
         <div class="tp-header__main" id="header-sticky">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                     <div class="logo has-border">
                        <a href="<?=$host;?>/">
                           <img src="<?=$host;?>/assets/img/logo/go-logo.png" alt="logo" >
                        </a>
                     </div>
                  </div>
                  <div class="col-xxl-8 col-xl-8 col-lg-8 d-none d-lg-block">
                     <div class="main-menu">
                        <nav id="mobile-menu">
                           <ul>
                              <li class="has-dropdown">
                                 <a >Languages</a>
                                 <ul class="submenu">
                                    <li><a href="<?=$host;?>/golang/">GoLang</a></li>
                                    <li><a href="<?=$host;?>/php/">PHP</a></li>
									<li><a href="<?=$host;?>/java/">Java</a></li>
				  <li><a href="<?=$host;?>/python/">Python</a></li>
				  <li><a href="<?=$host;?>/kotlin/">Kotlin</a></li>
                                 </ul>
                              </li>
                              
                              <li class="has-dropdown">
                                 <a>Web Technologies</a>
                                 <ul class="submenu">
<li><a href="<?=$host;?>/html/">HTML</a></li>
<li><a href="<?=$host;?>/css/">CSS</a></li>
<li><a href="<?=$host;?>/javascript/">JavaScript</a></li>
<li><a href="<?=$host;?>/typescript/">TypeScript</a></li>
<li><a href="<?=$host;?>/reactjs/">ReactJS</a></li>
<li><a href="<?=$host;?>/nextjs/">NextJS</a></li>
<li><a href="<?=$host;?>/nodejs/">NodeJs</a></li>
<li><a href="<?=$host;?>/bootstrap/">Bootstrap</a></li>

                                 </ul>
                              </li>
                              <li class="has-dropdown">
                                 <a>DevOps</a>
                                 <ul class="submenu">
                                    <li><a href="<?=$host;?>/git/">Git</a></li>
                                    <li><a href="<?=$host;?>/aws/">AWS</a></li>
                                    <li><a href="<?=$host;?>/docker/">Docker</a></li>
                                    <li><a href="<?=$host;?>/kubernetes/">Kubernetes</a></li>
                                    <li><a href="<?=$host;?>/azure/">Azure</a></li>
                                    <li><a href="<?=$host;?>/gcp/">GCP</a></li>
                                    
                                 </ul>
                              </li>
                              <li class="has-dropdown">
                                 <a href="">Databases</a>
                                 <ul class="submenu">
                                    <li><a href="<?=$host;?>/sql/">SQL</a></li>
                                    <li><a href="<?=$host;?>/mysql/">MYSQL</a></li>
									<li><a href="<?=$host;?>/postgresql/">PostgreSQL</a></li>
                                    <li><a href="<?=$host;?>/mongodb/">MongoDB</a></li>
									<li><a href="<?=$host;?>/mariadb/">MariaDB</a></li>
                                 </ul>
                              </li>
							  <?php /*?><li class="has-dropdown">
                                 <a href="">Databases</a>
                                 <ul class="submenu">
                                    <li><a href="<?=$host;?>/SQL/">SQL</a></li>
                                    <li><a href="<?=$host;?>/MYSQL/">MYSQL</a></li>
									<li><a href="<?=$host;?>/PostgreSQL/">PostgreSQL</a></li>
                                    <li><a href="<?=$host;?>/MongoDB/">MongoDB</a></li>
									<li><a href="<?=$host;?>/PLSQL/">PL/SQL</a></li>
                                 </ul>
                              </li><?php */?>
							  
							  
                              
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                     <div class="tp-header__main-right d-flex justify-content-end align-items-center">
                        <div class="header-acttion-btns d-flex align-items-center d-none d-md-flex"></a>
                           <a href="<?=$host;?>/interviews/" class="tp-btn br-0">
                              <span>Interviews<i class="fa-solid fa-arrow-right"></i> </span>
                              <div class="transition"></div>
                           </a>
                        </div>
                        <div class="tp-header__hamburger ml-50 d-lg-none">
                           <button class="hamburger-btn offcanvas-open-btn">
                              <span></span>
                              <span></span>
                              <span></span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- header area end -->
   <!-- header area end -->

   <!-- offcanvas area start -->
   <div class="offcanvas__area" >
      <div class="offcanvas__wrapper">
         <div class="offcanvas__content">
            <div class="offcanvas__close text-end">
               <button class="offcanvas__close-btn offcanvas-close-btn">
                  <i class="fa fa-times"></i>
               </button>
            </div>
            <div class="offcanvas__top mb-40">
               <div class="offcanvas__subtitle">
                  <span class="text-white d-inline-block mb-25 d-none d-lg-block">ELEVATE YOUR BUSINESS WITH</span>
               </div>
               <div class="offcanvas__logo mb-40">
                  <a href="/">
                     <img src="<?=$host;?>/assets/img/logo/go-logo.png" alt="logo">
                  </a>
               </div>
               <div class="offcanvas-info d-none d-lg-block">
                  <p>Limitless customization options & Elementor compatibility let anyone create a beautiful website
                     with Valiance. </p>
               </div>
               <div class="offcanvas__btn d-none d-lg-block">
                  <a href="contact.html" class="tp-btn">Contact us <span></span></a>
               </div>
            </div>
            <div class="mobile-menu fix mb-40"></div>


            
         </div>
      </div>
   </div>

   <div class="body-overlay"></div>
   <!-- offcanvas area end -->