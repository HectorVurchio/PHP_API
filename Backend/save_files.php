<?php
if($flag){
		
	// save the uploaded file to the local file system
	

	for($i = 0; $i < count($files["tmp_name"]); $i++){
		if(move_uploaded_file($files["tmp_name"][$i],"{$target_dir}/{$files["name"][$i]}")){
			echo "File {$files["name"][$i]} Uploaded Successfully. \n";
		}else{
		    echo "Error Uploading {$files["name"][$i]} File. \n";
		}
	}

}
?>