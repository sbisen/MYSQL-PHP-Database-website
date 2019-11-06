<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[package_id])
	{
		$SQL="SELECT * FROM package WHERE package_id = $_REQUEST[package_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
	global $SERVER_PATH;
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Package Detail Form</h4>
				<form action="lib/package.php" enctype="multipart/form-data" method="post" name="frm_package">
					<ul class="forms">
						<li class="txt">Select Package Type</li>
						<li class="inputfield">
							<select name="package_pt_id" class="bar" required/>
								<?php echo get_new_optionlist("package_type","pt_id","pt_title",$data[package_pt_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Title</li>
						<li class="inputfield"><input name="package_title" id="package_title" type="text" class="bar" required value="<?=$data[package_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Pricing Start From</li>
						<li class="inputfield"><input name="package_start_price" id="package_start_price" type="text" class="bar" required value="<?=$data[package_start_price]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="package_image" id="package_image" type="file" class="bar"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="package_description" cols="" rows="6" required><?=$data[package_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Save Package" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_package">
					<input type="hidden" name="avail_image" value="<?=$data[package_image]?>">
					<input type="hidden" name="package_id" value="<?=$data[package_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 