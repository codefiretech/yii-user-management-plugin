<?php 
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/


use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<!--    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/bootstrap.css.map">-->
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/site.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/common.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="<?php echo Yii::$app->homeUrl; ?>js/bootstrap.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    
    
</head>
<body>
	<div id="window_progress" class="ajax-loader" style="align:center">Working ...</div>
    <?php $this->beginBody() ?>
        <div class="wrap">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed dropdown-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                  <a class="navbar-brand" href="<?php echo Yii::$app->homeUrl;?>"><?php echo SITE_NAME;?></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
                <ul class="nav navbar-nav">
                    <?php if(!Yii::$app->user->isGuest){ ?>
                        <?php echo "<li>".Html::a("Dashboard", Url::to(['user/dashboard']))."</li>"; ?>
                        <?php echo "<li>".Html::a("Change Password", Url::to(['user/change-password']))."</li>"; ?>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo Url::to(['user/index']);?>">All</a></li>
                                <li><a href="<?php echo Url::to(['user/save']);?>">Add New</a></li>
                                <li><a href="<?php echo Url::to(['user/online']);?>">Online users</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Roles</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo Url::to(['user-group/index']);?>">All</a></li>
                                <li><a href="<?php echo Url::to(['user-group/save']);?>">Add New</a></li>
								<li><a href="<?php echo Url::to(['group-permission/index']);?>">Role Permission</a></li>
								<li><a href="<?php echo Url::to(['group-permission/load']);?>">Load Actions</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo Url::to(['setting/index']);?>">Settings</a></li>
                    <?php } ?>
                    <?php if(Yii::$app->user->isGuest){ 
                        echo "<li>".Html::a("Login", Url::to(['user/login']))."</li>";
                    }else{
                        echo "<li>".Html::a("Logout(".Yii::$app->user->identity->username.")", Url::to(['user/logout']))."</li>";
                    }
                    ?>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        <div class="container">
        <fieldset style="border:1px solid rgb(232, 237, 250);border-radius:5px;padding:10px;">
            <legend style="border:1px solid rgb(232, 237, 250);width:auto;padding:3px 10px 3px 10px;margin-left:10px;border-radius:5px;background-color:rgb(232, 237, 250);"><?php echo $this->title; ?></legend>
            <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
            <?= $content ?>
        </fieldset>
        </div>
    </div>
    

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
    <script src="<?php echo Yii::$app->homeUrl; ?>js/common.js"></script>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
