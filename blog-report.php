<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	if($_REQUEST[search_text]!="")
	{
		$SQL="SELECT * FROM blog WHERE blog_title LIKE '%$_REQUEST[search_text]%'";
	}
	else
	{
		$SQL="SELECT * FROM package,blog WHERE blog_package_id = package_id";
	}
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
function delete_blog(blog_id)
{
	if(confirm("Do you want to delete the blog?"))
	{
		this.document.frm_blog.blog_id.value=blog_id;
		this.document.frm_blog.act.value="delete_blog";
		this.document.frm_blog.submit();
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
			<form name="frm_blog" action="lib/blog.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Image</td>
						<td scope="col">Title</td>
						<td scope="col">Package Name</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[blog_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[blog_title]?></td>
						<td><?=$data[package_title]?></td>
						<td style="text-align:center"><a href="blog.php?blog_id=<?php echo $data[blog_id] ?>">Edit</a> | <a href="Javascript:delete_blog(<?=$data[blog_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="blog_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 