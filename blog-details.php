<?php 
include_once("includes/header.php"); 
include_once("includes/db_connect.php"); 
if($_REQUEST[blog_id])
{
	$SQL="SELECT * FROM blog WHERE blog_id = $_REQUEST[blog_id]";
	$rs=mysql_query($SQL) or die(mysql_error());
	$data=mysql_fetch_assoc($rs);
}
global $SERVER_PATH;
?> 
  <div id="content_sec">
    <div class="col1">
    	<div class="blog">
        	<h4 class="heading colr">Posts</h4>
        	<ul>
            	<li style="width:100%">
                	<p class="date"><?=date('M',$data[blog_date])?><br /><?=date('d',$data[blog_date])?></p>
                	<h2 class="colr" style="width:86%"><?=$data[blog_title]?></h2>
                    <div class="clear"></div>
                    <div class="cont" style="width:95%; text-align:justify;">
                    	<p><a href="#" class="thumb"><img src="<?=$SERVER_PATH.'uploads/'.$data[blog_image]?>" alt="" style="width:640px;"/></a></p>
						<p style="clear:both;"><?=nl2br($data[blog_description])?></p>
                    </div>
                    <div class="clear"></div>
                    <div class="blog_links">
                        <p class="postedby">Posted on <?=date('l jS \of F Y h:i:s A',$data[blog_date]);?></p>
                    </div> 
                </li>
            </ul>
        </div>
    </div>
	<div class="col2">
		<?php include_once("includes/sidebar.php"); ?>
		<div><img src="images/save_2.jpg" style="width: 250px"></div>
	</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<?php include_once("includes/footer.php"); ?> 