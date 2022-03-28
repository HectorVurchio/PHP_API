<?php
if($flag){
		
	// save the uploaded file to the local file system
	
	$uploaded_files = [];
	for($i = 0; $i < count($files["tmp_name"]); $i++){
		if(move_uploaded_file($files["tmp_name"][$i],"{$target_dir}/{$files["name"][$i]}")){
			array_push($uploaded_files,$files["name"][$i]);
			//echo "File {$files["name"][$i]} Uploaded Successfully. \n";
		}else{
			$flag = false;
		    echo "Error Uploading {$files["name"][$i]} File. \n";
			http_response_code(404);
			break;
		}
	}

}

if($flag){
	echo "Data Uploaded Successfully...";
	http_response_code(200);
}
?>