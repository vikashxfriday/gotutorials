<?php
$total_listing;
$size=$page_limit;
$pagecount=ceil($total_listing/$size);
$page=(isset($_GET['page']))?$_GET['page']:1;
$pagestring="<ul class='pagination mt-4 mb-0 float-end'>";
$page=$page>0 && $pagecount>=$page?$page:1;

		       $start=($page-1)*$size;
		       if(($page != 1) and ($page != ""))
	           {
		       $prev=$page - 1;
               $pagestring.=" <li class='page-item page-prev disabled'><a class='page-link' href='?page=$prev' tabindex='-1'>Prev</a></li>";
			   }

		  $pagingstart=($page>6 ? $page-5:1);
		  $pagingend=$pagingstart+9;
		  
				if($pagingend > $pagecount)
				{
				$pagingend=$pagecount;
				}
				
				 if($pagingstart > 1)
				 {
				 $pagestring.="....";
				 }
				 
		for ($i=$pagingstart;$i<=$pagingend;$i++)
		{ 
			if ($page==$i)
				$pagestring.=" <li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>";
			else
				$pagestring.=" <li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
		}
			//==========================
			if($pagingend < $pagecount)
			{
			$pagestring.="....";
			}

		       if($page != $pagecount)
	           {
		       $next=$page + 1;
               $pagestring.="<li class='page-item page-next'><a class='page-link' href='?page=$next'>Next</a></li>";
			   }
$pagestring.="</ul></nav>";	
echo $pagestring;
?>
