<?php
class Home extends Controller{
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->ReturnView($viewmodel->Index(), true); //returning the view home to the index file of the home folder
	}
}