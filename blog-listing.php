<?php 
include_once("includes/header.php"); 
include_once("includes/db_connect.php"); 
if($_REQUEST[package_id]) 
	$SQL="SELECT * FROM blog WHERE blog_package_id = ".$_REQUEST['package_id'];
else if($_REQUEST[culture_id]) 
	$SQL="SELECT * FROM blog WHERE blog_culture_id = ".$_REQUEST['culture_id'];
else if($_REQUEST[religion_id]) 
	$SQL="SELECT * FROM blog WHERE blog_religion_id = ".$_REQUEST['religion_id'];
else
	$SQL="SELECT * FROM blog";

$rs=mysql_query($SQL) or die(mysql_error());
global $SERVER_PATH;
?> 
  <div id="content_sec">
    <div class="col1">
    	<div class="blog">
        	<h4 class="heading colr">Latest Posts & Events</h4>
        	<ul>
				<?php
				if(mysql_num_rows($rs)) {
				$i=1;
				while($data = mysql_fetch_assoc($rs))
				{
					if($i++%2 == 0 ) $class= 'class = "last"';
					else $class = "";
				?>
            	<li>
                	<p class="date"><?=date('M',$data[blog_date])?><br /><?=date('d',$data[blog_date])?></p>
                	<h2 class="colr"><?=substr($data[blog_title],0,40)?></h2>
                    <div class="clear"></div>
                    <div class="cont">
                    	<p>
                        	<a href="blog-details.php?blog_id=<?=$data[blog_id]?>" class="thumb"><img src="<?=$SERVER_PATH.'uploads/'.$data[blog_image]?>" alt="" style="width:228px; height: 191px; "/></a>
							<?=substr($data[blog_description],0,650)?>
						</p>
                    </div>
                    <div class="clear"></div>
                    <div class="blog_links">
                    	<a href="blog-details.php?blog_id=<?=$data[blog_id]?>" class="continue">Continue Reading</a>
                        <p class="postedby">Posted on <?=date('l jS \of F Y h:i:s A',$data[blog_date]);?></p>
                    </div> 
                </li>
				<?php
				}
				}
				else {
				?>
				<div class = "msg">No recors found !!!</div>
				<?php
				}?>
            </ul>
        </div>
    </div>
	<div class="col2">
		<div class="categories" style="width: 250px">
        	<h4 class="heading colr">Search & Filters</h4>
            <ul id="menu" style="width: 250px">
                <li>
                    <a href="#">Services and Packages</a>
                    <ul>
						<?php
							$SQL="SELECT * FROM package";
							$rs=mysql_query($SQL) or die(mysql_error());
							while($data = mysql_fetch_assoc($rs)) {
						?>
							<li><a href="blog-listing.php?package_id=<?=$data['package_id']?>"><?=$data['package_title']?></a></li>
                        <?php
							}
						?>
                    </ul>
                </li>
                <li>
                    <a href="#">Cultural</a>
                    <ul>
                        <?php
							$SQL="SELECT * FROM culture";
							$rs=mysql_query($SQL) or die(mysql_error());
							while($data = mysql_fetch_assoc($rs)) {
						?>
							<li><a href="blog-listing.php?culture_id=<?=$data['culture_id']?>"><?=$data['culture_title']?></a></li>
                        <?php
							}
						?>
                    </ul>
                </li>
                <li>
                    <a href="#">Region</a>
                    <ul>
                        <?php
						$SQL="SELECT * FROM religion";
						$rs=mysql_query($SQL) or die(mysql_error());
						while($data = mysql_fetch_assoc($rs)) {
						?>
							<li><a href="blog-listing.php?religion_id=<?=$data['religion_id']?>"><?=$data['religion_title']?></a></li>
						<?php
							}
						?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
		<?php include_once("includes/sidebar.php"); ?>
		<div><img src="images/save_2.jpg" style="width: 250px"></div>
	</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<?php include_once("includes/footer.php"); ?> 