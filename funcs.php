<?php

require_once("db_connector.php");

function User_Login($userName, $Password){

	// Converting the raw password string into md5 because in database password would be stored after converting into md5
	$Password = md5($Password);

	//Quering the database for selected username.
	$result = mysql_query("SELECT * from users WHERE username = '$userName' AND password = '$Password' LIMIT 1" ) or die('Could Not Query');
	
	//If username exist in database.
	if(mysql_num_rows($result)){
		
		//Fetch the results from database.
		$row=mysql_fetch_row($result);
        
		//Copying the result from database in local array.
		$returnArray['user_id'] = $row[0];
		$returnArray['username'] = $row[1];
		$returnArray['email'] = $row[2];
		$returnArray['display_name'] = $row[3];
		$returnArray['password'] = $row[4];
		$returnArray['status'] = $row[5];
    
	} else { // If username does not exist in database.
		$returnArray = "";
	}

	return $returnArray;

}

?>