<?php

	Class IndexAction extends Action{
		
		Public function index(){
			$wish = M('wish')->select();
			$this->assign('wish',$wish)->display();

		}

		Public function handle(){
			if (!IS_AJAX) 	halt('页面不存在');
			$data = array (
				'username' => I('username'),
				'content' => I('content'),
				'time' => time()
			);
			
			
			if ($id = M('wish')->data($data)->add()){
				$data['id'] = $id;
				$data['content'] = replace_phiz($data['content']);
				$data['time'] = date('y-m-d', $data['time']);
				$data['status'] = 1;
				$this->ajaxReturn($data,'json');
			}else{
				$this->ajaxReturn(array('status'=>0),'json');
			}

		}
	}
?>