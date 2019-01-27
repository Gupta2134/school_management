<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
	<div>
		<center><h1>Custom API with Json And PHP</h1>
			<button id="get_api_data">Call API</button>
			<select id="country_list" onchange="Get_state(this.value);">
				<option value=''>--Select--</option>
			</select>
			<select id="state_list">
				<option value=''>--Select--</option>
			</select>
		</center>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		var functionName = "GetState";
		$("#get_api_data").click(function(){
			GetCuntry();
		});
		function GetCuntry()
		{
			var options="";
			$.getJSON("http://localhost/api/api.php?function=GetCuntry",function(data){
				$.each(data,function(index,value){

				 options="<option value="+value.id+">"+value.name+"</option>";
				$("#country_list").append(options);
				});
			});
		}

	});
function Get_state(str)
{
	$.getJSON("http://localhost/api/api.php?function=Get_state&countryid="+str,function(data){
		$.each(data,function(index,value){
				 options="<option value="+value.id+">"+value.name+"</option>";
				$("#state_list").append(options);
				});
			});
}


</script>
