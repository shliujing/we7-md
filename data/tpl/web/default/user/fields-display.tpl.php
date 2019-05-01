<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('user/user-header', TEMPLATE_INCLUDEPATH)) : (include template('user/user-header', TEMPLATE_INCLUDEPATH));?>
<div class="clearfix we7-margin-bottom">
	<form action="" method="get">
		<input type="hidden" name="c" value="user">
		<input type="hidden" name="a" value="fields">
		<div class="input-group pull-left col-sm-4">
			<input type="text" name="keyword" id="" value="<?php  echo $_GPC['keyword'];?>" class="form-control" placeholder="请输入标题"/>
			<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
		</div>
	</form>
	<div class="pull-right">
		<a href="<?php  echo url('user/fields/post');?>" class="btn btn-primary">+添加字段</a>
	</div>
</div>
<form action="" method="post"  id="js-fields-display" ng-controller="FieldsDisplay" ng-cloak>
	<table class="table we7-table table-hover vertical-middle">
		<col width="100px"/>
		<col />
		<col />
		<col />
		<col />
		<col />

		<tr>
			<th >排序</th>
			<th class="text-left">字段名</th>
			<th>标题</th>
			<th>是否启用</th>
			<th>注册页显示</th>
			<th>是否必填</th>
			<th class="text-right">操作</th>
		</tr>
		<tr ng-repeat="field in fields">
			<td><input type="text" class="form-control" name="displayorder[{{field.id}}]" ng-model="field.displayorder"></td>
			<td class="text-left" ng-bind="field.field"></td>
			<td ng-bind="field.title"></td>
			<td>
				<div class="we7-form">
					<input id='check-{{field.id}}' type="checkbox" value="1" name='available[{{field.id}}]' ng-checked="field.available == 1">
					<label for="check-{{field.id}}">&nbsp;</label>
				</div>
			</td>
			<td>
				<div class="we7-form">
					<input id='regist-check-{{field.id}}' type="checkbox" value="1" name='showinregister[{{field.id}}]' ng-checked="field.showinregister == 1">
					<label for="regist-check-{{field.id}}">&nbsp;</label>
				</div>
			</td>
			<td>
				<div class="we7-form">
					<input id='require-check-{{field.id}}' type="checkbox" value="1" name='required[{{field.id}}]' ng-checked='field.required == 1'>
					<label for="require-check-{{field.id}}">&nbsp;</label>
				</div>
			</td>
			<td>
				<div class="link-group">
					<a ng-href="{{links.fieldPost}}id={{field.id}}">编辑</a>
				</div>
			</td>
		</tr>
	</table>
	<button type="submit" class="btn btn-primary" name="submit" value="submit" ng-style="{'padding': '6px 50px'}">保存</button>
	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
</form>

<script>
	angular.module('userManageApp').value('config', {
		fields: <?php echo !empty($fields) ? json_encode($fields) : 'null'?>,
		links: {
			fieldPost: "<?php  echo url('user/fields/post')?>",
		},
	});
	angular.bootstrap($('#js-fields-display'), ['userManageApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>