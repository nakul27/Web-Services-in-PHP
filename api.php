<?php
header("Access-Control-Allow-Orgin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

include("funcs.php");
$function_name = $_GET['f'];


switch($function_name){

	Case 'User_Login':
		
		$uid = $_GET['uname'];
		$pwd = $_GET['pwd'];
		$arrayData = User_Login($uid, $pwd);
		if(sizeof($arrayData) > 1 && $arrayData['status'] == 'active'){
			deliver_result(200, "Valid User", $arrayData);
		}else{
			deliver_result(200, "Invalid User", NULL);
		}
		break;	
}

function deliver_result($status, $status_message, $data){

	header("HTTP/1.1 $status, $status_message");
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;

	$json_response = json_encode($response);
	echo $json_response;
}

?>
