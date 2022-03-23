<?php
//require_once 'DBManage/Config.php';
//require_once 'DBManage/Database_PDO.php';
//require_once 'DBManage/Crud_PDO.php';
//require_once 'Controler/EventModel.php';


$config = new Config();
$c = $config->getVariables();
$db0 = new Database_PDO($c[0],$c[1],$c[2],$c[3]);
$db = $db0->getConnection();
$crud = new Crud_PDO($db);
$crud -> singleReadAll($MYSQL_query, $arr_par);



//$eventmodel = new EventModel($crud,$MYSQL_query,$arr_par);

echo json_encode($crud->getRecordset());
	
?>