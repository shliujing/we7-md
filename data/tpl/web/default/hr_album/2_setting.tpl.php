<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>基本设置</title>
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
.btnsnum{
    width: 100px;
    height: 36px;
    text-align: center;
    color: #504B4B;
    border: 0;
    background-color: #F3F3F3;
    line-height: 36px;
    line-height: 50rpx;
    border: 1px solid #E8E8E8;
    border-left: none;
}
	</style>
</head>
<body>
<blockquote class="site-text layui-elem-quote">
  注意：小程序端默认内置客服图片、更多应用图片，如需修改请先看小程序演示。
</blockquote>
<form class="layui-form layui-form-pane" style="padding:20px;" action="" method="post">
  <div class="layui-form-item">
    <label class="layui-form-label">相册名字</label>
    <div class="layui-input-block">
      <input type="text" name="spacename" value="<?php  echo $settings['spacename'];?>"  placeholder="请输入相册名字" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">公众号名称</label>
    <div class="layui-input-block">
      <input type="text" name="mpname" value="<?php  echo $settings['mpname'];?>"  placeholder="用于小程序加粉" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">创建相册模板标题</label>
    <div class="layui-input-block">
      <input type="text" name="deftitle" value="<?php  if($settings['deftitle']) { ?><?php  echo $settings['deftitle'];?><?php  } else { ?>送上我亲手制作的相册，快看看吧<?php  } ?>"  placeholder="送上我亲手制作的相册，快看看吧" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
          <label class="layui-form-label">选择默认模板</label>
          <div class="layui-input-block">
            <select name="baseskin">
              <?php  if(is_array($skinlist)) { foreach($skinlist as $item) { ?>
              	<option value="<?php  echo $item['skiname'];?>" <?php  if($settings['baseskin'] == $item['skiname']) { ?> selected<?php  } ?>><?php  echo $item['skintitle'];?></option>	
              <?php  } } ?>	
            </select>
          </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">流量主代码</label>
    <div class="layui-input-block">
      <input type="text" name="llads" value="<?php  echo $settings['llads'];?>"  placeholder="微信后台开通流量主了复制广告代码没有不要填写 只复制unit-id等号后的字串例如：adunit-7468fe5455c 不要复制所有代码" autocomplete="off" class="layui-input">
    </div>
  </div>
  <blockquote class="site-text layui-elem-quote">
      注意：小程序提交审核时，必须开启审核页面。如果开启美女列表审核页面，点击按钮导入审核图片。<button type="button" class="layui-btn layui-btn-sm layui-btn-radius layui-btn-warm"" id="pushpic">导入图片</button>
  </blockquote>
  <div class="layui-form-item" pane>
    <label class="layui-form-label">是否开启审核页面</label>
    <div class="layui-input-block">
      <input type="radio" name="review" value="0" title="否"  <?php  if(!$settings['review']) { ?> checked="checked" <?php  } ?>>
       <input type="radio" name="review" value="1" title="审核页面【美女列表】"  <?php  if($settings['review'] == 1) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="review" value="2" title="审核页面【祝福列表】"  <?php  if($settings['review'] == 2) { ?> checked="checked" <?php  } ?>>
    </div>
  </div> 
  <div class="layui-form-item" pane>
    <label class="layui-form-label">用户展示作品是否审核</label>
    <div class="layui-input-block">
      <input type="radio" name="ishare" value="0" title="否"  <?php  if(!$settings['ishare']) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="ishare" value="1" title="是"  <?php  if($settings['ishare']) { ?> checked="checked" <?php  } ?>>
    </div>
  </div>
  <div class="layui-form-item" pane>
    <label class="layui-form-label">是否开启打赏</label>
    <div class="layui-input-block">
      <input type="radio" name="ispay" value="0" title="否"  <?php  if(!$settings['ispay']) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="ispay" value="1" title="是"  <?php  if($settings['ispay']) { ?> checked="checked" <?php  } ?>> 
    </div>
  </div>
  <blockquote class="site-text layui-elem-quote">
    注意：此鉴黄功能必须已经收到微信要求内测接口才可以设置，否则鉴黄无效。
  </blockquote>
  <div class="layui-form-item" pane>
    <label class="layui-form-label">是否开启鉴黄</label>
    <div class="layui-input-block">
      <input type="radio" name="wxyellow" value="0" title="否"  <?php  if(!$settings['wxyellow']) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="wxyellow" value="1" title="是"  <?php  if($settings['wxyellow']) { ?> checked="checked" <?php  } ?>>
    </div>
  </div>
  <blockquote class="site-text layui-elem-quote">
    注意：在模板库搜索AT1130，然后选用选择 赞赏人、赞赏金额、赞赏时间、赞赏详情
  </blockquote>
  <div class="layui-form-item">
    <label class="layui-form-label">打赏通知模板ID</label>
    <div class="layui-input-block">
      <input type="text" name="templateid" value="<?php  echo $settings['templateid'];?>"  placeholder="赞赏通知模板ID" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">打赏备注描述</label>
    <div class="layui-input-block">
      <input type="text" name="dsdesc" value="<?php  if($settings['dsdesc']) { ?><?php  echo $settings['dsdesc'];?><?php  } else { ?>打赏<?php  } ?>"  placeholder="打赏备注描述" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">打赏页面文字描述</label>
    <div class="layui-input-block">
      <input type="text" name="paydesc" value="<?php  echo $settings['paydesc'];?>"  placeholder="简短说明不易过长" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" pane>
    <label class="layui-form-label">首页列表样式</label>
    <div class="layui-input-block">
      <input type="radio" name="list_style" value="1" title="单列"  <?php  if(!$settings['list_style']) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="list_style" value="2" title="双列"  <?php  if($settings['list_style']) { ?> checked="checked" <?php  } ?>>
    </div>
  </div>
  <div class="layui-form-item" pane>
    <label class="layui-form-label">是否显示客服按钮</label>
    <div class="layui-input-block">
      <input type="radio" name="iskf" value="0" title="否"  <?php  if(!$settings['ispay']) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="iskf" value="1" title="是"  <?php  if($settings['ispay']) { ?> checked="checked" <?php  } ?>>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">客服图片</label>
    <div class="layui-input-block">
      <input type="file" name="file" id="kfbg" class="layui-upload-file">
      <input type="hidden" name="kfbg" value="<?php  echo $settings['kfbg'];?>">
      <div id=kfimg class="demoimg" <?php  if($settings['kfbg']) { ?> style="display:-webkit-inline-box"<?php  } ?>>
		<img src="<?php  if($settings['kfbg']) { ?><?php  echo $this->imgurl().$settings['kfbg']?><?php  } ?>">
