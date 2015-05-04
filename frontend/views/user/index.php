<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

/* @var $this yii\web\View */
use yii\helpers\Url;
use frontend\widgets\Alert;
$this->title = SITE_NAME;
?>
<div class="site-index">
    <?php echo Alert::widget() ?>
    <div class="jumbotron">
        <h1>Welcome to YUMP Home Page</h1>

        <p class="lead"></p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::to(['user/login']);?>">Go to Login Page</a></p>
    </div>

    <div class="body-content">

    </div>
</div>
