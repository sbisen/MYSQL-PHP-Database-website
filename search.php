<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[start_price] && $_REQUEST[end_price])
	{
		$SQL="SELECT * FROM package WHERE package_start_price BETWEEN ".$_REQUEST['start_price']." AND ".$_REQUEST['end_price'];	
		$rs=mysql_query($SQL) or die(mysql_error());
	}
	global $SERVER_PATH;
?> 

<div class="crumb">
</div>
<div class="clear"></div>
<div id="content_sec">
	<div class="col1">
		<div class="contact">
			<h4 class="heading colr">Search Packages and Services</h4>
			<form action="search.php" enctype="multipart/form-data" method="post" name="frm_car">
				<ul class="forms">
					<li class="txt">Start Price</li>
					<li class="inputfield"><input name="start_price" id="start_price" type="text" class="bar" required/></li>
				</ul>
				<ul class="forms">
					<li class="txt">End Price</li>
					<li class="inputfield"><input name="end_price" id="end_price" type="text" class="bar" required/></li>
				</ul>
				<div class="clear"></div>
				<ul class="forms">
					<li class="txt">&nbsp;</li>
					<li class="textfield"><input type="submit" value="Search Package" class="simplebtn"></li>
					<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
				</ul>
				<input type="hidden" name="act" value="save_car">
				<input type="hidden" name="car_id" value="<?=$data[car_id]?>">
			</form>
		</div>
		<?php if(mysql_num_rows($rs)) { ?>
		<div class="cartsecs" style="clear:both; width:100%">
			<h4 class="heading colr">Choose Your Package & Services</h4>
			<ul>
			<?php
				while($data = mysql_fetch_assoc($rs))
				{
			?>
				<li>
					<div class="thumb">
						<a href="#"><img src="<?=$SERVER_PATH.'uploads/'.$data[package_image]?>" alt="" style="width:92px; height:78px"/></a>
					</div>
					<div class="conts">
						<a href="#" class="black bold"><?=$data[package_title]?></a>
						<p>Starting Price : <?=$data[package_start_price]?></p>
						<p style="width:240px">Description : <?=$data[package_description]?></p>
					</div>
					<div style="float:right; padding:20px 57px 20px 100px; border-left:1px solid #cccccc">
						<a href="quote.php" class="simplebtn left">Request For Quotation</a>
					</div>
				</li>
				<?php } ?>
			</ul>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
	<div class="col2">
		<?php include_once("includes/sidebar.php"); ?> 
	</div>
</div>
<?php include_once("includes/footer.php"); ?> 