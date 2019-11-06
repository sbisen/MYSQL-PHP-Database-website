<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[quote_id])
	{
		$SQL="SELECT * FROM quote WHERE quote_id = $_REQUEST[quote_id]";
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
				<h4 class="heading colr">Request for Quotations</h4>
				<form action="lib/quote.php" enctype="multipart/form-data" method="post" name="frm_car">
					<ul class="forms">
						<li class="txt">Select Package</li>
						<li class="inputfield">
							<select name="quote_package_id" class="bar" required/>
								<?php echo get_new_optionlist("package","package_id","package_title",$data[quote_package_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Name</li>
						<li class="inputfield"><input name="quote_name" type="text" class="bar" required value="<?=$data[quote_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Mobile</li>
						<li class="inputfield"><input name="quote_mobile" type="text" class="bar" required value="<?=$data[quote_mobile]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="quote_email" type="text" class="bar" required value="<?=$data[quote_email]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Budget for Events</li>
						<li class="inputfield"><input name="quote_budget" type="text" class="bar" required value="<?=$data[quote_budget]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Number of Guests</li>
						<li class="inputfield"><input name="quote_guests" type="text" class="bar" required value="<?=$data[quote_guests]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Event Details</li>
						<li class="textfield"><textarea name="quote_event_details" cols="" rows="6" required><?=$data[quote_event_details]?></textarea></li>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="quote_description" cols="" rows="6" required><?=$data[quote_description]?></textarea></li>
						</li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit Quotation" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="quote_id" value="<?=$data[quote_id]?>">
					<input type="hidden" name="act" value="save_quote">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
			<div><img src="images/save_5.jpg" style="width: 250px"></div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 