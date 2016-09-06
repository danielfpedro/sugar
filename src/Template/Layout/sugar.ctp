<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <?= $this->Html->css('../lib/bootstrap/dist/css/bootstrap.min') ?>

    <!-- Animation library for notifications   -->
    <?= $this->Html->css('../lib/animate.css/animate.min') ?>

    <!--  Light Bootstrap Table core CSS    -->
    <?= $this->Html->css('style') ?>
    <?= $this->Html->css('../lib/optiscroll/dist/optiscroll') ?>
    <?= $this->Html->css('sugar-custom-scroll') ?>

    <!--     Fonts and icons     -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->

    <?= $this->Html->css('../lib/font-awesome/css/font-awesome.min') ?>
    <!-- <?= $this->Html->css('../lib/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox') ?> -->

    <?= $this->fetch('css') ?>
</head>
<body>

	<?= $this->element('navbar') ?>

	<div class="sugar-container">
		<aside class="sugar-sidebar optiscroll" style="">
			<?php
				for ($i=0; $i < 100; $i++) { 
					echo "dasds<br>";
				}
			?>		
		</aside>
		<main class="sugar-content">
			fds
			asd
			sa
		</main>
	</div>

</body>

    <!--   Core JS Files   -->
    <?= $this->Html->script('../lib/jquery/dist/jquery.min') ?>
    <?= $this->Html->script('../lib/bootstrap/dist/js/bootstrap.min') ?>
    <?= $this->Html->script('../lib/optiscroll/dist/jquery.optiscroll.min') ?>

	<?= $this->fetch('script') ?>

	<script>
		$(function(){
			$(".sugar-sidebar").optiscroll();
		});
	</script>

</html>
