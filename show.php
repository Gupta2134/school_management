<?php $db =  mysqli_connect("localhost","root","","gupta");
?>
<html>
<head>
	<title></title>
	<style type="text/css">
	.pagination a {
	  color: black;
	  float: left;
	  padding: 8px 16px;
	  text-decoration: none;
	  transition: background-color .3s;
	}

	/* Style the active/current link */
	.pagination a.active {
	  background-color: dodgerblue;
	  color: white;
	}
	</style>
</head>
<body>
		<table border="1">
			<tr>
				<th rowspan="2">Document Name</th>
				<th rowspan="2">Document Type</th>
				<th rowspan="2">Document Image</th>
				<th colspan="2">Action</th>
			</tr>
			<tr>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php 
				$rowsPerPage = 10;
				$pageNum = 1;
				if(isset($_GET['page']))
				{
					$pageNum = $_GET['page'];
				}
				$offset = ($pageNum - 1) * $rowsPerPage;
				$sql = mysqli_query($db,"SELECT * FROM `uploading` limit $offset,$rowsPerPage ");
				while($row = mysqli_fetch_array($sql)) { ?>
			<tr>
				<td><?=$row['name'];?></td>
				<td><?=$row['email'];?></td>
				<td><img src="<?php echo $row['file_name'];?>" width="50" height="50"></td>
				<td><a href="editpage.php?edit=<?php echo $row['id'];?>">Edit</a></td>
				<td><a href="editpage.php?edit=<?php echo $row['id'];?>">Delete</a></td>
			</tr>
				<?php } ?>
			<tr class="pagination">
				<td colspan ="5">
				<?php 
					$prepage = isset($_REQUEST['page']) -1 ;
					if($prepage <= 1)
			  		{$prepage = 1; }
				?>
				 	<a href="?page=<?php echo $prepage; ?>">&laquo;</a>
					<?php $row = mysqli_num_rows(mysqli_query($db,"SELECT id FROM `uploading`"));
					$intTotalPages = round($row /10);
					for ($i = 1; $i <= 5; $i++) { ?>
				  		<a href="?page=<?php echo $i;?>" class ="<?php if($_REQUEST['page'] == $i)echo "active";?>"><?php echo $i ?></a>
				  		<?php $nextpage=isset($_REQUEST['page']) +1; } 
				  	if($nextpage >= $intTotalPages)
				  		{$nextpage = $intTotalPages; } ?>
				 	<a href="?page=<?php echo $nextpage; ?>" >&raquo;</a>
				</td>
			</tr>	
		</table>
</body>
</html>