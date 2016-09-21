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
    <?= $this->Html->css('../lib/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox') ?>

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

			<div class="sugar-sidebar-overlay"></div>

			<ul class="nav nav-pills nav-stacked sugar-nav-sidebar main-sidebar">
<!-- 				<?php for ($i = 1; $i < 100; $i++): ?>
					<li class="has-submenu">
						<a href="#" class="active">
							<span class="fa fa-envelope fa-fw"></span>
							Olá gente
						</a>
						<ul class="nav nav-pills nav-stacked sugar-nav-sidebar submenu">
							<li>
								<a href="#">
									Oi zhanti
								</a>
							</li>
						</ul>
					</li>					
				<?php endfor ?> -->
				<li class="has-submenu">
					<a href="#" class="active">
						<span class="fa fa-envelope fa-fw"></span>
						Olá gente
					</a>
					<ul class="nav nav-pills nav-stacked sugar-nav-sidebar submenu">
						<li>
							<a href="#">
								Oi zhanti
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">
						<span class="fa fa-shopping-cart fa-fw"></span>	
						Olá gente
					</a>
				</li>
			</ul>	
		</aside>
		<main class="sugar-content">
			<?= $this->fetch('content') ?>
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
			$('.has-submenu').click(function(){
				var $this = $(this);
				var orientation = $this.orientation;
				var $caret = $('.has-submenu > a > #caret');

				$this.find('ul').slideToggle();

				if ($this.hasClass('submenu-open')) {
					$this
						.removeClass('submenu-open');
					$caret
						.removeClass('fa-caret-up')
						.addClass('fa-caret-down');
				} else {
					$this
						.addClass('submenu-open');
					$caret
						.removeClass('fa-caret-down')
						.addClass('fa-caret-up');
				}

				return false;
			})
			$('.has-submenu > a')
				.append('<span class="fa fa-caret-down" id="caret"></span>');

			// $('.sidebar > li').each(function(){
			// 	var $this = $(this);
			// 	var $a = $this.find('a');
			// 	var icon = $a.data('icon');

			// 	if (icon) {
			// 		$icon = $('<span/>')
			// 			.addClass('fa fa-'+icon)
			// 			.hide();
			// 		$a
			// 			.prepend($icon.fadeIn());
			// 	}
			// });
		});
	</script>

</html>
