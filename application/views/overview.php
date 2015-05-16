<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
<?php if (is_ie()){ ?>
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
<?php } ?>
<title><?= $title ?></title>
<link rel=stylesheet href="<?= base_url('static/css/common.css'); ?>" media=all>
<link rel=stylesheet href="<?= base_url('static/css/frame.css'); ?>" media=all>
<link rel="shortcut icon" href="<?= base_url('static/images/favicon.png'); ?>">
<script src="<?= base_url('static/js/jquery-1.7.2.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('static/js/frame.js'); ?>" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<?php foreach ($server_list as $i => $server) { ?>
<div class="server">
	<h2><?= isset($server['name']) ? $server['name'] : format_html($server['host'])?></h2>
	<table>
		<?php 
			if ($info[$i]['error']) {
		?>
		<tr>
			<td colspan="2"><div><span style="color:#F00; font-weight:bold;">无法连接<?= $server['host'] . ':' . $server['port']; ?></span></div></td>
		</tr>
		<tr>
			<td><div>服务端版本：</div></td>
			<td><div>&nbsp;</div></td>
		</tr>
		<tr>
			<td><div>Keys数量：</div></td>
			<td><div>&nbsp;</div></td>
		</tr>
		<tr>
			<td><div>内存使用量：</div></td>
			<td><div>&nbsp;</div></td>
		</tr>
		<tr>
			<td><div>运行时间：</div></td>
			<td><div>&nbsp;</div></td>
		</tr>
		<tr>
			<td><div>上次保存：</div></td>
			<td><div>&nbsp;</div></td>
		</tr>
		<?php 
			} else {
		?>
		<tr>
			<td><div>服务器地址：</div></td>
			<td><div><?= $server['host'] . ':' . $server['port']; ?></div></td>
		</tr>
		<tr>
			<td><div>服务端版本：</div></td>
			<td><div><?= $info[$i]['redis_version']?></div></td>
		</tr>
		<tr>
			<td><div>Keys数量：</div></td>
			<td><div><?= $info[$i]['size']?></div></td>
		</tr>
		<tr>
			<td><div>内存使用量：</div></td>
			<td><div><?= format_size($info[$i]['used_memory'])?></div></td>
		</tr>
		<tr>
			<td><div>运行时间：</div></td>
			<td><div><?= format_ago($info[$i]['uptime_in_seconds'])?></div></td>
		</tr>
		<tr>
			<td><div>上次保存：</div></td>
			<td><div><?= format_ago(time() - $info[$i]['last_save_time'], true)?> <a href="<?= manager_site_url('save', 'index'); ?>"><img src="<?= base_url('static/images/save.png'); ?>" width="16" height="16" title="目前保存" alt="[S]" class="imgbut"></a></div></td>
		</tr>
		<?php 
			}
		?>
	</table>
</div>
<?php } ?>
</body>
</head>