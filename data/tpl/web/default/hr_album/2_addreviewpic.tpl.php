<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加图片</title>
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
#bgimg{	
    margin-bottom: 20px;
}
#bgimg img{
	width: 200px;
    height: 100px;
	margin-left: 10%;
	box-shadow: 0 10px 10px #CCC;
}
	</style>
</head>
<body>
<form class="layui-form layui-form-pane" style="padding:20px;" action="<?php  echo url('site/entry/reviewpic', array('m' => 'hr_album','op' => 'add'));?>" method="post">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
  <div class="layui-form-item">
    <label class="layui-form-label">标题：</label>
    <div class="layui-input-block">
      <input type="text" name="title"  lay-verify="required" value="<?php  echo $item['title'];?>"  placeholder="请输入名称，不要过长" autocomplete="off" class="layui-input">
    </div>
  </div>  
  <div class="layui-form-item">
    <label class="layui-form-label">图片上传</label>
    <div class="layui-input-block">
      <input type="file" name="file" id="headbg" class="layui-upload-file">
      <input id="thumb" type="hidden" name="thumb" value="<?php  echo $item['content'];?>">
      &nbsp;&nbsp;(图片尺寸 650*980)
</div>
    </div>
  </div>
  <div id="bgimg">
  <?php  if($item['thumb']) { ?><img src="<?php  echo $item['content'];?>"><?php  } ?>
  </div>  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="layui-form">立即提交</button>
      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>     
    </div>
  </div>
</form>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/hr_album/style/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/hr_album/style/component/layui/layui.js"></script>
<script type="text/javascript">
layui.use(['form','upload'],function(){
    var form = layui.form();
    layui.upload({
    	  url: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=uppic&m=hr_album',
    	  type:'pic',
    	  success: function(res){
    		  layer.msg('图片上传成功'); 
    		  var str = '<img src="'+res.reurl+'" />';
    		  $("#bgimg").html(str);     
    		  $("#thumb").val(res.reurl);
    	    console.log(res); //上传成功返回值，必须为json格式
    	  }
    	});    
});
</script>
</body>
</html>