<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提现设置</title>
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
<form class="layui-form layui-form-pane" style="padding:20px;" action="<?php  echo url('site/entry/costdata', array('m' => 'hr_album','op' => 'setpay'));?>" method="post">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
  <div class="layui-form-item">
    <label class="layui-form-label">最低提现金额：</label>
    <div class="layui-input-block">
      <input type="number" name="leastmon"  lay-verify="required" value="<?php  echo $item['leastmon'];?>"  placeholder="请输入整数" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">提现服务费百分比</label>
    <div class="layui-input-block">
      <input type="number" name="service"  lay-verify="required"  value="<?php  echo $item['service'];?>" placeholder="%" autocomplete="off" class="layui-input">
    </div>
  </div> 
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">商户支付证书（apiclient_cert.pem）</label>
    <div class="layui-input-block">
      <textarea name="cert" placeholder="从商户平台上下载支付证书, 解压并取得其中的  apiclient_cert.pem  用记事本打开并复制文件内容, 填至此处" class="layui-textarea"><?php  echo $settings['kfurl'];?></textarea>
   	  <span class="layui-form-mid layui-word-aux">为保证安全性, 不显示证书内容. 若要修改, 请直接输入</span>	
    </div>
  </div>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">支付证书私钥（apiclient_key.pem）</label>
    <div class="layui-input-block">
      <textarea name="key" placeholder="从商户平台上下载支付证书, 解压并取得其中的   apiclient_key.pem  用记事本打开并复制文件内容, 填至此处" class="layui-textarea"><?php  echo $settings['kfurl'];?></textarea>
      <span class="layui-form-mid layui-word-aux">为保证安全性, 不显示证书内容. 若要修改, 请直接输入</span>
    </div>
  </div>
  <!--<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">支付根证书（rootca.pem）</label>
    <div class="layui-input-block">
      <textarea name="ca" placeholder="从商户平台上下载支付证书, 解压并取得其中的   rootca.pem  用记事本打开并复制文件内容, 填至此处" class="layui-textarea"><?php  echo $settings['kfurl'];?></textarea>
      <span class="layui-form-mid layui-word-aux">为保证安全性, 不显示证书内容. 若要修改, 请直接输入</span>	
    </div>
  </div>-->
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="layui-form">立即提交</button>
      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />       
    </div>
  </div>
</form>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/hr_album/style/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/hr_album/style/component/layui/layui.js"></script>
<script type="text/javascript">
layui.use(['form','upload'],function(){
    var form = layui.form();
    layui.upload({
    	  url: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=setaudio&m=hr_album',
    	  type:'audio',
    	  success: function(res){
    		  layer.msg('音乐上传成功'); 
    		  $("#bgmusic").val(res.src);         
    	    console.log(res); //上传成功返回值，必须为json格式
    	  }
    	});      
});
$("#audiolink").on('click',function(){
	layui.use('layer', function(){
		layer.open({
			  type: 2,
			  title: '搜索音乐',
			  content: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=seachmusic&m=hr_album',
			  area: ['600px', '600px'],
			});  
	});
});
</script>
</body>
</html>