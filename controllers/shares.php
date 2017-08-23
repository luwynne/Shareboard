<?php
class Shares extends Controller{

	protected function Index(){

		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->Index(), true);

	}

	protected function add(){ //this function returns the view model

		if(!isset($_SESSION['is_logged_id'])){ //so that the user can only access the add page been logged in

			header('Location: '.ROOT_URL.'shares');


		}else{

			$viewmodel = new ShareModel();
			$this->returnView($viewmodel->add(), true);

		}		
		
		
	}
}