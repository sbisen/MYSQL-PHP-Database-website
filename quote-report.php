<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php");
	if($_SESSION['user_details']['user_level_id'] == 3)
	{		
		$SQL="SELECT * FROM package, quote WHERE package_id = quote_package_id AND quote_email = '".$_SESSION['user_details']['user_email']."'";
	}
	else
	{
		$SQL="SELECT * FROM package, quote WHERE package_id = quote_package_id";
	}
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
function delete_quote(quote_id)
{
	if(confirm("Do you want to delete the quote?"))
	{
		this.document.frm_quote.quote_id.value=quote_id;
		this.document.frm_quote.act.value="delete_quote";
		this.document.frm_quote.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Quote Reports</h4>
				<div class = "msg"><?=$_REQUEST['msg']?></div>
			<?php if(mysql_num_rows($rs)) { ?>
			<form name="frm_quote" action="lib/quote.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Name</td>
						<td scope="col">Package</td>
						<td scope="col">Email</td>
						<td scope="col">Mobile</td>
						<td scope="col">Budget</td>
						<td scope="col">Guests</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><?=$data[quote_name]?></td>
						<td><?=$data[package_title]?></td>
						<td><?=$data[quote_email]?></td>
						<td><?=$data[quote_mobile]?></td>
						<td><?=$data[quote_budget]?></td>
						<td><?=$data[quote_guests]?></td>
						<td style="text-align:center"><a href="quote.php?quote_id=<?php echo $data[quote_id] ?>">Edit</a> | <a href="Javascript:delete_quote(<?=$data[quote_id]?>)">Delete</a> </td>
					  </tr>
					<?php } 
					}
					else {
					?>
						<div class = "msg">No Quotations Found !!!</div>
					<?php
					}?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="quote_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 