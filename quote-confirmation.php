<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[booking_id])
	{
		$SQL="SELECT * FROM car,company,booking WHERE car_company = company_id AND car_id = booking_car_id AND booking_id = $_REQUEST[booking_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
	$R = $_REQUEST;
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class='msg'>
			We got your quotations. We will get back to you soon !!!!
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 