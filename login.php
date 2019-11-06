<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[car_id])
	{
		$SQL="SELECT * FROM car WHERE car_id = $_REQUEST[car_id]";
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
					<h4 class="heading colr">Administration Login</h4>
					<div class='msg'><?=$_REQUEST['msg']?></div>
					<form action="lib/login.php" method="post" name="frm_car">
						<ul class="forms">
							<li class="txt">Username</li>
							<li class="inputfield"><input name="user_user" type="text" class="bar" required /></li>
						</ul>
						<ul class="forms">
							<li class="txt">Password</li>
							<li class="inputfield"><input name="user_password" type="password" class="bar" required /></li>
						</ul>
						<div class="clear"></div>
						<ul class="forms">
							<li class="txt">&nbsp;</li>
							<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
							<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
						</ul>
						<input type="hidden" name="act" value="check_login">
					</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 