</div>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">更多应用图片</label>
    <div class="layui-input-block">
      <input type="file" name="file" id="morebg" class="layui-upload-file">
      <input type="hidden" name="morebg" value="<?php  echo $settings['morebg'];?>">
      <div id=moreimg class="demoimg" <?php  if($settings['morebg']) { ?> style="display:-webkit-inline-box"<?php  } ?>>
      <img src="<?php  if($settings['morebg']) { ?><?php  echo $this->imgurl().$settings['morebg']?><?php  } ?>">
    </div>
  </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">分享图片</label>
    <div class="layui-input-block">
      <input type="file" name="file" id="share" class="layui-upload-file">
      <input type="hidden" name="sharepic" value="<?php  echo $settings['sharepic'];?>">
      <div id="shareimg" class="demoimg" <?php  if($settings['sharepic']) { ?> style="display:-webkit-inline-box"<?php  } ?>>
		<img src="<?php  if($settings['sharepic']) { ?><?php  echo $this->imgurl().$settings['sharepic']?><?php  } ?>">
</div>
    </div>
  </div>
  <div class="layui-form-item" pane>
    <label class="layui-form-label">相册模板存储</label>
    <div class="layui-input-block">
      <input type="radio" name="remoteskin" value="0" title="本地存储"  <?php  if(!$settings['remoteskin']) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="remoteskin" value="1" title="远程存储"  <?php  if($settings['remoteskin']) { ?> checked="checked" <?php  } ?>>
    </div>
  </div>
  <div class="layui-form-item" pane>
    <label class="layui-form-label">选择存储方式</label>
    <div id="savemode" class="layui-input-block">
      <input type="radio" name="type" value="0" title="本地存储" <?php  if($remote['type'] == 0) { ?>checked<?php  } ?>>
      <input type="radio" name="type" value="1" title="FTP服务器" <?php  if($remote['type'] == 1) { ?>checked<?php  } ?>>
      <input type="radio" name="type" value="2" title="阿里云OSS" <?php  if($remote['type'] == 2) { ?>checked<?php  } ?>>
      <input type="radio" name="type" value="3" title="七牛云存储" <?php  if($remote['type'] == 3) { ?>checked<?php  } ?>>
      <input type="radio" name="type" value="4" title="腾讯云存储" <?php  if($remote['type'] == 4) { ?>checked<?php  } ?>>
    </div>
  </div>
  <div class="remote-ftp" id="remote-1" <?php  if(empty($remote['type']) || $remote['type'] != '1') { ?> style="display:none;" <?php  } ?>>
  <div class="layui-form-item">
    <label class="layui-form-label">FTP服务器地址</label>
    <div class="layui-input-block">
      <input type="text" name="ftp[host]" value="<?php  echo $remote['accesskey'];?>" placeholder="可以是 FTP 服务器的 IP 地址或域名"  autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">FTP服务器端口</label>
    <div class="layui-input-block">
      <input type="text" name="ftp[port]" value="<?php  if(empty($remote['ftp']['port'])) { ?>21<?php  } else { ?><?php  echo $remote['ftp']['port'];?><?php  } ?>" placeholder="默认为21"  autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" pane>
    <label class="layui-form-label">启用SSL连接</label>
    <div id="savemode" class="layui-input-block">
      <input type="radio" name="ftp[ssl]" value="0" title="是"  <?php  if(!empty($remote['ftp']['ssl'])) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="ftp[ssl]" value="1" title="否"  <?php  if(empty($remote['ftp']['ssl'])) { ?> checked="checked" <?php  } ?>>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">FTP帐号</label>
    <div class="layui-input-block">
      <input type="text" name="ftp[username]" value="<?php  echo $remote['ftp']['username'];?>"  placeholder="该帐号必须具有以下权限：读取文件、写入文件、删除文件、创建目录、子目录继承" autocomplete="off" class="layui-input">
    </div>
  </div>  
  <div class="layui-form-item">
    <label class="layui-form-label">FTP密码</label>
    <div class="layui-input-block">
      <input type="text" name="ftp[password]" value="<?php  echo $remote['ftp']['password'];?>"  placeholder="基于安全考虑将只显示 FTP 密码的第一位和最后一位，中间显示八个 * 号" autocomplete="off" class="layui-input">
    </div>
  </div>  
  <div class="layui-form-item" pane>
    <label class="layui-form-label">被动模式(pasv)连接：</label>
    <div id="savemode" class="layui-input-block">
      <input type="radio" name="ftp[pasv]" value="0" title="是"  <?php  if(!empty($remote['ftp']['pasv'])) { ?> checked="checked" <?php  } ?>>
      <input type="radio" name="ftp[pasv]" value="1" title="否"  <?php  if(empty($remote['ftp']['pasv'])) { ?> checked="checked" <?php  } ?>>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">远程附件目录</label>
    <div class="layui-input-block">
      <input type="text" name="ftp[dir]" value="<?php  echo $remote['ftp']['dir'];?>"  placeholder="远程附件目录的绝对路径或相对于 FTP 主目录的相对路径，结尾不要加斜杠 ‘/’ , 例如：/attachment" autocomplete="off" class="layui-input">
    </div>
  </div> 
  <div class="layui-form-item">
    <label class="layui-form-label">远程访问URL</label>
    <div class="layui-input-block">
      <input type="text" name="ftp[url]" value="<?php  echo $remote['ftp']['url'];?>"  placeholder="支持 HTTP 和 FTP 协议，结尾不要加斜杠 ‘/’ 例如：http://mydomin.com/attachment 如果使用 FTP 协议，FTP 服务器必须支持 PASV 模式，为了安全起见，使用 FTP 连接的帐号不要设置可写权限和列表权限" autocomplete="off" class="layui-input">
    </div>
  </div> 
  <div class="layui-form-item">
    <label class="layui-form-label">FTP传输超时时间</label>
    <div class="layui-input-block">
      <input type="text" name="ftp[overtime]" value="<?php  if(empty($remote['ftp']['overtime'])) { ?>0<?php  } else { ?><?php  echo $remote['ftp']['overtime'];?><?php  } ?>"  placeholder="单位：秒，0为服务器默认" autocomplete="off" class="layui-input">
    </div>
  </div> 
   <div class="layui-form-item">
    <div class="layui-input-block">   
      <button type="button" class="layui-btn layui-btn-sm layui-btn-normal js-checkremoteftp">测试配置</button>     
    </div>    
  </div>
  </div>
  <div class="remote-oss" id="remote-2" <?php  if(empty($remote['type']) || $remote['type'] != '2') { ?> style="display:none;" <?php  } ?>>
  <div class="layui-form-item">
    <label class="layui-form-label">Access Key ID</label>
    <div class="layui-input-block">
      <input type="text" name="alioss[key]" value="<?php  echo $remote['alioss']['key'];?>"  placeholder="Access Key ID是您访问阿里云API的密钥，具有该账户完全的权限，请您妥善保管。" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">Access Key Secret</label>
    <div class="layui-input-block">
      <input type="text" name="alioss[secret]" value="<?php  echo $remote['alioss']['secret'];?>" placeholder="Access Key Secret是您访问阿里云API的密钥，具有该账户完全的权限，请您妥善保管。(填写完Access Key ID 和 Access Key Secret 后请选择bucket)" autocomplete="off" class="layui-input">
    </div>
  </div>
   <div class="layui-form-item" id="bucket" <?php  if(empty($remote['alioss']['key'])) { ?>style="display: none;<?php  } ?>>
    <label class="layui-form-label">bucket</label>
    <div class="layui-input-block">
      <select name="alioss[bucket]">
         <option>请选择</option>
        <?php  if(is_array($buckets)) { foreach($buckets as $value) { ?>
		<option value="<?php  echo $value['name'];?>@@<?php  echo $value['location'];?>" <?php  if($value['name'] == $remote['alioss']['bucket'] || $remote['alioss']['bucket'] == $value['name'].'@@'.$value['location']) { ?> selected<?php  } ?>><?php  echo $value['name'];?>@@<?php  echo $bucket_datacenter[$value['location']];?></option>
	    <?php  } } ?>
      </select>
    </div>
  </div>  
  <div class="layui-form-item">
    <label class="layui-form-label">Url</label>
    <div class="layui-input-block">
      <input type="text" name="alioss[url]" value="<?php  echo $remote['alioss']['url'];?>"  placeholder="阿里云oss支持用户自定义访问域名，如果自定义了URL则用自定义的URL，如果未自定义，则用系统生成出来的URL。注：自定义url开头加http://或https://结尾不加 ‘/’例：http://abc.com" autocomplete="off" class="layui-input">
    </div>
  </div> 
  <div class="layui-form-item">
    <div class="layui-input-block">   
      <button type="button" class="layui-btn layui-btn-sm layui-btn-normal js-checkremoteoss">测试配置</button>     
    </div>    
  </div>  
  </div>
  <div class="remote-qiniu" id="remote-3" <?php  if(empty($remote['type']) || $remote['type'] != '3') { ?> style="display:none;" <?php  } ?>>
  <div class="layui-form-item">
    <label class="layui-form-label">AccessKey</label>
    <div class="layui-input-block">
      <input type="text" name="qiniu[accesskey]" value="<?php  echo $remote['qiniu']['accesskey'];?>" placeholder="用于签名的公钥"  autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">SecretKey</label>
    <div class="layui-input-block">
      <input type="text" name="qiniu[secretkey]" value="<?php  echo $remote['qiniu']['secretkey'];?>" placeholder="用于签名的私钥"   autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">Bucket</label>
    <div class="layui-input-block">
      <input type="text" name="qiniu[bucket]" value="<?php  echo $remote['qiniu']['bucket'];?>"  placeholder="请保证bucket为可公共读取的" autocomplete="off" class="layui-input">
    </div>
  </div>  
  <div class="layui-form-item">
    <label class="layui-form-label">Url</label>
    <div class="layui-input-block">
      <input type="text" name="qiniu[url]" value="<?php  echo $remote['qiniu']['url'];?>"  placeholder="七牛支持用户自定义访问域名。例：abc.com" autocomplete="off" class="layui-input">
    </div>
  </div> 
  <div class="layui-form-item">
    <div class="layui-input-block">   
      <button type="button" class="layui-btn layui-btn-sm layui-btn-normal js-checkremoteqiniu">测试配置</button>     
    </div>    
  </div> 
  </div>
  <div class="remote-cos" id="remote-4" <?php  if(empty($remote['type']) || $remote['type'] != '4') { ?> style="display:none;" <?php  } ?>>
  <div class="layui-form-item">
    <label class="layui-form-label">Appid</label>
    <div class="layui-input-block">
      <input type="text" name="cos[appid]" value="<?php  echo $remote['cos']['appid'];?>" placeholder="APPID 是您项目的唯一ID" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">SecretID</label>
    <div class="layui-input-block">
      <input type="text" name="cos[secretid]" value="<?php  echo $remote['cos']['secretid'];?>" placeholder="SecretID 是您项目的安全秘钥，具有该账户完全的权限，请妥善保管"   autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">SecretKEY</label>
    <div class="layui-input-block"> 
      <input type="text" name="cos[secretkey]" value="<?php  echo $remote['cos']['secretkey'];?>"  placeholder="SecretKEY 是您项目的安全秘钥，具有该账户完全的权限，请妥善保管" autocomplete="off" class="layui-input">
    </div>
  </div>  
  <div class="layui-form-item">
    <label class="layui-form-label">Bucket</label>
    <div class="layui-input-block">
      <input type="text" name="cos[bucket]" value="<?php  echo $remote['cos']['bucket'];?>"  placeholder="请保证bucket为可公共读取的" autocomplete="off" class="layui-input">
    </div>
  </div> 
  <div class="layui-form-item">
    <label class="layui-form-label">Url</label>
    <div class="layui-input-block">
      <input type="text" name="cos[url]" value="<?php  echo $remote['cos']['url'];?>"  placeholder="腾讯云支持用户自定义访问域名。注：url开头加http://或https://结尾不加 ‘/’例：http://abc.com" autocomplete="off" class="layui-input">
    </div>
  </div> 
  <div class="layui-form-item">
    <div class="layui-input-block">   
      <button type="button" class="layui-btn layui-btn-sm layui-btn-normal js-checkremotecos">测试配置</button>     
    </div>    
  </div>   
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" name="submit" value="提交" type="submit">立即提交</button>
      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
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
        	 elem:'#share',
             url: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=uppic&m=hr_album' ,//上传接口 
             success: function(res){
              //上传成功后的回调 
              layer.msg(res.message); 
              $("#shareimg").find('img').attr('src',res.reurl);
              $("#shareimg").css('display','-webkit-inline-box');    
              $("input[name='sharepic']").val(res.src);
              console.log(res); 
            } 
         });
         layui.upload({ 
        	 elem:'#kf',
             url: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=uppic&m=hr_album' ,//上传接口 
             success: function(res){
              //上传成功后的回调 
              layer.msg(res.message); 
              $("#kfimg").find('img').attr('src',res.reurl);
              $("#kfimg").css('display','-webkit-inline-box');    
              $("input[name='kfpic']").val(res.src);
              console.log(res); 
            } 
         });
         layui.upload({ 
        	 elem:'#kfbg',
             url: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=uppic&m=hr_album' ,//上传接口 
             success: function(res){
              //上传成功后的回调 
              layer.msg(res.message); 
              $("#kfimg").find('img').attr('src',res.reurl);
              $("#kfimg").css('display','-webkit-inline-box');
              $("input[name='kfbg']").val(res.src);
              console.log(res); 
            } 
         });
        layui.upload({
            elem:'#morebg',
            url: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=uppic&m=hr_album' ,//上传接口
            success: function(res){
                //上传成功后的回调
                layer.msg(res.message);
                $("#moreimg").find('img').attr('src',res.reurl);
                $("#moreimg").css('display','-webkit-inline-box');
                $("input[name='morebg']").val(res.src);
                console.log(res);
            }
        });

	});	
	$("#shareimg").hover(function(e){
		var x=$("#shareimg").offset();
		var src = $("#shareimg").find('img').attr('src');
		var html = '<div id="sharebig" style="z-index:10001;position:fixed;top:30%;left:40%;max-width:260px;max-height:260px"><img style="width:100%;height:100%" src="'+src+'" /></div>';
		$("#sharebig").append(html);	
	}, function(e){
		$("#sharebig").remove();
	});
	$("#kfimg").hover(function(e){
		var x=$("#kfimg").offset();
		var src = $("#kfimg").find('img').attr('src');
		var html = '<div id="kfbig" style="z-index:10001;position:fixed;top:30%;left:40%;max-width:260px;max-height:260px"><img style="width:100%;height:100%" src="'+src+'" /></div>';
		$("#kfimg").append(html);	
	}, function(e){
		$("#kfbig").remove();
	});
	$("#testset").on('click',function(){
		var key = $.trim($('input[name="accesskey"]').val());
		if (key == '') {
			layui.use('layer', function(){
				  var layer = layui.layer;			  
				  layer.msg('请填写Accesskey');
			});
			return false;
		}
		var secret = $.trim($('input[name="secretkey"]').val());
		if (secret == '') {
			layui.use('layer', function(){
				  var layer = layui.layer;
				  
				  layer.msg('请填写Secretkey');
			});
			return false;
		}	
		var url = $.trim($('input[name="qnurl"]').val());	
		var param = {
			'accesskey' : $.trim($('input[name="accesskey"]').val()),
			'secretkey' : $.trim($('input[name="secretkey"]').val()),
			'url'  : url,
			'bucket' :  $.trim($('input[name="bucket"]').val())
		};
		$.post("<?php  echo url('system/attachment/qiniu')?>",param, function(data) {
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;				  
					  layer.msg('配置成功');
					});   
				return false;
			}
			if(data.message.errno < 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;
					  
					  layer.msg(data.message.message);
				});
				return false;
			}
		});
	});
	$('#savemode').on('click','.layui-form-radio',function(){
		var cctype = $(this).prev().val();
		$("input[name='type']").each(function(){
			var val = $(this).val();
			$("#remote-"+val).hide();
		});
		$("#remote-"+cctype).show();
	});
	$('.js-checkremoteftp').on('click', function(){
		var ssl =  parseInt($(':radio[name="ftp[ssl]"]:checked').val());
		var pasv = parseInt($(':radio[name="ftp[pasv]"]:checked').val());
		var param = {
			'ssl' : ssl,
			'host' : $.trim($(':text[name="ftp[host]"]').val()),
			'username'  : $.trim($(':text[name="ftp[username]"]').val()),
			'password' : $.trim($(':text[name="ftp[password]"]').val()),
			'pasv' : pasv,
			'dir': $.trim($(':text[name="ftp[dir]"]').val()),
			'url': $.trim($(':text[name="ftp[url]"]').val()),
			'port' : parseInt($(':text[name="ftp[port]"]').val()),
			'overtime' : parseInt($(':text[name="ftp[overtime]"]').val())
		};
		$.post("<?php  echo url('system/attachment/ftp')?>", param, function(data){
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;				  
					  layer.msg('配置成功');
					});   
				return false;
			}
			if(data.message.errno < 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;
					  
					  layer.msg(data.message.message);
				});
				return false;
			}
		});
	});
	$('.js-checkremoteoss').on('click', function(){
		var bucket = $.trim($('select[name="alioss[bucket]"]').val());
		if (bucket == '') {
			bucket = $.trim($(':text[name="alioss[bucket]"]').val());
		}
		var param = {
			'key' : $.trim($(':text[name="alioss[key]"]').val()),
			'secret' : $.trim($(':text[name="alioss[secret]"]').val()),
			'url'  : $.trim($(':text[name="custom[url]"]').val()),
			'bucket' : bucket
		};
		$.post("<?php  echo url('system/attachment/oss')?>",param, function(data) {
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;				  
					  layer.msg('配置成功');
					});   
				return false;
			}
			if(data.message.errno < 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;
					  
					  layer.msg(data.message.message);
				});
				return false;
			}
		});
	});
	$('.js-checkremoteqiniu').on('click', function(){
		var key = $.trim($(':text[name="qiniu[accesskey]"]').val());
		if (key == '') {
			util.message('请填写Accesskey');
			return false;
		}
		var secret = $.trim($(':text[name="qiniu[secretkey]"]').val());
		if (secret == '') {
			util.message('请填写Secretkey');
			return false;
		}
		var param = {
			'accesskey' : $.trim($(':text[name="qiniu[accesskey]"]').val()),
			'secretkey' : $.trim($(':text[name="qiniu[secretkey]"]').val()),
			'url'  : $.trim($(':text[name="qiniu[url]"]').val()),
			'bucket' :  $.trim($(':text[name="qiniu[bucket]"]').val())
		};
		$.post("<?php  echo url('system/attachment/qiniu')?>",param, function(data) {
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;				  
					  layer.msg('配置成功');
					});   
				return false;
			}
			if(data.message.errno < 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;
					  
					  layer.msg(data.message.message);
				});
				return false;
			}

		});
	});
	$('.js-checkremotecos').on('click', function(){
		var appid = $.trim($(':text[name="cos[appid]"]').val());
		if (appid == '') {
			util.message('请填写APPID');
			return false;
		}
		var secretid = $.trim($(':text[name="cos[secretid]"]').val());
		if (secretid == '') {
			util.message('请填写secretid');
			return false;
		}
		var secretkey = $.trim($(':text[name="cos[secretkey]"]').val());
		if (secretkey == '') {
			util.message('请填写Secretkey');
			return false;
		}
		var bucket = $.trim($(':text[name="cos[bucket]"]').val());
		if (bucket == '') {
			util.message('请填写bucket');
			return false;
		}
		var url = $.trim($(':text[name="cos[url]"]').val());
		var param = {
			'appid' : appid,
			'secretid' : secretid,
			'secretkey'  : secretkey,
			'bucket' :  bucket,
			'url' : url
		};
		$.post("<?php  echo url('system/attachment/cos')?>",param, function(data) {
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;				  
					  layer.msg('配置成功');
					});   
				return false;
			}
			if(data.message.errno < 0) {
				layui.use('layer', function(){
					  var layer = layui.layer;
					  
					  layer.msg(data.message.message);
				});
				return false;
			}
		});
	});
	var buck =  function() {
		var key = $(':text[name="alioss[key]"]').val();
		var secret = $(':text[name="alioss[secret]"]').val();		
		if (key == '' || secret == '') {
			layui.use('layer', function(){
				  var layer = layui.layer;				  
				  layer.msg('请填写完整Access Key ID Access Key Secret。');
				});   
			$('[name="submit"]').prop('disabled', true);
			return false;
		}
		$.post("<?php  echo url('system/attachment/buckets')?>", {'key' : key, 'secret' : secret}, function(data) {
			var data = $.parseJSON(data);
			if (data.message.errno < 0 ) {
				layui.use('layer', function(){
					  var layer = layui.layer;				  
					  layer.msg('请填写完整Access Key ID Access Key Secret。');
					});   
				$('[name="submit"]').prop('disabled', true);
				return false;
			} else {
				$('#bucket').show();
				$('[name="submit"]').prop('disabled', false);
				var bucket = $('select[name="alioss[bucket]"]');
				bucket.empty();
				var buckets = eval(data.message.message);
				for (var i in buckets) {
					bucket.append('<option value='+buckets[i]['name']+'@@'+buckets[i]['location']+'>'+buckets[i]['loca_name']+'</option>');
				}
				layui.form('select').render();
			}
		});		
	};
	$(':text[name="alioss[secret]"]').blur(buck);
	$("#chtoken").on('click',function(){
		for(var e="",t=0;t<32;t++)e+="abcdefghijklmnopqrstuvwxyz0123456789"[parseInt(32*Math.random())];
		$('[name="tokens"]').val(e)
	});
	$("#chkey").on('click',function(){
		for(var e="",t=0;t<43;t++)e+="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"[parseInt(61*Math.random())];
		$('[name="encodingAesKey"]').val(e)
	});
	$("#pushpic").on('click',function(){
		layui.use('layer', function(){
			layer.open({
				  type: 2,
				  title: '审核图片列表',
				  content: '<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=reviewpic&m=hr_album',
				  area: ['1000px', '500px'],
				});  
		});
	});
	$("#kfimg").on('click',function(){
        $('[name="kfbg"]').val("");
        alert('图片已删除，保存后生效！');
    });
    $("#moreimg").on('click',function(){
        $('[name="morebg"]').val("");
        alert('图片已删除，保存后生效！');
    });
</script>
</body>
</html>