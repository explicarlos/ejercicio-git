<?="<?xml version=\"1.0\"?>";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/assets/css/reset.css" /> <!-- RESET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/assets/css/main.css" /> <!-- MAIN STYLE SHEET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/assets/css/2col.css" title="2col" /> <!-- DEFAULT: 2 COLUMNS -->
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="/assets/css/1col.css" title="1col" /> <!-- ALTERNATE: 1 COLUMN -->
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="/assets/css/main-ie6.css" /><![endif]--> <!-- MSIE6 -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/assets/css/style.css" /> <!-- GRAPHIC THEME -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/assets/css/mystyle.css" /> <!-- WRITE YOUR CSS CODE HERE -->
	<script type="text/javascript" src="/assets/js/jquery.js"></script>
	<script type="text/javascript" src="/assets/js/switcher.js"></script>
	<script type="text/javascript" src="/assets/js/toggle.js"></script>
	<script type="text/javascript" src="/assets/js/ui.core.js"></script>
	<script type="text/javascript" src="/assets/js/ui.tabs.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>
	<title>Adminizio Lite</title>
</head>

<body>

<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">
		<?php include("../application/layouts/partials/tray.php")?>
	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">
		<?php include("../application/layouts/partials/menu.php")?>
	</div> <!-- /header -->

	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">
			<?php include("../application/layouts/partials/aside.php")?>
		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">
 			<?php //include("../application/layouts/partials/content.php")?>
 			<?=$params['content'];?>
		</div> <!-- /content -->

	</div> <!-- /cols -->

	<hr class="noscreen" />

	<!-- Footer -->
	<div id="footer" class="box">
		<?php include("../application/layouts/partials/footer.php")?>
	</div> <!-- /footer -->

</div> <!-- /main -->

</body>
</html>