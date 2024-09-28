<?php
error_reporting(0);
session_start();
@header('Content-Type: text/html; charset=UTF-8');

?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
  <meta name="renderer" content="webkit"/>
  <title>Linuxdo登录SDK</title>
  <link href="//lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<div class="container">
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block" style="float: none;">
    <div class="panel panel-info">
	<div class="panel-heading" style="text-align: center;"><h3 class="panel-title">
		Linux.do登录SDK
	</h3></div>
	<div class="panel-body" style="text-align: center;">
		<form action="./connect.php" method="get" role="form">
		<div class="list-group">
			<div class="form-group">
			<div class="input-group"><div class="input-group-addon">登录方式</div>
			  <select  class="form-control">
			    <option value="linuxdo">Linuxdo测试登录</option>
              </select>
			</div></div>
		</div>
		<button type="submit" class="btn btn-default btn-block">提交</button>
		</form>
	</div>
</div>
<?php if(isset($_SESSION['user_id'])){?>
<div class="panel panel-success">
	<div class="panel-heading" style="text-align: center;"><h3 class="panel-title">
		登录成功
	</h3></div>
	<div class="panel-body">
		<div class="list-group">
			<div class="form-group">
				<label>id：</label>
				<input type="text" value="<?php echo $_SESSION['user_id']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>sub：</label>
				<input type="text" value="<?php echo $_SESSION['user_sub']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>username：</label>
				<input type="text" value="<?php echo $_SESSION['user_username']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>login：</label>
				<input type="text" value="<?php echo $_SESSION['user_login']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>name：</label>
				<input type="text" value="<?php echo $_SESSION['user_name']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>email：</label>
				<input type="text" value="<?php echo $_SESSION['user_email']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>avatar_template：</label>
				<input type="text" value="<?php echo $_SESSION['user_avatar_template']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>avatar_url：</label>
				<input type="text" value="<?php echo $_SESSION['user_avatar_url']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>active：</label>
				<input type="text" value="<?php echo $_SESSION['user_active']?>" class="form-control" readonly="readonly"/>
			</div>
			
			<div class="form-group">
				<label>trust_level：</label>
				<input type="text" value="<?php echo $_SESSION['user_trust_level']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>external_ids：</label>
				<input type="text" value="<?php echo $_SESSION['user_external_ids']?>" class="form-control" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>api_key：</label>
				<input type="text" value="<?php echo $_SESSION['user_api_key']?>" class="form-control" readonly="readonly"/>
			</div>
			
		</div>
	</div>
</div>
<?php }?>

</div>
</div>
</body>
</html>