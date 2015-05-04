<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    
    
<!--    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/bootstrap.css.map">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/site.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl; ?>css/common.css">-->
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="<?php echo Yii::$app->homeUrl; ?>js/bootstrap.js"></script>
    
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    
    
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => SITE_NAME,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/user/register']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/user/login']];
            } else {
                $menuItems = [
                    ['label' => 'Dashboard', 'url' => ['/user/dashboard']],
                    [
                        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/user/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
                    
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
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
