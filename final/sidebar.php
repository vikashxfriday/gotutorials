<div class="sidebar__wrapper pl-20">
                     
                     <div class="sidebar__widget mb-40">
                        <h3 class="sidebar__widget-title"><?=$tutorial_subject;?></h3>
                        <div class="sidebar__widget-content">
                           <ul>
<?php
$query = "SELECT `title` FROM `itio_tutorial_menu` WHERE `title_id`='$tutorial_id' AND `status`=1 ORDER BY `title` ASC";
$qrs=mysqli_query($con,$query);
while($rs=mysqli_fetch_array($qrs)){
?>
<li class="go_cat_menu"><a href="<?=$host;?>/<?=make_url($menu);?>/<?=make_url($rs['title']);?>-in-<?=$menu;?>.html"><?=$rs['title'];?></a></li>
<?php } ?>
                              
                           </ul>
                        </div>
                     </div>
                     <div class="sidebar__widget mb-40">
                        <h3 class="sidebar__widget-title">Go Exercises</h3>
                        <div class="sidebar__widget-content wd-hide-border">
                           <ul>
                              <li><a href="blog.html">Web Design</a> </li>
                              <li><a href="blog.html">Branding Design </a></li>
                              <li><a href="blog.html">Photography </a> </li>
                              <li><a href="blog.html">Business Statergy</a></li>
                              <li><a href="blog.html">UI/UX Deisgn</a></li>
                              <li><a href="blog.html">Web Development</a></li>
                           </ul>
                        </div>
                     </div>
					 
					 <div class="sidebar__widget mb-40">
                        <h3 class="sidebar__widget-title">Other Tutorials</h3>
                        <div class="sidebar__widget-content wd-hide-border">
                           <ul>
                              <li><a href="blog.html">Web Design</a> </li>
                              <li><a href="blog.html">Branding Design </a></li>
                              <li><a href="blog.html">Photography </a> </li>
                              <li><a href="blog.html">Business Statergy</a></li>
                              <li><a href="blog.html">UI/UX Deisgn</a></li>
                              <li><a href="blog.html">Web Development</a></li>
                           </ul>
                        </div>
                     </div>
                   
                  </div>