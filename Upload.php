<?php 
$db =  mysqli_connect("localhost","root","","gupta");
if(isset($_POST['Upload']))
{
	if(!empty($_POST['docname']) || !empty($_POST['doctype']) || !empty($_POST['filename']))
	{
		$docname=$_POST['docname'];
		$doctype=$_POST['doctype'];
		$filename=$_FILES['filename']['name'];
		$tmpname=$_FILES['filename']['tmp_name'];

		$filepath = "images/".$filename;
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt');
		$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
		if(in_array($ext, $valid_extensions))
		{
			/*if(move_uploaded_file($tmpname, $filepath))
			{*/
				if(isset($_POST['Save'])=='Save')
				{
					$sql = mysqli_query($db,"INSERT INTO `uploading`(name,email,file_name) VALUES ('".$docname."','".$doctype."','".$filepath."')");
					
					if($sql){echo "Saved Successfully";}
				}
				else{
					/*$file=mysqli_fetch_array(mysqli_query($db,"SELECT `file_name` FROM `uploading` WHERE id='".$_REQUEST['Edit']."'"));
					unlink($file['file_name']);*/
					$sql = mysqli_query($db,"UPDATE `uploading` SET `name`='".$docname."',`email`='".$doctype."',`file_name`='".$filepath."' WHERE `id`='".$_REQUEST['Edit']."'");
					
					if($sql){echo "Update Successfully";}
				}
			/*}*/
		}
		else
		{
			echo "File Formate Not Support !";
		}
	}
	else
	{
		echo "Somthing Went wrong !";
	}
}

?>