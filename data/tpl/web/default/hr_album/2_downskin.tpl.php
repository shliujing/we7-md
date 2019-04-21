<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>模板下载</title>
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<link rel="stylesheet" type="text/css" href="<?php  echo $_W['siteroot'];?>addons/hr_album/style/component/layui/css/layui.css" media="all">
	<style>
.layui-form-pane .layui-form-label {
    min-width: 200px;
}
.layui-form-pane .layui-input-block {
    margin-left: 200px;
}
.demoimg,#logoimg{
	width: 38px;height: 38px; margin-left: 10px;display:none;
}
.demoimg img,#logoimg img{width: 100%; border-radius: 5px;height: 100%;}
	</style>
</head>
<body>
<div style="padding:20px;">
<blockquote class="layui-elem-quote">
新安装和重新安装的用户需要点击下载模板资源，下载时不要关闭窗口！
<br>如果发现自己的模板图片不完整也需要点击模板下载哈！<br/>
<b style="color: #D01C1C;">每次有新模板会再更新时候进行说明！大家注意看。</b><br/>
      </blockquote>
  <div class="layui-form-item">
    <div class="layui-input-block" style="margin-left:50px;margin-top:30px;">
      <button id="down" class="layui-btn">下载模板</button>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/hr_album/style/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/hr_album/style/component/layui/layui.js"></script>
<script type="text/javascript">
$("#down").on('click',function(){
	layui.use('layer', function(){
		layer.load();
	});	
	$.ajax({
		 type: 'post',
	     url: '<?php  echo  $this->createWebUrl("downskin")?>',
	     dataType: 'json',		        
	     success: function (res) {  
	    	 layui.use('layer', function(){
	    		 layer.closeAll('loading');
	    	 });
	         if(res.result == 'success'){		
	        	 layui.use('layer', function(){
	     			var layer = layui.layer;
	     			layer.msg('模板替换成功！打开小程序查看是否完整！'); 
	     		});	        	     	
	         }else{
	         	alert('模板资源下载出错！请检查目录权限是否可写！');
	         }
	     }
	 });
});
</script>
</body>
</html>