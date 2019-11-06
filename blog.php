<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[blog_id])
	{
		$SQL="SELECT * FROM blog WHERE blog_id = $_REQUEST[blog_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Add New Post</h4>
				<form action="lib/blog.php" enctype="multipart/form-data" method="post" name="frm_blog">
					<ul class="forms">
						<li class="txt">Title</li>
						<li class="inputfield"><input name="blog_title" type="text" class="bar" required value="<?=$data[blog_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Select Package</li>
						<li class="inputfield">
							<select name="blog_package_id" class="bar" required/>
								<?php echo get_new_optionlist("package","package_id","package_title",$data[blog_package_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Select Culture</li>
						<li class="inputfield">
							<select name="blog_culture_id" class="bar" required/>
								<?php echo get_new_optionlist("culture","culture_id","culture_title",$data[blog_culture_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Select Religion</li>
						<li class="inputfield">
							<select name="blog_religion_id" class="bar" required/>
								<?php echo get_new_optionlist("religion","religion_id","religion_title",$data[blog_religion_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="blog_image" type="file" class="bar"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="blog_description" cols="" rows="6" required><?=$data[blog_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_blog">
					<input type="hidden" name="avail_image" value="<?=$data[blog_image]?>">
					<input type="hidden" name="blog_id" value="<?=$data[blog_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 