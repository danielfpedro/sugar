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
    <?= $this->Html->css('light-bootstrap-dashboard') ?>

    <!--     Fonts and icons     -->
    <?= $this->Html->css('../lib/font-awesome/css/font-awesome.min') ?>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <?= $this->Html->css('../lib/font-awesome/css/font-awesome.min') ?>
    <?= $this->Html->css('../lib/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox') ?>

    <?= $this->fetch('css') ?>
</head>
<body>

<div class="wrapper">
    
	<?= $this->cell('sidebar', [$dashboardOptions['name']]) ?>	

    <div class="main-panel">
        
		<?= $this->cell('topbar') ?>	

        <?= $this->fetch('content') ?>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <?= $this->Html->script('../lib/jquery/dist/jquery.min') ?>
    <?= $this->Html->script('../lib/bootstrap/dist/js/bootstrap.min') ?>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<?= $this->Html->script('light-bootstrap-dashboard') ?>
	<?= $this->fetch('script') ?>

</html>
