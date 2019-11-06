<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM user";
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
function delete_user(user_id)
{
	if(confirm("Do you want to delete the user?"))
	{
		this.document.frm_user.user_id.value=user_id;
		this.document.frm_user.act.value="delete_user";
		this.document.frm_user.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">User Reports</h4>
			<form name="frm_user" action="lib/user.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Image</td>
						<td scope="col">Name</td>
						<td scope="col">Mobile</td>
						<td scope="col">Email</td>
						<td scope="col">Date Of Birth</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[user_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[user_name]?></td>
						<td><?=$data[user_mobile]?></td>
						<td><?=$data[user_email]?></td>
						<td><?=$data[user_dob]?></td>
						<td style="text-align:center"><a href="user.php?user_id=<?php echo $data[user_id] ?>">Edit</a> | <a href="Javascript:delete_user(<?=$data[user_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="user_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 