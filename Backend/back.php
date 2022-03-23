<?php
require_once 'DBManage/Config.php';
require_once 'DBManage/Database_PDO.php';
	
//how long is the url?
$url_path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$path_arr = explode('/',$url_path);
$url_length = count($path_arr);
//has parameters?
$param = explode('?',$_SERVER['REQUEST_URI']);

switch($url_length){
	case 2:
		if(isset($param[1])){ //   http://localhost/events?_limit=2&_page=1
			if($path_arr[1] == 'events'){include_once 'GET/get_three_param.php';}
		}else{
			
		}
	break;
	case 3:
		if(isset($param[1])){ //has param   http://localhost/events/123?_limit=2&_page=1
			Header('HTTP/1.1 404 Not Found');
		}else{ //no param   http://localhost/events/123
			if($path_arr[1] == 'events'){include_once 'GET/get_three.php';}	
		}
	break;
	default:
		//Header('HTTP/1.1 404 Not Found');
	
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/*
$url_path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$query_par = [];
$params = [];
$arr_par_case = 0;
$url_path_exp = explode('/',$url_path);
$suit = true;
$suit2 = true;
$suit3 = true;
$MYSQL_query = '';


$url_path = (count($url_path_exp) == 3) ? "/{$url_path_exp[1]}/id" : $url_path;
switch($url_path){
	case '/events':
		$query_par = ['_limit','_page'];
		$MYSQL_query = "SELECT * FROM events LIMIT ? OFFSET ?";
		$params = explode('&',$_SERVER['QUERY_STRING']);
		$par_num = count($query_par);
		$suit = ($suit && count($params) == $par_num) ? true : false;
		if($suit){
			$c = 0;
			while($c < $par_num && $suit2){
				$par = explode('=',$params[$c]);
				if(count($par) == 2 && $par[0] == $query_par[$c] && $par[1]>0){
					array_push($param_val,$par[1]);
				}else{
					$suit2 = false;
				}
				$c++;
			}
		}
		
		
		
		
		
		$arr_par_case = 1;
		break;
	case '/events/id':
		$MYSQL_query = "SELECT * FROM events WHERE id= ? LIMIT 1";
		$arr_par_case = 2;
		break;
}



$param_val = [];



$url = '';
$arr_par = [];


switch($arr_par_case){
	case 1:
		$arr_par = ['1' => $param_val[0],'2'=>intval($param_val[0])*intval($param_val[1])- intval($param_val[0])];
		break;
	case 2:
		$arr_par = ["1" => $url_path_exp[2]];
		$url = "/{$url_path_exp[1]}/{$url_path_exp[2]}";
		break;
}

$request_method = $_SERVER['REQUEST_METHOD'];

if($suit && $suit2){
	$suit3 = false;
	
	//require_once 'DBManage/Crud_PDO.php';
	$config = new Config();
	$c = $config->getVariables();
	$db0 = new Database_PDO($c[0],$c[1],$c[2],$c[3]);
	$db = $db0->getConnection();
	
	
	$q = "SELECT * FROM events WHERE id= ? LIMIT 1";
	$pdoStatement = $db->prepare($q);
	
		$pdoStatement->bindValue(1,'123');

	$pdoStatement->execute();
	echo json_encode($pdoStatement->fetch(PDO::FETCH_ASSOC));
	
*/	
	/*
	$crud = new Crud_PDO($db);
	$crud -> singleReadAll($MYSQL_query, $arr_par);
	echo json_encode($crud->getRecordset());
	*/
	
//}
/*
if($suit3){
	$router->get('/', function() {
		 readfile('FrontEnd/land.html',true);
	});
	
	$router->get('/events', function() {
		 echo 'Direccion events';
	});
}*/
?>