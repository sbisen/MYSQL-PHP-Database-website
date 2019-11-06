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
			<div class="contact" style="font-size:14px;">
				<h4 class="heading colr">About Online Wedding Planner</h4>
				<p>
				I am professionally a management graduate with over 13 years of experience planning & organising destination weddings all over India. I have helped more than 350 overseas couples to see their “dream day” coming true. I am  confident in easing out every single bit of “overseas wedding planning”, like to take up challenging jobs and extra ordinary commitments. Goa, Rajasthan & Kerala are my favorite destinations.
				</p>
				<p>
				Proud to be recognised as one of the very first Destination Wedding Planners in Asia (premier in India) having interviewed by International Publications like New York Times, Times of India, Wedding Affair and many more. Actively involved in evolving several Palace Hotels and Beach Resorts as Wedding location.
				</p>
				<p>
				Take some time to read  Articles related to Destination Weddings in India under “Useful Tips” section or browse through some Videos and Picture Presentations. Feel free to Email or fill the contact form. I assure you of a prompt response.
				</p>

			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 