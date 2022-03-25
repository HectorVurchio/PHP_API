<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Backend/DBManage/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Backend/DBManage/Database_PDO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Backend/DBManage/Crud_PDO.php';
if($flag){
/*********************************************************************************************/	
    $MYSQL_query = "INSERT INTO upload SET 
											prefix = :pre, 
											machine_name  = :man, 
											test_number  = :ten, 
											start_phase  = :stp, 
											end_phase  = :enp, 
											start_stroke  = :est, 
											end_stroke  = :ens,
											bioethanol = :bio,
											note = :not,
											file_one_name = :fon,
											file_two_name = :ftw,
											file_three_name = :ftr";

    $arr_par=[":pre"=>$fields->{"prefix"},
			   ":man"=>$fields->{"macnam"},
			   ":ten"=>$fields->{"Testnumb"},
			   ":stp"=>$fields->{"start-phase"},
			   ":enp"=>$fields->{"end-phase"},
			   ":est"=>$fields->{"start-stroke"},
			   ":ens"=>$fields->{"end-stroke"},
			   ":bio"=>$fields->{"hydrous-bioethanol"},
			   ":not"=>$fields->{"notes"},
			   ":fon"=>$files["name"][0],
			   ":ftw"=>$files["name"][1],
			   ":ftr"=>$files["name"][2]];

/**********************************************************************************************/	
	$config = new Config();
	$c = $config -> getVariables();
	$database = new Database_PDO($c[0],$c[1],$c[2],$c[3]);
	$db = $database->getConnection();
	$crud = new Crud_PDO($db);
	if($crud -> insertDataOne($MYSQL_query,$arr_par)){
		echo "Data Successfully Logged \n";
		http_response_code(200);
	}else{
		$flag = false;
		print_r (json_encode($crud -> getErrorInfo(),true));
		http_response_code(400);
	}
}else{
	//Header('HTTP/1.1 404 Not Found');
	$flag = false;
}





?>