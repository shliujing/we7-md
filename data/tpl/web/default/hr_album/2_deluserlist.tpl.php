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
        <th>加入时间</th>
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
        <td class="reviewpic" data-id="<?php  echo $row['id'];?>">
            <span><?php  echo date("Y-m-d H:i",$row['addtime'])?></span>
        </td>
        <td>
            <div class="layui-btn-group">
                <button class="layui-btn layui-btn-danger lahei" data-id="<?php  echo $row['id'];?>">恢复</button>
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
    $(".lahei").on('click',function(){
        var id = $(this).data('id');
        var that = $(this);
        layui.use('layer', function(){
            var layer = layui.layer;
            layer.confirm('确定要恢复被禁用的粉丝么？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                layer.msg('正在操作');
                $.post("<?php  echo $_W['siteroot'];?>web/index.php?c=site&a=entry&do=user&m=hr_album&op=lahei",{id:id}, function(data) {
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