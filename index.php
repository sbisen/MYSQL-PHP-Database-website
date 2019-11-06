<?php 
include_once("includes/header.php"); 
include_once("includes/db_connect.php"); 
if($_REQUEST[pt_id])
{
	$SQL="SELECT * FROM package WHERE package_pt_id = ".$_REQUEST['pt_id']." LIMIT 10";	
} else {
	$SQL="SELECT * FROM package LIMIT 10";
}
$rs=mysql_query($SQL) or die(mysql_error());
global $SERVER_PATH;
?> 
	<div id="banner">
    	<div class="left">
        	<div class="anythingSlider">
        
          <div class="wrapper">
            <ul>
               <li><a href="#"><img src="./images/banner2.jpg" alt="" /></a></li>
               <li><a href="#"><img src="./images/banner1.jpg" alt="" /></a></li>
               <li><a href="#"><img src="./images/banner3.jpg" alt="" /></a></li>
            </ul>        
          </div>
          
        </div>
        </div>
    </div>
    <div class="clear"></div>
  <script type="text/javascript" src="./js/cont_slide.js"></script>
  <div id="content_sec">
     <div class="col1">
		<h4 class="heading colr">Services & Packages</h4>
    	<div class="news">
            <ul>
				<?php
				$i=1;
				while($data = mysql_fetch_assoc($rs))
				{
					if($i++%2 == 0 ) $class= 'class = "last"';
					else $class = "";
				?>
            	<li <?php echo $class; ?>>
                	<span class="newsdate" style="margin-left:227px">MYR <?=$data[package_start_price]?></span>
                	<h6 class="last"><?=$data[package_title]?></h6>
                    <a href="blog-listing.php?package_id=<?=$data['package_id']?>" class="thumb"><img src="<?=$SERVER_PATH.'uploads/'.$data[package_image]?>" alt="" style="height:163px; width:266px;"/></a>
                    <p>
                    	<?=$data[package_description]?>
                    </p>
                    <div class="news_links">
                    	<a href="#" class="readmore left">Read More</a>
                    </div>
                </li>
				<?php
				}
				?>
            </ul>
        </div>
    </div>
	<div class="col2">
		<?php include_once("includes/sidebar.php"); ?>
		<div><img src="images/save_2.jpg" style="width: 250px"></div>
		<div><img src="images/save_3.jpg" style="width: 250px"></div>
		<div><img src="images/save_4.jpg" style="width: 250px"></div>
		<div><img src="images/save_5.jpg" style="width: 250px"></div>
	</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<?php include_once("includes/footer.php"); ?> 