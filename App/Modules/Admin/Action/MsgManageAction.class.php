<?php
	Class MsgManageAction extends CommonAction{
		Public function index(){
			import('ORG.Util.Page');

			$count = M('wish')->count();

			$page = new Page($count ,10);
			$limit = $page->firstRow . ',' . $page->listRows;

			$wish = M('wish')->order('time DESC')->limit($limit)->select();
			$this->wish = $wish;
			$this->page = $page->show();
			$this->display();
		}

		Public function delete(){
			$id = I('id','','intval');

			if(M('wish')->delete($id)){
				$this->success('删除成功',U('Admin/MsgManage/index'));
			}else{
				$this->error('删除失败');
			}
		}
	}
?>