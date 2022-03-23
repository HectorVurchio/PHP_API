<?php  
class Request {
public $method;
public $uri;
public $protocolo;

	function __construct(){
		$this->paramServer();
	}

    private function paramServer(){

		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->uri = $_SERVER['REQUEST_URI'];
		$this->protocolo = $_SERVER['SERVER_PROTOCOL'];
    }
	
	public function excelFiles(){
		//get the name of the upload file
		//echo $_SERVER['DOCUMENT_ROOT'];
		//define ("SITE_ROOT", realpath(dirname(__FILE__)));
		$files = $_FILES["files"];
		$fields = json_decode($_POST["fields"]);
		$target_dir = "{$_SERVER['DOCUMENT_ROOT']}/uploads";
		//print_r($target_dir);
		//print_r($files);
		//print_r($fields);
		/*
		foreach($files as $key => $value){
			print_r($key);
		}
		*/
		/*
		print_r($files["name"]);
		print_r($files["full_path"]);
		print_r($files["type"]);
		print_r($files["tmp_name"]);
		print_r($files["error"]);
		print_r($files["size"]);
		*/
		//which is its name
		foreach($files["name"] as $name){
			$target_file = "{$target_dir}/{$name}";
			// has the file an xlsx extension
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if($imageFileType == "xlsx"){
				echo " The file meet the Extension Requirements. ";
			}else{
				echo " The File Do Not Comply. ";
			}
			// Check if any file already exists
			if (file_exists($target_file)) {
				echo " Sorry, file already exists. ";
			}else{
				echo " Go Ahead. ";
			}
		}
		//Which is tis type
		foreach($files["type"] as $type){
			echo $type." ";
		}
		//which is its size
		foreach($files["size"] as $size){
			echo $size." ";
		}	
		// save the uploaded file to the local file system
		$count = 0;
		foreach($files["tmp_name"] as $tmp_name){
			if(move_uploaded_file($tmp_name,"{$target_dir}/{$files["name"][$count]}")){
				echo "<p>File Uploaded Successfully.</p>";
			}else{
		    	echo "<p>Error Uploading File.</p>";
		    }
			$count++;
		}
		
		
		
		
		//if(move_uploaded_file($_FILES["files"]["tmp_name"][0],SITE_ROOT."/".$location)){
		//	echo "<p>File Uploaded Successfully.</p>";
		//}else{
		//	echo "<p>Error Uploading File.</p>";
		//}
	}
	
}
?>