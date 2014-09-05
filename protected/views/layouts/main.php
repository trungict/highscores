<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-6"
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">High Score Website</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-6">

        		<div class="login">

                <?php if(!Yii::app()->user->isGuest) echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/user/panel/'.Yii::app()->user->id.'" class="btn btn-primary btn-small" role="button"><span class="glyphicon glyphicon-user icon"></span>'.Yii::app()->user->name.' (Trang cá nhân)</a><a href="'.Yii::app()->request->baseUrl.'/index.php/site/logout" class="btn btn-primary btn-small" role="button" style="margin-left:10px;">Logout</a>'; else {?>
                <a style="margin-left:10px;" href="<?php echo Yii::app()->request->baseUrl?>/index.php/user/create" class="btn btn-primary btn-small" role="button">Đăng ký</a>
                <a href="<?php echo Yii::app()->request->baseUrl?>/index.php/site/login" class="btn btn-primary btn-small" role="button">Đăng nhập</a>
                <div class="login">
                <?php } ?>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
    </nav>
    <header class="banner">
        <div class="container">
            <span class="brand-name">High Score</span>
            <h1>Hãy để chúng tôi lưu giữ những khoảnh khắc "thần thánh" của bạn</h1>
        </div>
    </header>

<div class="container">

	<!--<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<!--<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php
		$flashMessages = Yii::app()->user->getFlashes();
		if ($flashMessages) {
		    echo '<ul class="flashes">';
		    foreach($flashMessages as $key => $message) {
		        echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
		    }
		    echo '</ul>';
		}
	?>
	<ol class="breadcrumb">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</ol>
	<?php echo $content; ?>


	<div class="container-fluid">
      <hr>
      <!-- Footer -->
      <footer>
          <div class="row">
              <div class="col-md-12">
                  <p>Copyright <strong>&copy;</strong> High Score Website 2014</p>
              </div>
          </div>
        </footer>

    </div>

</div><!-- page -->

</body>
</html>
