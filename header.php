<?php
/*  BanManagement � 2012, a web interface for the Bukkit plugin BanManager
    by James Mortemore of http://www.frostcast.net
	is licenced under a Creative Commons
	Attribution-NonCommercial-ShareAlike 2.0 UK: England & Wales.
	Permissions beyond the scope of this licence 
	may be available at http://creativecommons.org/licenses/by-nc-sa/2.0/uk/.
	Additional licence terms at https://raw.github.com/confuser/Ban-Management/master/banmanagement/licence.txt
*/
$nav = array(
	'Home' => 'index.php',
	'Servers' => 'index.php?action=servers'
);
if(isset($_SESSION['admin']) && $_SESSION['admin']) {
	$nav['Admin'] = 'index.php?action=admin';
	$nav['Logout'] = 'index.php?action=logout';
}

$path = $_SERVER['HTTP_HOST'].str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Flatcraft Network Bans</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="//<?php echo $path; ?>js/bootstrap.min.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
		<script src="//<?php echo $path; ?>js/heartcode-canvasloader-min.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.countdown.min.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.tablesorter.min.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.tablesorter.widgets.min.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.tablesorter.pager.min.js"></script><?php
if((isset($settings['iframe_protection']) && $settings['iframe_protection']) || !isset($settings['iframe_protection'])) {
	echo '
		<script type="text/javascript">
			if (top.location != self.location) { top.location = self.location.href; }
		</script>';
}
if(isset($_SESSION['admin']) && $_SESSION['admin']) {
	echo '
		<script type="text/javascript">
			var authid = \''.sha1($settings['password']).'\';
		</script>';
	if(isset($_GET['action']) && $_GET['action'] != 'admin')
		echo '
		<script src="//'.$path.'js/bootstrap-datetimepicker.min.js"></script>
		<script src="//'.$path.'js/admin.js"></script>
';
}
		?>
		
		<script src="//<?php echo $path; ?>js/core.js"></script>
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.php">Flatcraft Network Bans</a>
					<div class="nav-collapse">
						<ul class="nav">
						<?php
						$request = basename($_SERVER['REQUEST_URI']);
						foreach($nav as $name => $link) {
							?><li<?php
							if($request == $link)
								echo ' class="active"';
							?>><a href="<?php echo $link; ?>"><?php echo $name ?></a><?php
						}
						?>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div id="container" class="container">