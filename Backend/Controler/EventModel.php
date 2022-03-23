<?php
	
	class EventModel {

		public function __construct($crud,$query,$param){
			$this->crud = $crud;
			$this->query = $query;
			$this->param = $param;
		}
		public function getEvents(){
			
			if($this->crud->singleReadAll($this->query, $this->param)){
				return $this->crud->getRecordset();
			}else{
				return $this->crud->getErrorInfo();
			}
		}
	}
?>