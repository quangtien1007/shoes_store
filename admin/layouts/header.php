<?php 
require_once '../library/init.php';
if($session->get() == '') {
    new Redirect("login.php");
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title><?php echo $title; ?></title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<!-- Custom Theme files -->
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<!--header strat here-->
	<div class="header">
		<div class="container">
			<div class="header-main">
				<div class="top-nav">
					<div class="content white">
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<!--/.navbar-header-->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
                                    <li>
                                        <a href="the-loai.php">Thể loại</a>
                                    </li>
                                    <li>
                                        <a href="san-pham.php">Sản phẩm</a>
                                    </li>
                                </ul>
							</div>
							<!--/.navbar-collapse-->
						</nav>
						<!--/.navbar-->
					</div>
                </div>
                <div class="header-right">
                    <h4>Hello
                        <span><p><?php echo $session->get() ?></p></span>
                    </h4>
                </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
    <!--header end here-->