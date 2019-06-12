<?php
$userName = $params['userName'];
?>
<p class="f-left box">

<!-- Switcher -->
<span class="f-left" id="switcher">
<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="/assets/design/switcher-1col.gif" alt="1 Column" /></a>
<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="/assets/design/switcher-2col.gif" alt="2 Columns" /></a>
		</span>

		Project: <strong>Your Project</strong>

		</p>

		<p class="f-right">User: <strong><a href="#"><?=$userName;?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="login/logout" id="logout">Log out</a></strong></p>
