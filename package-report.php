<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	if($_REQUEST[search_text]!="")
	{
		$SQL="SELECT * FROM package WHERE package_name LIKE '%$_REQUEST[search_text]%' OR package_number LIKE '%$_REQUEST[search_text]%'";
	}
	else
	{
		$SQL="SELECT * FROM package";
	}
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
function delete_package(package_id)
{
	if(confirm("Do you want to delete the package?"))
	{
		this.document.frm_package.package_id.value=package_id;
		this.document.frm_package.act.value="delete_package";
		this.document.frm_package.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Car Reports</h4>
			<form name="frm_package" action="lib/package.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Image</td>
						<td scope="col">Title</td>
						<td scope="col">Price Start</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[package_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[package_title]?></td>
						<td><?=$data[package_start_price]?></td>
						<td style="text-align:center"><a href="package.php?package_id=<?php echo $data[package_id] ?>">Edit</a> | <a href="Javascript:delete_package(<?=$data[package_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="package_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 