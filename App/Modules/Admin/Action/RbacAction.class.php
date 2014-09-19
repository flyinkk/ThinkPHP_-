<?php
	Class RbacAction extends CommonAction{
		
		Public function index(){
			$this->user = D('UserRelation')->relation(true)->field('password',true)->select();
			$this->display();
		}

		Public function role(){
			
			$this->role = M('role')->select();
			$this->display();
		}

		Public function node(){
			$node = M('node')->order('sort')->select();
			$this->node = node_merge($node);
			//p($node);
			//die();
			$this->display();
		}

		Public function addUser(){
			$this->role = M('role')->select();
			$this->display();
		}

		Public function addUserHandle(){
			$user = array(
				'username' => I('username'),
				'password' => I('password','','md5'),
				'logintime' => time(),
				'loginip' => get_client_ip()
			);
			
			$role_user = array();

			if($uid = M('user')->add($user)){
				foreach ($_POST['role_id'] as $v){
					$role_user[] = array(
						'role_id' => $v,
						'user_id' => $uid
					);
				}
				M('role_user')->addAll($role_user);
				$this->success('添加成功',U('Admin/Rbac/index'));
			}else{
				$this->error('添加失败');
			}
		}

		Public function addRole(){
			
			$this->display();
		}

		Public function addRoleHandle(){
			if(M('role')->add($_POST)){
				$this->success('添加成功',U('Admin/Rbac/role'));
			}else{
				$this->error('添加失败');
			}
		}

		Public function addNode(){
			$this->pid = I('pid',0,'intval');
			$this->level = I('level',1,'intval');

			switch($this->level){
				case 1:
					$this->type = '应用';
					break;
				case 2:
					$this->type = '控制器';
					break;
				case 3:
					$this->type = '动作方法';
					break;
			}

			$this->display();
		}

		Public function addNodeHandle(){
			if(M('node')->add($_POST)){
				$this->success('添加成功',U('Admin/Rbac/node'));
			}else{
				$this->error('添加失败');
			}
		}

		Public function access(){
			
			$rid = I('rid',0,'intval');
			$node = M('node')->order('sort')->select();

			$access = M('access')->where(array('role_id' => $rid))->getField('node_id', true);
			$this->node = node_merge($node,$access);
			$this->rid = $rid;
			$this->display();
		}

		Public function setAccess(){
			$rid = I('rid',0,'intval');
			$db = M('access');
			$db->where(array('role_id' => $rid))->delete();

			$data = array();

			foreach($_POST['access'] as $v){
				$tmp = explode('_',$v);
				$data[] = array(
					'role_id' => $rid,
					'node_id' => $tmp[0],
					'level' => $tmp[1]
				);
			}
			
			if($db->addAll($data)){
				$this->success('修改成功',U('Admin/Rbac/role'));
			}else{
				$this->error('修改失败');
			}
		}

	}
?>