<?php

class ShareModel extends Model{

	public function Index(){
		$this->query('SELECT * FROM shares ORDER BY create_date DESC ');
		$rows = $this->resultSet();
		
		//print_r($rows);

		
		return $rows; //that shit made me loose a lot of time
	}


	public function add(){

		//sanitising the form
		

		if($_POST){

			if (!empty($_POST['title']) || !empty($_POST['body'])){ 

				$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			//HERE WE START INSERTING INTO THE DATABASE
			//insert to mysql
				$this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id) ');
			$this->bind(':title', $post['title']); //binding input with model->bind()
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', 1);
			$this->execute();
			//verify the insertion

			if($this->lastInsertId()){
				//redirecting customer
				header('Location: '.ROOT_URL.'shares');

			}	


		}else{

			Messages::setMsg("Please, fill out the fields", "error");
			
		}

	}

	return;

}
}