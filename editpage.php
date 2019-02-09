<?php 
	$db =  mysqli_connect("localhost","root","","gupta"); 
	$sql = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `uploading` WHERE id='".$_REQUEST['edit']."'"));
	extract($sql);
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="" enctype="multipart/form-data" id="form"> 
		<table border="1">
			<tr>
				<td>Document Name :</td>
				<td><input type="text" name= "docname" value="<?php echo $name; ?>"></td>
			</tr>
			<tr>
				<td>Document Type :</td>
				<td><input type="text" name= "doctype" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td>Upload Document :</td>
				<td><input type="file" name= "filename" ><span><?php echo $file_name; ?></span></td>
			</tr>
			<tr>
				<td colspan="2"><center>
					<input type="hidden" name="Edit" value="<?php echo $id; ?>"/>
					<input type="submit" name="Upload" value="Update" /></center>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$("#form").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			url: 'Upload.php',
			type: "POST",
			data : new FormData(this),
		   	contentType: false,
		    cache: false,
		   	processData: false,
		   	success:function(data)
		   	{
		   		alert(data);
		   	}
		});
	}));
</script>