<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>发布者</th>
			<th>内容</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($wish)): foreach($wish as $key=>$v): ?><tr>
			<th><?php echo ($v["id"]); ?></th>
			<th><?php echo ($v["username"]); ?></th>
			<th><?php echo (replace_phiz($v["content"])); ?></th>
			<th><?php echo (date('y-m-d H:i',$v["time"])); ?></th>
			<th>
				<a href="<?php echo U('Admin/MsgManage/delete',array('id'=>$v['id']));?>">删除</a>
			</th>
			</tr><?php endforeach; endif; ?>
		<tr>
			<td colspan='5' align='center'>
				<?php echo ($page); ?>
			</td>
		</tr>
	</table>
</body>
</html>