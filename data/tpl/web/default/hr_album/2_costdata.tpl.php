<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提现管理</title>
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<link rel="stylesheet" type="text/css" href="<?php  echo $_W['siteroot'];?>addons/hr_album/style/component/layui/css/layui.css" media="all">
	<style>
     body{padding:10px 15px 10px 15px;}
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 5px 0;
    border-radius: 4px;
}
.pagination>li {
    display: inline;
}
.pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
}
.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #009688;
    border-color: #009688;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.428571429;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #009688;
    border-color: #009688;
}
.cubtn{
	height: 30px;
    line-height: 30px;
}
	</style>
</head>
<body>
<div class="layui-form-item">
	<?php  if($cost['rcosted']) { ?>
	<div style="display:block;float:left;line-height:40px;font-size:18px;" >
		已提现金额：<font color="red"><?php  echo $cost['rcosted'];?></font>元&nbsp;&nbsp;&nbsp;
		已收服务费：<font color="red"><?php  echo $cost['costed'] - $cost['rcosted']?></font>元&nbsp;&nbsp;&nbsp;
		未提现金额：<font color="red"><?php  echo $icost['nonecost'];?></font>元
	</div>
	<?php  } ?>
    <div class="layui-input-block" style="margin-left:0">       
      <button id="weigui" type="button" style="float:right;margin-left:5px;margin-right:5px;" class="layui-btn">违规提现</button>        
      <button id="paylog" type="button" style="float:right;margin-left:5px;margin-right:5px;" class="layui-btn">打赏明细</button>    
      <button id="paynum" type="button" style="float:right;margin-left:5px;margin-right:5px;" class="layui-btn layui-btn-warm">红包设置</button>   
      <button id="setpay" type="button" style="float:right;margin-left:5px;margin-right:5px;" class="layui-btn">提现设置</button>       
     </div>
  </div>
<table class="layui-table">
  <colgroup>
    <col width="200">
    <col width="200">
    <col width="200">
     <col width="200">
    <col width="200">
     <col width="200">
    <col width="200">
    <col width="200">
    <col width="500">
  </colgroup>
  <thead>
    <tr>
      <th>序号</th>	
      <th>昵称</th>	
	  <th>头像</th>
	  <th>账户金额</th>
	  <th>提现金额</th>
	  <th>实际金额</th>
	  <th>状态</th> 
	  <th>申请时间</th>
	  <th>操作</th>
    </tr> 
  </thead>
  <tbody class="pics">
    <?php  if(is_array($list)) { foreach($list as $row) { ?>
		<tr id="div_<?php  echo $row['id'];?>">
		    <td>
				<span><?php  echo $row['id'];?></span>
			</td>
			<td>
				<span><?php  echo $row['nickname'];?></span>
			</td>
			<td>
				<img src="<?php  echo $row['avatar'];?>" style="border-radius:100%;width:25px;height:25px;">
			</td>
			<td>
				<span><?php  echo $row['fee'];?> 元</span>
			</td>
			<td>
				<span><?php  echo $row['rcost'];?> 元</span>
			</td>
			<td>
				<span><?php  echo $row['cost'];?>  元</span> 
			</td>
			<td>
				<button id="tr_<?php  echo $row['id'];?>" class="layui-btn layui-btn-small "><?php  if(!$row['status']) { ?>未提现<?php  } else { ?>已提现<?php  } ?></button>
			</td> 
			<td class="reviewpic" data-id="<?php  echo $row['id'];?>">
				<span><?php  echo date("Y-m-d H:i",$row['addtime'])?></span>
			</td>			
			<td>
			   <div class="layui-btn-group" id="btn_<?php  echo $row['id'];?>">	
			   <?php  if($row['status']) { ?>
			   <button class="layui-btn layui-btn-disabled">结束</button>
			   <?php  } else { ?>
			   <button class="layui-btn layui-btn-normal dopush" data-id="<?php  echo $row['id'];?>">提现</button>
			    <button class="layui-btn layui-btn-normal showmx" data-id="<?php  echo $row['id'];?>" data-openid="<?php  echo $row['openid'];?>">明细</button> 
				<button class="layui-btn lahei" data-id="<?php  echo $row['id'];?>" data-openid="<?php  echo $row['openid'];?>">黑名单</button> 
			   <?php  } ?>			   
			   <button class="layui-btn layui-btn-danger deljilu" data-id="<?php  echo $row['id'];?>">删除</button>	    
				  </div>
			</td>
		</tr>
		<?php  } } ?>
  </tbody>
