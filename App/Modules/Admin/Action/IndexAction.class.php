<?php
	Class IndexAction extends CommonAction{
		
		Public function index(){
			$this->display();
		}

		Public function logout(){
			session_unset();
			session_destroy();
			$this->redirect('Admin/Login/index');
		}

	
	}
?>