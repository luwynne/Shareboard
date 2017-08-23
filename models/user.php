<?php

//THIS WAS THE OLDE METHOD

// class UserModel extends Model{

// 	public function register(){

// 		//sanitising the form


// 		if($_POST){

// 			if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){ 

// 				$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

// 				$password = md5($post['password']); //encripted password

// 			//HERE WE START INSERTING INTO THE DATABASE
// 			//insert to mysql
// 				$this->query('INSERT INTO shares (name, email, password) VALUES(:name, :email, :password) ');
// 				$this->bind(':name', $post['name']); //binding input with model->bind()
// 				$this->bind(':email', $post['email']);
// 				$this->bind(':password', $password);
// 				$this->execute();
// 				//verify the insertion

// 				if($this->lastInsertId()){
// 					//redirecting customer
// 					header('Location: '.ROOT_URL.'users/login');

// 				}	


// 			}

// 		}

// 		return;
// 	}
// }

class UserModel extends Model{


	public function register(){

		

		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){

			if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){

				Messages::setMsg("Please, fill out the fields", "error");
				return;
			}

			else{	
			// Insert into MySQL
				$this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
				$this->bind(':name', $post['name']);
				$this->bind(':email', $post['email']);
				$this->bind(':password', $password);
				$this->execute();
			// Verify
				if($this->lastInsertId()){
				// Redirect
					header('Location: '.ROOT_URL.'users/login');
				}



			}
		}
		return;
		
	}


	public function login(){

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			// selecting from MySQL and comparing login
			$this->query('SELECT * FROM users WHERE email = :email AND password = :password ');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){ //if the result from the fetch database data

				//then we start the login session
				$_SESSION['is_logged_id'] = true;
				$_SESSION['user_data'] = array(
					'id' => $row['id'], 
					'name' => $row['name'],
					'email' => $row['email']
					);

				header('Location: '.ROOT_URL.'shares');

			}else{
								//passing parameters to incorrection
				Messages::setMsg("Incorrect Login", "error"); //instantiating the static class and the method for setting
				
			}

			
		}
		return;
	}
}