</table>
<div class="page" style=float:right;">
		<?php  echo $pager;?>
</div>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/hr_album/style/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/hr_album/style/component/layui/layui.js"></script>
<script type="text/javascript">
$("#setpay").on('click',function(){
	layui.use('layer', function(){
		layer.open({
			  type: 2,
			  title: '提现设置',
			  content: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=costdata&m=hr_album&op=setpay',
			  area: ['600px', '500px'],
			});  
	});
});
$("#paynum").on('click',function(){
	layui.use('layer', function(){
		layer.open({
			  type: 2,
			  title: '红包金额设置',
			  content: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=costdata&m=hr_album&op=monum',
			  area: ['600px', '500px'],
			});  
	});
});
$(".dopush").on('click',function(){
	var id = $(this).data('id');
	var that = $(this);
	layui.use('layer', function(){
	   var layer = layui.layer;
	   layer.confirm('确定提现给用户么？', {
			  btn: ['确定','取消'] //按钮
			}, function(){
				layer.msg('正在提现');
				that.addClass('layui-btn-disabled');
     			$('#btn_'+id).html('<button class="layui-btn layui-btn-disabled">正在提现</button>');  
				$.post("<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=costdata&m=hr_album&op=cash",{id:id}, function(data) {
					var data = $.parseJSON(data);
                    if(data.result == 'success'){
                        layer.msg('提现成功');
                        $('#tr_'+id).html('已提现');
                        that.addClass('layui-btn-disabled');
                        $('#btn_'+id).html('<button class="layui-btn layui-btn-disabled">提现结束</button>');
                    }else{
                        layer.msg(data.result);
                    }
				});
			}, function(){
			  
			});
    });
});
$("#weigui").on('click',function(){
	layui.use('layer', function(){
		layer.open({
			  type: 2,
			  title: '违规提现管理',
			  content: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=costdata&m=hr_album&op=weigui',
			  area: ['900px', '500px'],
			});  
	});
});
$(".showmx").on('click',function(){
	var id = $(this).data('id');
	var openid = $(this).data('openid');
	var that = $(this);	
	layui.use('layer', function(){
		layer.open({
			  type: 2,
			  title: '打赏明细',
			  content: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=costdata&m=hr_album&op=mingxi&openid='+openid+'&id='+id,
			  area: ['800px', '500px'],
			});  
	});
});
$(".lahei").on('click',function(){
	var id = $(this).data('id');
	var openid = $(this).data('openid');
	var that = $(this);	
	layui.use('layer', function(){
	   var layer = layui.layer;
	   layer.confirm('将用户列入黑名单，所有未提现订单都将列入违规订单', {
			  btn: ['确定','取消'] //按钮
			}, function(){
				layer.msg('正在操作');
				$.post("<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=costdata&m=hr_album&op=lahei",{id:id,openid:openid}, function(data) {
					var data = $.parseJSON(data);					
					if(data.result == 'success'){						
						layer.msg('操作成功',function(){
		            		location=location;
		            	});  
					}else{
						layer.msg(data.result);
					}					
				});
			}, function(){
			  
			});
    });
});
$(".deljilu").on('click',function(){
	var id = $(this).data('id');
	var that = $(this);
	layui.use('layer', function(){
	   var layer = layui.layer;
	   layer.confirm('确定删除此条记录么？', {
			  btn: ['确定','取消'] //按钮
			}, function(){				
				$.post("<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=costdata&m=hr_album&op=delcash",{id:id}, function(data) {
					var data = $.parseJSON(data);					
					if(data.result){
						layer.msg('删除成功'); 
						$("#div_"+id).remove(); 
					}else{
						layer.msg('删除失败', {icon: 2});
					}					
				});
			}, function(){
			  
			});
    });
});
$("#paylog").on('click',function(){
	layui.use('layer', function(){
		layer.open({
			  type: 2,
			  title: '打赏明细',
			  content: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=costdata&m=hr_album&op=paylog',
			  area: ['900px', '500px'],
			});  
	});
});
</script>
</body>
</html>