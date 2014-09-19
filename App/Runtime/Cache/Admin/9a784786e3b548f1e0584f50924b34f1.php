<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
  <link rel="stylesheet" href="__PUBLIC__/Css/node.css" />
  <script type="text/javascript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
  <script type="text/javascript">
  <!--
	$(function(){
		
			$('input[level=1]').click(function(){
				var inputs = $(this).parents('.app').find('input');

				$(this).attr('checked') ? inputs.attr('checked','checked'):inputs.removeAttr('checked');
			}
			);

			$('input[level=2]').click(function(){
				var inputs = $(this).parents('dl').find('input');

				$(this).attr('checked') ? inputs.attr('checked','checked'):inputs.removeAttr('checked');
			}
			);
	}
	);
  //-->
  </script>
 </head>
 <body>
 <form method="post" action="<?php echo U('Admin/Rbac/setAccess');?>">
 
	<div id="wrap" class="">
			<a href="<?php echo U('Admin/Rbac/role');?>" class="add-app">返回</a>
			
			<?php if(is_array($node)): foreach($node as $key=>$app): ?><div id="" class="app">
					<p>
						<strong><?php echo ($app["title"]); ?></strong>
						<input type="checkbox" name="access[]" value='<?php echo ($app["id"]); ?>_1' level="1" 
						<?php if($app["access"]): ?>checked='checked'<?php endif; ?>
						/>
					</p>
		

				<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
						<dt><strong><?php echo ($action["title"]); ?></strong>
							<input type="checkbox" name="access[]" value='<?php echo ($action["id"]); ?>_2' level="2"
							<?php if($action["access"]): ?>checked='checked'<?php endif; ?>
							/>
						</dt>
					

					<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
							<span><?php echo ($method["title"]); ?></span>
							<input type="checkbox" name="access[]" value='<?php echo ($method["id"]); ?>_3' level="3"
							<?php if($method["access"]): ?>checked='checked'<?php endif; ?>
							/>
						</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
						
				</div><?php endforeach; endif; ?>
	</div>
	<input type="hidden" name="rid" value='<?php echo ($rid); ?>'/>
	<input type="submit" value='保存修改' style='display:block; margin:20px auto; cursor:pointer '>
	
 </form>

  
 </body>
</html>