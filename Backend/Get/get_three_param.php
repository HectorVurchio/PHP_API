<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Backend/DBManage/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Backend/DBManage/Database_PDO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Backend/DBManage/Crud_PDO.php';
/***************************************/
$query_par = ['_limit','_page'];
/**************************************/
$parameters = explode('&',$_SERVER['QUERY_STRING']);
$vals = [];
if(count($parameters) == count($query_par)){
	$c = 0;
	foreach($parameters as $key=>$value){
		$val_ex = explode('=',$value);
		if($query_par[$c] == $val_ex[0]){
			array_push($vals,$val_ex[1]);
		}else{
			break;
		}
		$c++;
	}
/*********************************************************************************************/	
    $MYSQL_query_one = "SELECT * FROM $path_arr[1]";
	$MYSQL_query_two = "SELECT * FROM $path_arr[1] LIMIT ? OFFSET ?";
	//two parameters pagination
	if(isset($vals[1])){
		$arr_par = ['1' => $vals[0],'2'=>intval($vals[0])*intval($vals[1])- intval($vals[0])];
	}else{
		$arr_par = ['1' => 0, '2'=> 0];
	}
/**********************************************************************************************/	
	$config = new Config();
	$c = $config -> getVariables();
	$database = new Database_PDO($c[0],$c[1],$c[2],$c[3]);
	$db = $database->getConnection();
	$crud = new Crud_PDO($db);
	$second_query = false;
	$number_of_items = 0;
	
	if($crud -> singleRead($MYSQL_query_one)){
		$number_of_items = $crud -> getRecordsNumber();
		$second_query = true;
	}

	if($crud -> singleReadAll($MYSQL_query_two,$arr_par) && $second_query){
		
		header('Content-Type: application/json');
		echo json_encode(array("RecSet"=>$crud -> getRecordset(),
		                       "NumSet"=>$number_of_items),JSON_PRETTY_PRINT);
		
		http_response_code(200);
	}else{
		print_r (json_encode($crud -> getErrorInfo(),true));
		http_response_code(400);
	}
}else{
	Header('HTTP/1.1 404 Not Found');
}





?>