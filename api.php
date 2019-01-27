<?php 
	
	$db =  mysqli_connect("localhost","root","","testdb") or die("Could not connect to database".mysqli_error($db));
	
	/*if($_REQUEST['function'])
	{
		$function_name=$_REQUEST['function'];

		switch ($function_name) 
			{
				case 'GetCuntry':
					global $db;
					$sql  = mysqli_query($db,"SELECT * from `country_master`");
					$data = array();
					if(mysqli_num_rows($sql)>0)
					{
						$i=0;
						while($row = mysqli_fetch_array($sql))
						{
							$data[$i]['id'] = $row['id'];
							$data[$i]['name'] = $row['country_name'];
							$i++;
						}
						$data = json_encode($data);
						echo $data;
					}
				break;
				case 'Get_state':
					global $db;
					$data = array();
					if(isset($_REQUEST['countryid']) && $_REQUEST['countryid'] !="" )
					{
						$i=0;
						$sql=mysqli_query($db,"Select id,state from `india_state_master` where country_id='".$_REQUEST['countryid']."'");
						while($row=mysqli_fetch_array($sql))
						{
							$data[$i]['id']=$row['id'];
							$data[$i]['name']=$row['state'];
							$i++;
						}
						echo json_encode($data);
					}
					else
					{
						$data['code']= "404";
						$data['status']="page not found";
						echo json_encode($data);
						exit();
					}
					break;
				default:
				
				break;
			}
	}
*/
?>